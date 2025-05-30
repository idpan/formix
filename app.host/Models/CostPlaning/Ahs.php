<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class Ahs extends Model
{
    protected $table = 'cp_ahs';

    protected $fillable = ['name', 'unit', 'ahs_group_id'];

    public function group()
    {
        return $this->belongsTo(AhsGroup::class, 'ahs_group_id');
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'cp_ahs_details', 'ahs_id', 'item_id')
            ->withPivot('coefficient')
            ->withTimestamps();
    }

    public function ahsDetails()
    {
        return $this->hasMany(AhsDetail::class, 'ahs_id');
    }
    public function details()
    {
        return $this->hasMany(AhsDetail::class);
    }
}
