<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SocialMedia;
use App\Models\Address;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['phone', 'email'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function socialMedia()
    {
        return $this->hasMany(SocialMedia::class);
    }
}
