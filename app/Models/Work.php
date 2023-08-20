<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use HasFactory, SoftDeletes;

    public function kanbanBoard() : BelongsTo {
        return $this->belongsTo(KanbanBoard::class);
    }

    public function scopePlanning($query) {
        return $query->where('status', 'PLANNING');
    }

    public function scopeInProgress($query) {
        return $query->where('status', 'IN_PROGRESS');
    }

    public function scopeReview($query) {
        return $query->where('status', 'REVIEW');
    }

    public function scopeDone($query) {
        return $query->where('status', 'DONE');
    }

}
