<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
class Office extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name', 'address', 'country', 'current_balance'];

    // علاقة مع جدول الحوالات للمكاتب المرسلة
    public function transfersFrom()
    {
        return $this->hasMany(Transfer::class, 'sender_id');
    }

    // علاقة مع جدول الحوالات للمكاتب المستقبلة
    public function transfersTo()
    {
        return $this->hasMany(Transfer::class, 'receiver_id');
    }
    public function HisOwner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
