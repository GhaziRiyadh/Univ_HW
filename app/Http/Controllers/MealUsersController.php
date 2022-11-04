<?php

namespace App\Http\Controllers;

use App\Models\MealUsers;
use App\Http\Requests\StoreMealUsersRequest;
use App\Http\Requests\UpdateMealUsersRequest;

class MealUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMealUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMealUsersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MealUsers  $mealUsers
     * @return \Illuminate\Http\Response
     */
    public function show(MealUsers $mealUsers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MealUsers  $mealUsers
     * @return \Illuminate\Http\Response
     */
    public function edit(MealUsers $mealUsers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMealUsersRequest  $request
     * @param  \App\Models\MealUsers  $mealUsers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMealUsersRequest $request, MealUsers $mealUsers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MealUsers  $mealUsers
     * @return \Illuminate\Http\Response
     */
    public function destroy(MealUsers $mealUsers)
    {
        //
    }
}
