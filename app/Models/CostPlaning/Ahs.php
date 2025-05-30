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
            ->withPivot('coefficient');
    }

    public function projectDrafts()
    {
        return $this->belongsToMany(ProjectDraft::class, 'cp_ahs_project_draft', 'ahs_id', 'project_draft_id',)
            ->withPivot('volume');
    }

    public function projectTemplates()
    {
        return $this->belongsToMany(ProjectTemplate::class, 'cp_project_templates', 'ahs_id', 'project_template_id')
            ->withPivot('volume');
    }

    public function getAhsUnitPrice()
    {
        $ahs_unit_price = $this->items->sum(function ($item) {
            return $item->unit_price * $item->coefficient;
        });
        return $ahs_unit_price;
    }
}
