<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstimasiSetting extends Model
{
    protected $fillable = [
        'harga_per_meter',
        'aktif',
        'form_header',
        'catatan',
        'pesan_template'
    ];
}
