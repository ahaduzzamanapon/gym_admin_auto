<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_plan_id',
        'meal_name',
        'meal_time',
        'food_items',
        'quantity',
        'calories',
    ];
}
