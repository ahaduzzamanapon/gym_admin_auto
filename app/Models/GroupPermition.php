<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class GroupPermition
 * @package App\Models
 * @version November 19, 2024, 4:18 am UTC
 *
 * @property integer $group_id
 * @property integer $permission_id
 */
class GroupPermition extends Model
{

    public $table = 'grouppermitions';
    



    public $fillable = [
        'group_id',
        'permission_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'group_id' => 'integer',
        'permission_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'group_id' => 'required',
        'permission_id' => 'required'
    ];

    
}
