<?php

namespace App\Models\CostPlaning;

use Illuminate\Console\View\Components\Ask;
use Illuminate\Database\Eloquent\Model;

class ProjectDraftDetail extends Model
{
    protected $table = 'cp_project_drafts_ahs';
    protected $guarded = [];

    public function projectDraft()
    {
        return $this->belongsTo(ProjectDraft::class, 'project_draft_id');
    }
    public function ahs()
    {
        return $this->belongsTo(Ahs::class, 'ahs_id');
    }

    public function getAhsTotal()
    {
        return $this->ahs?->ahs_unit_price * $this->volume;
    }
}
