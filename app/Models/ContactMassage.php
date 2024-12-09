<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class ContactMassage
 * @package App\Models
 * @version November 27, 2024, 9:54 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $message
 */
class ContactMassage extends Model
{

    public $table = 'contact_massages';
    



    public $fillable = [
        'name',
        'email',
        'subject',
        'phone',
        'message'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'subject' => 'string',
        'message' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
