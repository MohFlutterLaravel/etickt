<?php

namespace App\Http\Controllers\Etp;

use App\Http\Controllers\Controller;
use App\Models\BusinessCategory;
use Illuminate\Http\Request;

class BusinessCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BusinessCategory::select('id', 'category_name')->get();
        return response()->json([
            $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessCategory $businessCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessCategory  $businessCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessCategory $businessCategory)
    {
        //
    }
}
