<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Page extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = ['title', 'slug'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function metadata()
    {
        return $this->hasMany(Metadata::class);
    }
}
