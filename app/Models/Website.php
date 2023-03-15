<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = [
        "domain",
        "adminEmail",
        "ipAddress",
        "admin",
        "package",
        "state",
        "diskUsed",
        "username",
        'is_verified'
    ];
}