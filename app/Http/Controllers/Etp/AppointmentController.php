<?php

namespace App\Http\Controllers\Etp;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_account_id' => ['required'],
            'title' => ['required'],
            'max_orders' => ['required', 'integer'],
            'valid_from' => ['required', 'date'],
            'valid_to' => ['required', 'date'],
            'order_start_time' => ['required', 'date_format:H:i'],
            'order_end_time' => ['required', 'date_format:H:i', 'after:order_start_time'],
            'workdays' => ['required'],
        ]);
        $appointment = new Appointment;
        $appointment->business_account_id = $request->business_account_id;
        $appointment->title = $request->title;
        $appointment->max_orders = $request->max_orders;
        $appointment->valid_from = $request->valid_from;
        $appointment->valid_to = $request->valid_to;
        $appointment->order_start_time = $request->order_start_time;
        $appointment->order_end_time = $request->order_end_time;
        $appointment->workdays = $request->workdays;
        $appointment->save();
        return response()->json([
            'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
