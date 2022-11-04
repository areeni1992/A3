<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSub extends Model
{
    use HasFactory;

    protected $fillable = ['user_email', 'phone_number', 'order_number', 'attachment', 'message'];
}
