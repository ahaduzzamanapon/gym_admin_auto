<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Package
 * @package App\Models
 * @version November 18, 2024, 5:36 am UTC
 *
 * @property string $pack_name
 * @property integer $pack_admission_fee
 * @property string $pack_duration
 * @property integer $pack_status
 */
class Package extends Model
{

    public $table = 'packages';
    



    public $fillable = [
        'pack_name',
        'branch_id',
        'pack_image',
        'pack_admission_fee',
        'pack_duration',
        'pack_status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pack_name' => 'string',
        'pack_admission_fee' => 'integer',
        'pack_duration' => 'string',
        'pack_status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pack_name' => 'required',
        'pack_admission_fee' => 'required',
        'pack_duration' => 'required'
    ];

    
}
