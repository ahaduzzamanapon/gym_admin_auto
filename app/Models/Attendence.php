<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Attendence
 * @package App\Models
 * @version November 21, 2024, 4:21 am UTC
 *
 * @property string $date
 * @property integer $member_id
 * @property string $status
 */
class Attendence extends Model
{

    public $table = 'attendences';
    



    public $fillable = [
        'date',
        'member_id',
        'member_type',
        'in_time',
        'out_time',
        'attendence_status',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'id' => 'integer',
    //     'date' => 'date',
    //     'member_id' => 'integer',
    //     'status' => 'string'
    // ];

    /**
     * Validation rules
     *
     * @var array
     */
    // public static $rules = [
    //     'date' => 'required',
    //     'member_id' => 'required',
    //     'status' => 'required'
    // ];

    
}
