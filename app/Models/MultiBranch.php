<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class MultiBranch
 * @package App\Models
 * @version December 10, 2024, 4:23 am UTC
 *
 * @property string $branch_name
 * @property string $address
 * @property string $phone_number
 * @property string $email
 * @property string $manager_name
 */
class MultiBranch extends Model
{

    public $table = 'multi_branchs';
    



    public $fillable = [
        'branch_name',
        'address',
        'phone_number',
        'email',
        'manager_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'branch_name' => 'string',
        'address' => 'string',
        'phone_number' => 'string',
        'email' => 'string',
        'manager_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'branch_name' => 'required',
        'address' => 'required',
        'phone_number' => 'required',
        'email' => 'required',
        'manager_name' => 'required'
    ];

    
}
