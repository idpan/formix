<?php

namespace App\Models\CostPlaning;

use Illuminate\Database\Eloquent\Model;

class AhsDetail extends Model
{
    protected $table = 'cp_ahs_details';

    protected $fillable = ['coefficient', 'ahs_id', 'item_id'];

    public function ahs()
    {
        return $this->belongsTo(Ahs::class, 'ahs_id');
    }
    public function items()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
