<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'remote_addr' , 'http_user_agent'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
