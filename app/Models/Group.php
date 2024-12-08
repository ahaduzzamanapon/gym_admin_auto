<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Group
 * @package App\Models
 * @version November 19, 2024, 3:59 am UTC
 *
 * @property string $name
 * @property string $key
 */
class Group extends Model
{

    public $table = 'groups';
    



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
        'key' => 'required',
        'permissions' => 'required'
    ];

    
}
