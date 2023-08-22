<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BudgetRequest extends Model
{
    use HasFactory, SoftDeletes;

    //  Status <'PENDING', 'APPROVED', 'REJECTED'>
    public const STATUS_PENDING = 'PENDING';
    public const STATUS_APPROVED = 'APPROVED';
    public const STATUS_REJECTED = 'REJECTED';

    public function getStatusMessage() : string {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'กำลังรอการอนุมัติ';
            case self::STATUS_APPROVED:
                return 'อนุมัติแล้ว ด้วยเหตุผล: ' . $this->reason ?? 'ไม่มีเหตุผล';
            case self::STATUS_REJECTED:
                return 'ไม่อนุมัติ ด้วยเหตุผล: ' . $this->reason ?? 'ไม่มีเหตุผล';
            default:
                return 'ไม่ทราบสถานะ';
        }
    }

    public function getStatusTextColor() : string {
        switch ($this->status) {
            case self::STATUS_PENDING:
                return 'text-yellow-500';
            case self::STATUS_APPROVED:
                return 'text-green-500';
            case self::STATUS_REJECTED:
                return 'text-red-500';
            default:
                return 'text-black-500';
        }
    }

    public function event() : BelongsTo {
        return $this->belongsTo(Event::class);
    }
}
