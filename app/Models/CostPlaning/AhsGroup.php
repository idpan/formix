<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class AhsGroup extends Model
{
    protected $table = 'cp_ahs_groups';
    protected $fillable = ['name'];

    public function ahs()
    {
        return $this->hasMany(Ahs::class, 'ahs_group_id');
    }
}
