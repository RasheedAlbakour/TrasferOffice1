<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'amount',
        'transfer_date',
        'person_receiving',
        'status',
        'transfer_code',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transfer) {
            $transfer->transfer_code = 'TR-' . uniqid();
        });
    }

    // علاقة مع مكتب المرسل
    public function sender()
    {
        return $this->belongsTo(Office::class, 'sender_id');
    }

    // علاقة مع مكتب المستقبل
    public function receiver()
    {
        return $this->belongsTo(Office::class, 'receiver_id');
    }
}
