<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'cp_items';
    protected $fillable = ['name', 'unit', 'unit_price', 'category'];

    public function ahs()
    {
        return $this->belongsToMany(Ahs::class, 'cp_ahs_detail', 'item_id', 'ahs_id')
            ->withPivot('coeffient')
            ->withTimestamps();
    }

    public function ahsDetails()
    {
        return $this->hasMany(AhsDetail::class, 'item_id');
    }
    public function projectTemplate()
    {
        return $this->hasMany(ProjectTemplate::class, 'project_template_id');
    }
}
