<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Product
 * @package App\Models
 * @version November 18, 2024, 5:51 am UTC
 *
 * @property string $product_name
 * @property integer $product_price
 * @property integer $product_qty
 * @property string $product_img_url
 */
class Product extends Model
{

    public $table = 'products';
    



    public $fillable = [
        'product_name',
        'branch_id',
        'product_price',
        'product_qty',
        'product_img_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'product_name' => 'string',
        'product_price' => 'integer',
        'product_qty' => 'integer',
        'product_img_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'product_name' => 'required',
        'product_price' => 'required',
        'product_qty' => 'required'
    ];

    
}
