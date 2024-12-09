<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class TermAndCondition
 * @package App\Models
 * @version December 9, 2024, 4:45 am UTC
 *
 * @property string $title
 */
class TermAndCondition extends Model
{

    public $table = 'termandconditions';
    



    public $fillable = [
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    
}
