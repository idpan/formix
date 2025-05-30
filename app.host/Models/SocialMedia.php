<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'platform', 'url'];
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
