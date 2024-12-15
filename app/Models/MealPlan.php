<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_name',      // Allow mass assignment for meal_name
        'description',    // Include other attributes you want to allow
    ];
}
