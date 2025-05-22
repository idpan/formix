<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'cp_projects';
    protected $fillable = ['name', 'client_name', 'project_location'];

    public function works()
    {
        return $this->hasMany(ProjectWork::class, 'project_id');
    }
}
