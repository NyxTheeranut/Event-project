<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetRequest extends Model
{
    use HasFactory, SoftDeletes;

    public function event() : BelongsTo {
        return $this->belongsTo(Event::class);
    }
}