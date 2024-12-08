<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Healthmetrics
 * @package App\Models
 * @version November 18, 2024, 6:30 am UTC
 *
 * @property \App\Models\members $members
 * @property integer $member_id
 * @property string $measurement_date
 * @property string $weight
 * @property string $height
 * @property string $bmi
 * @property string $body_fat_percentage
 * @property string $muscle_mass
 * @property string $hydration_level
 */
class Healthmetrics extends Model
{

    public $table = 'healthmetricss';
    



    public $fillable = [
        'member_id',
        'measurement_date',
        'weight',
        'height',
        'bmi',
        'bmi_status',
        'body_fat_percentage',
        'muscle_mass',
        'hydration_level',
        'chest',
        'waist',
        'hips',
        'thighs',
        'arms',
        'forearms',
        'neck',
        'shoulders',
        'calves',
        'resting_heart_rate'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'member_id' => 'integer',
        'measurement_date' => 'date',
        'weight' => 'string',
        'height' => 'string',
        'bmi' => 'string',
        'bmi_status' => 'string',
        'body_fat_percentage' => 'string',
        'muscle_mass' => 'string',
        'hydration_level' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'member_id' => 'required',
        'measurement_date' => 'required',
        'weight' => 'required',
        'height' => 'required',
        'bmi' => 'required',
        'bmi_status' => 'required',
        'body_fat_percentage' => 'required',
        'muscle_mass' => 'required',
        'hydration_level' => 'required',
        'chest' => 'required',
        'waist' => 'required',
        'hips' => 'required',
        'thighs' => 'required',
        'arms' => 'required',
        'forearms' => 'required',
        'neck' => 'required',
        'shoulders' => 'required',
        'calves' => 'required',
        'resting_heart_rate' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function members()
    {
        return $this->hasOne(\App\Models\members::class, 'id', 'member_id');
    }
}
