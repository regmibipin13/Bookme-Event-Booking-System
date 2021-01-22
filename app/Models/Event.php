<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category',
        'total_seats',
        'start_time',
        'end_time',
        'is_custom_seat',
        'custom_seats',
    
    ];
    
    
    protected $dates = [
        'start_time',
        'end_time',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url','total_reservation','available_seats'];

    public function getTotalReservationAttribute()
    {
        if($this->reservations()->exists()) {
            if($this->is_custom_seat) {
                $seats = json_decode($this->custom_seats);
                 return count(array_filter($seats ?? [], function($seat){
                    return $seat->occupied == true;
                }));
            } else {
                return $this->reservations->sum('seats');
            }
        }
    }

    public function getAvailableSeatsAttribute()
    {
        return $this->total_seats - $this->total_reservation;
    }

    public function getResourceUrlAttribute()
    {
        return url('/admin/events/'.$this->getKey());
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
