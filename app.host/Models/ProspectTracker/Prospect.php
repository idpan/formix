<?php

namespace App\Models\ProspectTracker;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
    protected $table = 'pt_prospects';
    protected $fillable = ['name', 'phone', 'email', 'estimated_value', 'status'];
}
