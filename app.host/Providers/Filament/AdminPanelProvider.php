<?php

namespace App\Providers\Filament;

use App\Filament\Resources\ContactResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;
use App\Filament\Resources\ContentManagement\PageResource;
use App\Filament\Resources\ProjectResource;
use Filament\Navigation\NavigationBuilder;
use App\Models\Page;
use Illuminate\Support\Facades\Log;
use App\Filament\Pages\CostPlanning\CreateCostPlanning;
use Filament\Pages\Dashboard;
use Illuminate\Support\Facades\Gate;
use Closure;
use App\Models\User;

class AdminPanelProvider extends PanelProvider
{
    public function gate(): Closure
{
    return fn (User $user) => true;
}
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            // ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
            //     return $builder
            //         ->groups([
            //             NavigationGroup::make('Pages')
            //                 ->icon('heroicon-o-document')
            //                 ->items(
            //                     [

            //                         NavigationItem::make('Home')
            //                             ->url('/admin/pages/1/edit'),
            //                         // ->icon('heroicon-o-document'),
            //                         NavigationItem::make('About')
            //                             ->url('/admin/pages/2/edit'),
            //                         // ->icon('heroicon-o-document'),
            //                         NavigationItem::make('Project')
            //                             ->url('/admin/pages/3/edit'),
            //                         // ->icon('heroicon-o-document'),
            //                     ]
            //                 )
            //         ])
            //         ->items([
            //             NavigationItem::make('Dashboard')
            //                 ->icon('heroicon-o-home')
            //                 ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
            //                 ->url(fn(): string => Dashboard::getUrl()),
            //             // NavigationItem::make('Pages')
            //             //     ->icon('heroicon-o-document'),

            //             // NavigationItem::make('Home')
            //             //     ->url('/admin/pages/1/edit')->group('Pages'),
            //             // // ->icon(null),
            //             // NavigationItem::make('About')
            //             //     ->url('/admin/pages/2/edit')->group('Pages'),
            //             // // ->icon('heroicon-o-document'),
            //             // NavigationItem::make('Project')
            //             //     ->url('/admin/pages/3/edit')->group('Pages'),
            //             // // ->icon('heroicon-o-document'),
            //             ...ProjectResource::getNavigationItems(),
            //             NavigationItem::make('Contact')
            //                 ->icon('heroicon-o-phone')
            //                 ->url('/admin/contacts/1/edit')
            //         ]);

            //     // ->items([]);
            // })
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Blue,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                //Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }


    public function navigation(NavigationBuilder $builder): NavigationBuilder
    {
        $items = [];

        try {
            $pages = Page::whereIn('name', ['home', 'About', 'Projects'])->get()->keyBy('name');

            $items = [
                NavigationItem::make('Static Page')
                    ->url('/admin/pages/1/edit')
                    ->icon('heroicon-o-document'),

                NavigationItem::make('home')
                    ->url(PageResource::getUrl('edit', ['record' => $pages['home']->id]))
                    ->icon('heroicon-o-home'),

                NavigationItem::make('About')
                    ->url(PageResource::getUrl('edit', ['record' => $pages['about']->id]))
                    ->icon('heroicon-o-user-group'),

                NavigationItem::make('Projects')
                    ->url(PageResource::getUrl('edit', ['record' => $pages['projects']->id]))
                    ->icon('heroicon-o-briefcase'),
            ];
        } catch (\Throwable $e) {
            Log::warning("Navigation build failed: " . $e->getMessage());
            // optionally show fallback static navigation or nothing
        }

        return $builder->items([
            NavigationGroup::make('Pages')->items($items),
        ]);
    }
}
