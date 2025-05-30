<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class ProjectDraft extends Model
{
    protected $table = 'cp_project_drafts';
    protected $guarded = [];
    protected $casts = [
        'ahs_items' => 'array'
    ];

    public function draftAhs()
    {
        return $this->belongsToMany(Ahs::class, 'cp_project_draft_ahs', 'project_draft_id', 'ahs_id')
            ->using(ProjectDraftDetail::class)
            ->withPivot('volume');
    }

    public function draftAhsDetail()
    {
        return $this->hasMany(ProjectDraftDetail::class, 'ahs_id');
    }
}
