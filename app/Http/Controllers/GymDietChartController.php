<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GymDietChart;
use App\Models\GymMealPlan;
use App\Models\MealPlan;
use App\Models\FoodPlan;
use DB;


class GymDietChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(if_can('member_manage')):
            $dietCharts = GymDietChart::paginate(10);
        else:
            $dietCharts = GymDietChart::where('member_id', auth()->user()->member_id)->paginate(10);
        endif;
        return view('diet_charts.index', compact('dietCharts'));
    }
    
    public function create()
    {
        return view('diet_charts.create');
    }
 
    public function store(Request $request)
    {

        $validated = $request->validate([
            'member_name' => 'required|string|max:100',
            'age' => 'required|integer',
            'gender' => 'required|in:Male,Female,Other',
        ]);
        // member_id	member_name	age	gender	height	weight	body_fat_percentage	goal	meal_preference	caloric_requirement	protein_grams	carbs_grams	fats_grams	water_intake	special_instructions	created_at	updated_at	
        $member_data=explode(',', $request->member_name);
        $member_name=$member_data[0];
        $member_id=$member_data[1];
        $data_array = array(
            'member_id' => $member_id,
            'member_name' => $member_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'body_fat_percentage' => $request->body_fat_percentage,
            'goal' => $request->goal,
            'meal_preference' => $request->meal_preference,
            'caloric_requirement' => $request->caloric_requirement,
            'protein_grams' => $request->protein_grams,
            'carbs_grams' => $request->carbs_grams,
            'fats_grams' => $request->fats_grams,
            'water_intake' => $request->water_intake,
            'meal_plan_id' => $request->meal_plan_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'special_instructions' => $request->special_instructions,
        );
        $dietChart=GymDietChart::create($data_array);
        return redirect()->route('diet_charts.index')->with('success', 'Diet chart created successfully!');
    }
    
    public function edit(GymDietChart $dietChart)
    {
        $dietChart_id=$dietChart->id;
        // $mealplans = GymMealPlan::where('diet_chart_id', $dietChart_id)->get();
        return view('diet_charts.edit', compact('dietChart'));
    }
    
    public function update(Request $request, GymDietChart $dietChart)
    {
        $validated = $request->validate([
            'member_name' => 'required|string|max:100',
            'age' => 'required|integer',
            'gender' => 'required|in:Male,Female,Other',
        ]);
        // member_id	member_name	age	gender	height	weight	body_fat_percentage	goal	meal_preference	caloric_requirement	protein_grams	carbs_grams	fats_grams	water_intake	special_instructions	created_at	updated_at	
        $member_data=explode(',', $request->member_name);
        $member_name=$member_data[0];
        $member_id=$member_data[1];
        $data_array = array(
            'member_id' => $member_id,
            'member_name' => $member_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'body_fat_percentage' => $request->body_fat_percentage,
            'goal' => $request->goal,
            'meal_preference' => $request->meal_preference,
            'caloric_requirement' => $request->caloric_requirement,
            'protein_grams' => $request->protein_grams,
            'carbs_grams' => $request->carbs_grams,
            'fats_grams' => $request->fats_grams,
            'water_intake' => $request->water_intake,
            'meal_plan_id' => $request->meal_plan_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'special_instructions' => $request->special_instructions,
        );
        $dietChart->update($data_array);
       
        return redirect()->route('diet_charts.index')->with('success', 'Diet chart updated successfully!');
    }
    
    public function destroy(GymDietChart $dietChart)
    {
        $dietChart->delete();
        return redirect()->route('diet_charts.index')->with('success', 'Diet chart deleted successfully!');
    }
    
    public function show(GymDietChart $dietChart)
    {
        $dietChart_id=$dietChart->id;
        return view('diet_charts.show', compact('dietChart'));
    }



    public function getDataByUserId(){
        return DB::table('members')->where('id',$_POST['user_id'])->where('mem_type', 'member')->get();
    }
    
    public function print_diet_chart($dietChart)
    {
        $dietChart = GymDietChart::find($dietChart);
        $mealPlan_id=$dietChart->meal_plan_id;
        $mealPlan = MealPlan::find($mealPlan_id);
        $foodplans = FoodPlan::where('meal_plan_id', $mealPlan_id)->get();
        return view('diet_charts.print_diet_chart', compact('dietChart','mealPlan','foodplans'));
    }
}
