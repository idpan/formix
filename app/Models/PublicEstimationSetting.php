<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicEstimationSetting extends Model
{
    protected $table = 'public_estimation_ettings';
    protected $fillable = [
        'harga_per_meter',
        'aktif',
        'form_header',
        'catatan',
        'pesan_template'
    ];
}
