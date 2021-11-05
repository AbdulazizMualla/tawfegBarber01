<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['date' , 'time' , 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeDateUp($query)
    {
        return $query->where('date' , '>=' , now()->format('Y-m-d'));
    }
}
