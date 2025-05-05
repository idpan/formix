<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    use HasFactory;

    protected $fillable = ['meta_title', 'meta_description', 'meta_keywords', 'meta_og_image', 'json_ld'];
}
