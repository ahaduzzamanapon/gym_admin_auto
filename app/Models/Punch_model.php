<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Punch_model extends Model
{
    use HasFactory;
    public $fillable = [
        'punch_id',
        'punch_time',
        'process_status'
    ];
}
