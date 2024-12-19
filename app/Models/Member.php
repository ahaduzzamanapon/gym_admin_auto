<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Member
 * @package App\Models
 * @version November 18, 2024, 4:33 am UTC
 *
 * @property string $mem_name
 * @property string $mem_father
 * @property string $mem_address
 * @property string $mem_admission_date
 * @property string $mem_cell
 * @property string $mem_email
 * @property string $mem_img_url
 */
class Member extends Model
{

    public $table = 'members';

    public $fillable = [
        'id',
        'member_unique_id',
        'mem_name',
        'mem_father',
        'mem_mother',
        'mem_gender',
        'mem_address',
        'mem_admission_date',
        'mem_admission_fees',
        'date_of_birth',
        'mem_cell',
        'mem_email',
        'mem_img_url',
        'mem_type',
        'punch_id',
        'branch_id',
        'height',
        'weight',
        'bmi',
        'waist',
        'blood_group',
        'blood_pressure',
        'pulse_rate',
        'profession',
        'office_address',
        'exercise_goal',
        'current_diet_routine',
        'sassoon_exercise_time',
        'sleep_time',
        'wake_up_time',
        'work_time',
        'exercise_history',
        'medicine_history',
        'injury_or_health_issue',
        'like_or_dislike_exercise',
        'like_or_dislike_food',
        'push_up_count',
        'pull_up_count',
        'lift_count_kg',
        'question',
        'term_con',
        'created_at',
        'updated_at',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'member_unique_id' => 'string',
        'mem_name' => 'string',
        'mem_father' => 'string',
        'mem_address' => 'string',
        'mem_admission_date' => 'date',
        'mem_cell' => 'string',
        'mem_email' => 'string',
        'mem_img_url' => 'string',
        'group_id' => 'integer',
        'punch_id' => 'integer',
        'branch_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mem_name' => 'required',
        // 'member_unique_id' => 'unique:members,member_unique_id',
        'mem_address' => 'required',
        'mem_admission_date' => 'required',
        'mem_cell' => 'required',
        'mem_email' => 'required'
    ];
    
}
