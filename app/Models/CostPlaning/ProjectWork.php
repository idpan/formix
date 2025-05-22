<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class ProjectWork extends Model
{
    protected $table = 'cp_project_works';
    protected $fillable = ['ahs_name', 'unit', 'volume', 'unit_price', 'subtotal'];

    public function items()
    {
        return $this->hasMany(ProjectWorkItem::class, 'project_work_id');
    }
}
