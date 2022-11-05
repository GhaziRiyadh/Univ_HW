<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Http\Requests\StoreMealRequest;
use App\Http\Requests\UpdateMealRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Meal $meal = null)
    {
        return view('web.meals.index', [
            'meal' => $meal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMealRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateMealRequest $request, Meal $meal = null)
    {
        if (!$meal) {
            $request->validate(['image' => 'required|image']);
        }
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if (File::exists(storage_path("app/{$meal?->image}")))
                File::delete(storage_path("app/{$meal?->image}"));
            $data['image'] = '/' . $request->file('image')->store('Meals', options: 'upload');
        }
        Meal::query()->updateOrCreate(['id' => $meal?->id], $data);

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meal $meal)
    {
        if (File::exists(storage_path("app/{$meal->image}")))
            File::delete(storage_path("app/{$meal->image}"));
        $meal->delete();

        return redirect()->route('home');
    }
}
