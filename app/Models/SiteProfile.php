<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class SiteProfile
 * @package App\Models
 * @version November 27, 2024, 5:59 am UTC
 *
 * @property string $logo_name
 * @property string $banner_status
 * @property string $banner_image
 * @property string $banner_video
 * @property string $title
 * @property string $small_banner_text
 * @property string $big_banner_text
 * @property string $fotter_text
 */
class SiteProfile extends Model
{

    public $table = 'site_profiles';
    



    public $fillable = [
        'logo_name',
        'banner_status',
        'banner_image',
        'banner_video',
        'title',
        'small_banner_text',
        'big_banner_text',
        'fotter_text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'logo_name' => 'string',
        'banner_status' => 'string',
        'banner_image' => 'string',
        'banner_video' => 'string',
        'title' => 'string',
        'small_banner_text' => 'string',
        'big_banner_text' => 'string',
        'fotter_text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'logo_name' => 'required',
        'banner_status' => 'required',
        'banner_image' => '',
        'banner_video' => '',
        'title' => 'required',
        'small_banner_text' => 'required',
        'big_banner_text' => 'required',
        'fotter_text' => 'required'
    ];

    
}
