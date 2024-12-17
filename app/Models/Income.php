<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Income
 * @package App\Models
 * @version November 18, 2024, 9:26 am UTC
 *
 * @property string $title
 * @property integer $amount
 * @property string $description
 */
class Income extends Model
{

    public $table = 'incomes';
    



    public $fillable = [
        'title',
        'branch_id',
        'member_id',
        'amount',
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
        'amount' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'amount' => 'required'
    ];

    
}
