<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    use HasFactory, SoftDeletes;

    //  Status <PlANNING, IN_PROGRESS, Review, Done>

    public static array $STATUS = [
        0 => "PLANNING",
        1 => "IN_PROGRESS",
        2 => "REVIEW",
        3 => "DONE"
    ];

    public static string $STATUS_PLANNING = "PLANNING";
    public static string $STATUS_IN_PROGRESS = "IN_PROGRESS";
    public static string $STATUS_REVIEW = "REVIEW";
    public static string $STATUS_DONE = "DONE";

    public function status_to_number() : int {
        return match ($this->status) {
            Work::$STATUS_PLANNING => 0,
            Work::$STATUS_IN_PROGRESS => 1,
            Work::$STATUS_REVIEW => 2,
            Work::$STATUS_DONE => 3,
            default => -1,
        };
    }

    public function number_to_status(int $number) : string {
        return match ($number) {
            0 => Work::$STATUS_PLANNING,
            1 => Work::$STATUS_IN_PROGRESS,
            2 => Work::$STATUS_REVIEW,
            3 => Work::$STATUS_DONE,
            default => "ERROR",
        };
    }

    public function kanbanBoard() : BelongsTo {
        return $this->belongsTo(KanbanBoard::class);
    }

    public function scopePlanning($query) {
        return $query->where('status', Work::$STATUS_PLANNING);
    }

    public function scopeInProgress($query) {
        return $query->where('status', Work::$STATUS_IN_PROGRESS);
    }

    public function scopeReview($query) {
        return $query->where('status', Work::$STATUS_REVIEW);
    }

    public function scopeDone($query) {
        return $query->where('status', Work::$STATUS_DONE);
    }

}
