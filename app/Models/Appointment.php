<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'business_account_id', 'title',
        'isActive', 'max_orders', 
    ];

    protected $casts = [
        'valid_from' => 'datetime',
        'valid_to' => 'datetime',
        //'order_start_time' => 'time',
        //'order_end_time' => 'time',
        'workdays' => 'array'
    ];

    public function businessAccount()
    {
        return $this->belongsTo(BusinessAccount::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'appointment_attribute');
    }
}
