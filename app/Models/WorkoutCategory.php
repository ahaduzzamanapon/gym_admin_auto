<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class WorkoutCategory
 * @package App\Models
 * @version December 10, 2024, 9:07 am UTC
 *
 * @property string $title
 */
class WorkoutCategory extends Model
{

    public $table = 'workout_categorys';
    



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
