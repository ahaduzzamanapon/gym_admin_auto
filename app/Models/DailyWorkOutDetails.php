<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyWorkOutDetails extends Model
{
    use HasFactory;


   public $table = 'daily_work_out_details';
    
    public $fillable = [
        'member_id',
        'day',
        'duration',
    ];


    protected $casts = [
        'id' => 'integer',
        'member_id' => 'integer',
        'day' => 'string',
        'duration' => 'string',
    ];


    public static $rules = [
        'member_id' => 'required',
        'day' => 'required',
        'workout_category' => 'required',
    ];



}
