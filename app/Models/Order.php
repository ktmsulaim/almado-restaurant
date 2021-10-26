<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{

    protected $casts = [
        'order_amount' => 'float',
        'coupon_discount_amount' => 'float',
        'total_tax_amount' => 'float',
        'restaurant_discount_amount' => 'float',
        'delivery_address_id' => 'integer',
        'delivery_man_id' => 'integer',
        'delivery_charge' => 'float',
        'user_id' => 'integer',
        'scheduled' => 'integer',
        'restaurant_id' => 'integer',
        'details_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function setDeliveryChargeAttribute($value)
    {
        $this->attributes['delivery_charge'] = round($value, 3);
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function delivery_man()
    {
        return $this->belongsTo(DeliveryMan::class, 'delivery_man_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id');
    }

    public function delivery_history()
    {
        return $this->hasMany(DeliveryHistory::class, 'order_id');
    }

    public function dm_last_location()
    {
        return $this->hasOne(DeliveryHistory::class, 'order_id')->latest();
    }

    public function transaction()
    {
        return $this->hasOne(OrderTransaction::class);
    }

    public function scopeAccepteByDeliveryman($query)
    {
        return $query->where('order_status', 'accepted');
    }

    public function scopePreparing($query)
    {
        return $query->whereIn('order_status', ['confirmed','processing','handover']);
    }
    
    public function scopeOngoing($query)
    {
        return $query->whereIn('order_status', ['accepted','confirmed','processing','handover','picked_up']);
    }
    
    public function scopeFoodOnTheWay($query)
    {
        return $query->where('order_status','picked_up');
    }
    
    public function scopePending($query)
    {
        return $query->where('order_status','pending');
    }
    
    // public function scopeRefundRequest($query)
    // {
    //     return $query->where('order_status','refund_requested');
    // }

    public function scopeFailed($query)
    {
        return $query->where('order_status','failed');
    }
    
    public function scopeCanceled($query)
    {
        return $query->where('order_status','canceled');
    }
    
    public function scopeDelivered($query)
    {
        return $query->where('order_status','delivered');
    }
    
    public function scopeRefunded($query)
    {
        return $query->where('order_status','refunded');
    }
    
    public function scopeSearchingForDeliveryman($query)
    {
        return $query->whereNull('delivery_man_id')->where('order_type', '=' , 'delivery');
    }
    
    public function scopeDelivery($query)
    {
        return $query->where('order_type', '=' , 'delivery');
    }
    
    public function scopeScheduled($query)
    {
        return $query->whereRaw('created_at <> schedule_at')->where('scheduled', '1');
    }
    
    public function scopeOrderScheduledIn($query, $interval)
    {
        return $query->where(function($query)use($interval){
            $query->whereRaw('created_at <> schedule_at')->where(function($q) use ($interval) {
            $q->whereBetween('schedule_at', [Carbon::now()->toDateTimeString(),Carbon::now()->addMinutes($interval)->toDateTimeString()]); 
            })->orWhere('schedule_at','<',Carbon::now()->toDateTimeString());
        })->orWhereRaw('created_at = schedule_at');
        
    }

    public function scopePos($query)
    {
        return $query->where('order_type', '=' , 'pos');
    }

    public function scopeNotpos($query)
    {
        return $query->where('order_type', '<>' , 'pos');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d H:i:s',strtotime($value));
    }

}
