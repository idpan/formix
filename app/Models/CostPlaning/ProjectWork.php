<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class ProjectWork extends Model
{
    protected $table = 'cp_project_works';
    protected $fillable = ['project_id', 'ahs_name', 'unit', 'volume', 'unit_price', 'subtotal'];

    public function project()
    {
        $this->belongsTo(Project::class, 'project_id');
    }
    public function projectWorkItems()
    {
        return $this->hasMany(ProjectWorkItem::class, 'project_work_id');
    }
}
