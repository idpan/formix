<?php

namespace App\Http\Controllers;

use App\Models\PublicEstimation;
use App\Models\PublicEstimationSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicEstimationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'luas' => 'required|numeric|min:1',
            'kontak' => 'required|string|max:255',
        ]);

        $setting = PublicEstimationSetting::first();

        if (!$setting || !$setting->aktif) {
            return back()->withErrors(['Form estimasi tidak tersedia saat ini.']);
        }

        $total = $data['luas'] * $setting->harga_per_meter;

        PublicEstimation::create([
            'luas' => $data['luas'],
            'kontak' => $data['kontak'],
            'hasil' => $total,
        ]);

        $template = $setting->pesan_template ?? "Estimasi RAB Anda: Rp {{total}}";
        $pesan = str_replace(
            ['{{total}}', '{{luas}}'],
            [number_format($total, 0, ',', '.'), $data['luas']],
            $template
        );

        if (filter_var($data['kontak'], FILTER_VALIDATE_EMAIL)) {
            Mail::raw($pesan, function ($message) use ($data) {
                $message->to($data['kontak'])
                    ->subject('Estimasi RAB Proyek Anda');
            });
        }

        return back()->with('success', 'Estimasi berhasil dikirim ke kontak Anda.');
    }
}
