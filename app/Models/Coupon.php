<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Coupon
 * @package App\Models
 * @version November 18, 2024, 11:45 am UTC
 *
 * @property string $title
 * @property string $coupon_code
 * @property string $expire_date
 * @property integer $amount
 * @property string $note
 */
class Coupon extends Model
{

    public $table = 'coupons';
    



    public $fillable = [
        'title',
        'coupon_code',
        'expire_date',
        'amount',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'coupon_code' => 'string',
        'expire_date' => 'date',
        'amount' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'coupon_code' => 'required',
        'expire_date' => 'required',
        'amount' => 'required'
    ];

    
}
