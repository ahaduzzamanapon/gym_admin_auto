<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DailyWorkouts
 * @package App\Models
 * @version December 10, 2024, 9:18 am UTC
 *
 * @property integer $member_id
 * @property string $day
 * @property integer $workout_category
 * @property string $exercise_name
 * @property string $reputation
 * @property string $sets
 * @property string $duration_minutes
 */
class DailyWorkouts extends Model
{

    public $table = 'daily_workouts';
    



    public $fillable = [
        // 'member_id',
        // 'day',
        // 'duration',
        'daily_work_out_details_id',
        'workout_category',
        'exercise_name',
        'reputation',
        'sets',
        'duration_minutes',
        'create_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'daily_work_out_details_id' => 'integer',
        'workout_category' => 'integer',
        'exercise_name' => 'string',
        'reputation' => 'string',
        'sets' => 'string',
        'duration_minutes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'day' => 'required',
        // 'daily_work_out_details_id' => 'required',
        'workout_category' => 'required',
        'exercise_name' => 'required',
        'reputation' => 'required',
        'sets' => 'required',
        'duration_minutes' => 'required'
    ];

    
}
