<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Permission
 * @package App\Models
 * @version November 19, 2024, 4:02 am UTC
 *
 * @property string $name
 * @property string $key
 */
class Permission extends Model
{

    public $table = 'permissions';
    



    public $fillable = [
        'name',
        'key'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'key' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'key' => 'required'
    ];

    
}
