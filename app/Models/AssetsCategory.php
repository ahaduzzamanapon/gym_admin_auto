<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class AssetsCategory
 * @package App\Models
 * @version November 20, 2024, 9:54 am UTC
 *
 * @property string $category_name
 * @property string $description
 */
class AssetsCategory extends Model
{

    public $table = 'assets_categorys';
    



    public $fillable = [
        'category_name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_name' => 'required'
    ];

    
}
