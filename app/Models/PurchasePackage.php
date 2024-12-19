<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class PurchasePackage
 * @package App\Models
 * @version November 19, 2024, 7:18 am UTC
 *
 * @property integer $member_id
 * @property integer $package_id
 * @property integer $coupons_id
 * @property integer $amount
 * @property integer $tax
 * @property integer $coupon_amount
 * @property integer $gross_amount
 */
class PurchasePackage extends Model
{

    public $table = 'purchasepackages';
    



    public $fillable = [
        'member_id',
        'package_id',
        'coupons_id',
        'amount',
        'tax',
        'coupon_amount',
        'gross_amount',
        'pay_amount',
        'due_amount',
        'status',
        'expired_date',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'member_id' => 'integer',
        'package_id' => 'integer',
        'coupons_id' => 'string',
        'amount' => 'integer',
        'tax' => 'integer',
        'coupon_amount' => 'integer',
        'gross_amount' => 'integer',
        'pay_amount' => 'integer',
        'due_amount' => 'integer',
        'status' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'member_id' => 'required',
        'package_id' => 'required',
        'amount' => 'required',
        'gross_amount' => 'required',
        'pay_amount' => 'required',
    ];

    
}
