<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Requisition
 * @package App\Models
 * @version November 18, 2024, 8:55 am UTC
 *
 * @property string $Title
 * @property integer $member_id
 * @property integer $product_id
 * @property integer $status
 */
class Requisition extends Model
{

    public $table = 'requisitions';
    



    public $fillable = [
        'Title',
        'member_id',
        'product_id',
        'qty',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Title' => 'string',
        'member_id' => 'integer',
        'product_id' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Title' => 'required',
        'member_id' => 'required',
        'product_id' => 'required',
        'qty' => 'required'
    ];

    
}
