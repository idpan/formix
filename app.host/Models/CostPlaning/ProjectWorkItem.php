<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class ProjectWorkItem extends Model
{
    protected $table = 'cp_project_work_items';
    protected $fillable = ['project_work_id', 'item_name', 'unit', 'unit_price', 'coefficient', 'subtotal', 'category'];

    public function works()
    {
        return $this->belongsTo(ProjectWork::class, 'project_work_id');
    }
}
