<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class ProjectTemplate extends Model
{
    protected $table = 'cp_project_templates';
    protected $fillable = ['name'];

    public function ahs()
    {
        return $this->hasMany(Item::class, 'item_id');
    }
}
