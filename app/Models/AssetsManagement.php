<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AssetsManagement
 * @package App\Models
 * @version November 20, 2024, 7:13 am UTC
 *
 * @property string $item_name
 * @property string $item_description
 * @property string $location
 * @property string $status
 */
class AssetsManagement extends Model
{

    public $table = 'assets_managements';
    



    public $fillable = [
        'item_name',
        'assets_categories_id',
        'branch_id',
        'asset_for',
        'item_quantity',
        'item_description',
        'location',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'item_name' => 'string',
        'item_description' => 'string',
        'location' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'item_name' => 'required'
    ];

    
}
