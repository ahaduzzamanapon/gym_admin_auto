<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Notice
 * @package App\Models
 * @version December 1, 2024, 10:52 am UTC
 *
 * @property string $title
 * @property string $description
 */
class Notice extends Model
{

    public $table = 'notices';
    



    public $fillable = [
        'title',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required'
    ];

    
}
