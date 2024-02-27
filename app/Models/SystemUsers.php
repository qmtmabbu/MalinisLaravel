<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemUsers extends Model
{
    use HasFactory;
    protected $id = 'userID';
    protected $table = "system_users";

    protected $fillable = [
        'userID',
        'password',
        'userType',
        "firstName",
        "middleName",
        "lastName",
        "email",
        "registeredDate"
    ];
}
