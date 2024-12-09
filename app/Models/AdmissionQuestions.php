<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AdmissionQuestions
 * @package App\Models
 * @version December 9, 2024, 5:22 am UTC
 *
 * @property string $questions
 */
class AdmissionQuestions extends Model
{

    public $table = 'admission_questions';
    



    public $fillable = [
        'questions'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'questions' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'questions' => 'required'
    ];

    
}
