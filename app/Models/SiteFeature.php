<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SiteFeature
 * @package App\Models
 * @version November 27, 2024, 6:56 am UTC
 *
 * @property string $title
 * @property string $image
 * @property string $description
 */
class SiteFeature extends Model
{

    public $table = 'site_features';
    



    public $fillable = [
        'title',
        'image',
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
        'image' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        // 'image' => 'required',
        'description' => 'required'
    ];

    
}
