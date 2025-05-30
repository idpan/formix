<?php

namespace App\Providers;

use App\Models\Addresses;
use App\Models\Contact;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $menuItems = [
            ['title' => 'Home', 'link' => '/'],
            ['title' => 'Tentang Kami', 'link' => '/about'],
            ['title' => 'Proyek', 'link' => '/projects'],
        ];
        [$contact] = Contact::select('email', 'phone')->get();
        $addresses = Addresses::select('name', 'address')->get();
        $social_media = SocialMedia::select('username', 'platform', 'url')->get();

        Blade::directive('money', fn($value) => "<?php echo 'Rp ' . number_format($value, 0, ',', '.'); ?>");

        View::share('menuItems', $menuItems);
        View::share('contact', $contact);
        View::share('addresses', $addresses);
        View::share('social_media', $social_media);
    }
}
