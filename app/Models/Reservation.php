<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'seats',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];

    
    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/reservations/'.$this->getKey());
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
