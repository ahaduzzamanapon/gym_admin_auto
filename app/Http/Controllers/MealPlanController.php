<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\GymmealPlan;
use App\Models\MealPlan;
use App\Models\FoodPlan;


class MealPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mealPlans = MealPlan::paginate(10);
      
        return view('meal_plans.index', compact('mealPlans'));
    }
    
    public function create()
    {
        return view('meal_plans.create');
    }
    
    public function store(Request $request)
    {

        $validated = $request->validate([
            'meal_name' => 'required|string|max:100',
            'quantity' => 'required',
            'calories' => 'required',
        ]);
      
        $data_array = array(
            'meal_name' => $request->meal_name,
            'description' => $request->description,
        );
        $mealPlan=MealPlan::create($data_array);
        $input=$request->all();
        foreach ($input['meal_name_f'] as $key => $value) {
            $data_array2 = array(
                'meal_plan_id' => $mealPlan->id,
                'meal_name' => $input['meal_name_f'][$key],
                'meal_time' => $input['meal_time'][$key],
                'food_items' => $input['food_items'][$key],
                'quantity' => $input['quantity'][$key],
                'calories' => $input['calories'][$key],
            );
            FoodPlan::insert($data_array2);
        }
        return redirect()->route('meal_plans.index')->with('success', 'meal plan created successfully!');
    }
    
    public function edit(MealPlan $mealPlan)
    {
        $mealPlan_id=$mealPlan->id;
        $foodplans = FoodPlan::where('meal_plan_id', $mealPlan_id)->get();
        return view('meal_plans.edit', compact('mealPlan','foodplans'));
    }
    
    public function update(Request $request, MealPlan $mealPlan)
    {
        $validated = $request->validate([
            'meal_name' => 'required|string|max:100',
        ]);
      
        $data_array = array(
            'meal_name' => $request->meal_name,
            'description' => $request->description,
        );

        $mealPlan->update($data_array);
        FoodPlan::where('meal_plan_id', $mealPlan->id)->delete();
        $input=$request->all();
        foreach ($input['meal_name_f'] as $key => $value) {
            $data_array2 = array(
                'meal_plan_id' => $mealPlan->id,
                'meal_name' => $input['meal_name_f'][$key],
                'meal_time' => $input['meal_time'][$key],
                'food_items' => $input['food_items'][$key],
                'quantity' => $input['quantity'][$key],
                'calories' => $input['calories'][$key],
            );
            FoodPlan::insert($data_array2);
        }
        return redirect()->route('meal_plans.index')->with('success', 'Meal plan updated successfully!');
    }
    
    public function destroy(MealPlan $mealPlan)
    {
        $mealPlan->delete();
        return redirect()->route('meal_plans.index')->with('success', 'Meal plan deleted successfully!');
    }
    public function show(MealPlan $mealPlan)
    {
        $mealPlan_id=$mealPlan->id;
        $foodplans = FoodPlan::where('meal_plan_id', $mealPlan_id)->get();
        return view('meal_plans.show', compact('mealPlan','foodplans'));
    }
    public function print_meal_plan(MealPlan $mealPlan)
    {
        $mealPlan_id=$mealPlan->id;
        $mealPlan = MealPlan::find($mealPlan_id);
        $foodplans = FoodPlan::where('meal_plan_id', $mealPlan_id)->get();
        return view('meal_plans.print_meal_plan', compact('mealPlan','foodplans'));
    }
   
}
