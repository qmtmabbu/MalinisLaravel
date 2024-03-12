<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detections extends Model
{
    use HasFactory;
    protected $id = 'detectionID';
    protected $table = "detections";

    protected $fillable = [
        'detectionID',
        'userID',
        'malwareName',
        'affected',
        'status',
        'logid',
        "created_at",
    ];
}
