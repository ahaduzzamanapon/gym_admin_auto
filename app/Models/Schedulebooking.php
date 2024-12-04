<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Schedulebooking
 * @package App\Models
 * @version November 18, 2024, 9:35 am UTC
 *
 * @property integer $member_id
 * @property string $booking_date
 * @property string $service_type
 * @property integer $status
 * @property string $note
 */
class Schedulebooking extends Model
{

    public $table = 'schedulebookings';
    



    public $fillable = [
        'member_id',
        'booking_date',
        'service_type',
        'status',
        'note',
        'asset_id',
        'booking_time'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'member_id' => 'integer',
        'booking_date' => 'date',
        'service_type' => 'string',
        'status' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'member_id' => 'required',
        'booking_date' => 'required',
        'service_type' => 'required'
    ];

    
}
