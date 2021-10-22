<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogHistory extends Model
{

    use HasFactory;
    protected $table='login_history';

    protected $fillable=['user_id', 'user_agent', 'ip_address','email','name'];
}
