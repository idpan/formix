<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class ProjectWorkItem extends Model
{
    protected $table = 'cp_project_work_Items';
    protected $fillable = ['item_name', 'unit', 'unit_price', 'coefficient', 'subtotal', 'category'];
}
