<?php

namespace App\Models;

use Faker\Provider\tr_TR\DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function kanbanBoard() : HasOne {
        return $this->hasOne(KanbanBoard::class);
    }

    public function applications() : HasMany {
        return $this->hasMany(Application::class);
    }

    public function budgetRequest() : HasOne {
        return $this->hasOne(BudgetRequest::class);
    }

    public function certificates() : HasMany {
        return $this->hasMany(Certificate::class);
    }

    public function getDurationToStringAttribute() : string {
        $startDateTime = $this->start_date_time;
        $endDateTime = $this->end_date_time;
        return $startDateTime;
        echo $startDateTime;
        echo $endDateTime;
        $duration = $startDateTime->diff($endDateTime);
        return $duration->format('%d วัน %H ชั่วโมง');
    }

    public function hasCertificate() : bool {
        return $this->certificate->count() != 0;
    }

}
