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
        'mem_name',
        'mem_father',
        'mem_address',
        'mem_admission_date',
        'mem_cell',
        'mem_email',
        'mem_img_url',
        'group_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'mem_name' => 'string',
        'mem_father' => 'string',
        'mem_address' => 'string',
        'mem_admission_date' => 'date',
        'mem_cell' => 'string',
        'mem_email' => 'string',
        'mem_img_url' => 'string',
        'group_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mem_name' => 'required',
        'mem_father' => 'required',
        'mem_admission_date' => 'required',
        'mem_cell' => 'required',
        'mem_email' => 'required'
    ];

    
}
