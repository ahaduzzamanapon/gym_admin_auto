<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymMealPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'diet_chart_id', 'meal_name', 'meal_time', 
        'food_items', 'quantity', 'calories',
    ];

    public function dietChart()
    {
        return $this->belongsTo(GymDietChart::class, 'diet_chart_id');
    }
}
