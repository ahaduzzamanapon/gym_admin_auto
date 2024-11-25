<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymDietChart extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 
        'member_name', 
        'age', 
        'gender', 
        'height', 'weight', 
        'body_fat_percentage', 'goal', 'meal_preference', 
        'caloric_requirement', 'protein_grams', 'carbs_grams', 
        'fats_grams', 'water_intake', 'special_instructions',
        'meal_plan_id', 
        'from_date', 
        'to_date', 
       
    ];

    // public function mealPlans()
    // {
    //     return $this->hasMany(GymMealPlan::class, 'diet_chart_id');
    // }
}
