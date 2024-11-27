<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AboutUs
 * @package App\Models
 * @version November 27, 2024, 8:01 am UTC
 *
 * @property string $Text
 */
class AboutUs extends Model
{

    public $table = 'about_us';
    



    public $fillable = [
        'Text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Text' => 'required'
    ];

    
}
