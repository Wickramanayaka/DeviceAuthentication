<?php

namespace Chamal\DeviceAuthentication\Entities;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'tokens';
    protected $fillable = ['device_id','token'];
}