<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SiteTrainer
 * @package App\Models
 * @version November 27, 2024, 9:06 am UTC
 *
 * @property string $trainer_name
 * @property string $trainer_type
 * @property string $image
 * @property string $description
 * @property string $facebook_link
 * @property string $twitter
 * @property string $linkedin
 */
class SiteTrainer extends Model
{

    public $table = 'site_trainers';
    



    public $fillable = [
        'trainer_name',
        'trainer_type',
        'image',
        'description',
        'facebook_link',
        'twitter',
        'linkedin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'trainer_name' => 'string',
        'trainer_type' => 'string',
        'image' => 'string',
        'description' => 'string',
        'facebook_link' => 'string',
        'twitter' => 'string',
        'linkedin' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'trainer_name' => 'required',
        'trainer_type' => 'required',
        'image' => 'required'
    ];

    
}
