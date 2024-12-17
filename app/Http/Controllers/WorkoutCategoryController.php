<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkoutCategoryRequest;
use App\Http\Requests\UpdateWorkoutCategoryRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\WorkoutCategory;
use Illuminate\Http\Request;
use Flash;
use Response;

class WorkoutCategoryController extends AppBaseController
{
    /**
     * Display a listing of the WorkoutCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        /** @var WorkoutCategory $workoutCategories */
        $workoutCategories = WorkoutCategory::all();

        return view('workout_categories.index')
            ->with('workoutCategories', $workoutCategories);
    }

    /**
     * Show the form for creating a new WorkoutCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('workout_categories.create');
    }

    /**
     * Store a newly created WorkoutCategory in storage.
     *
     * @param CreateWorkoutCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateWorkoutCategoryRequest $request)
    {
        $input = $request->all();

        /** @var WorkoutCategory $workoutCategory */
        $workoutCategory = WorkoutCategory::create($input);

        Flash::success('Workout Category saved successfully.');

        return redirect(route('workoutCategories.index'));
    }

    /**
     * Display the specified WorkoutCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var WorkoutCategory $workoutCategory */
        $workoutCategory = WorkoutCategory::find($id);

        if (empty($workoutCategory)) {
            Flash::error('Workout Category not found');

            return redirect(route('workoutCategories.index'));
        }

        return view('workout_categories.show')->with('workoutCategory', $workoutCategory);
    }

    /**
     * Show the form for editing the specified WorkoutCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var WorkoutCategory $workoutCategory */
        $workoutCategory = WorkoutCategory::find($id);

        if (empty($workoutCategory)) {
            Flash::error('Workout Category not found');

            return redirect(route('workoutCategories.index'));
        }

        return view('workout_categories.edit')->with('workoutCategory', $workoutCategory);
    }

    /**
     * Update the specified WorkoutCategory in storage.
     *
     * @param int $id
     * @param UpdateWorkoutCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkoutCategoryRequest $request)
    {
        /** @var WorkoutCategory $workoutCategory */
        $workoutCategory = WorkoutCategory::find($id);

        if (empty($workoutCategory)) {
            Flash::error('Workout Category not found');

            return redirect(route('workoutCategories.index'));
        }

        $workoutCategory->fill($request->all());
        $workoutCategory->save();

        Flash::success('Workout Category updated successfully.');

        return redirect(route('workoutCategories.index'));
    }

    /**
     * Remove the specified WorkoutCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var WorkoutCategory $workoutCategory */
        $workoutCategory = WorkoutCategory::find($id);

        if (empty($workoutCategory)) {
            Flash::error('Workout Category not found');

            return redirect(route('workoutCategories.index'));
        }

        $workoutCategory->delete();

        Flash::success('Workout Category deleted successfully.');

        return redirect(route('workoutCategories.index'));
    }
}
