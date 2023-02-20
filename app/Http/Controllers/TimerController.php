<?php

namespace App\Http\Controllers;

use App\Models\Timer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //validation
        $request->validate([
            'date' => 'nullable|date_format:Ymd',
            'user' => 'nullable|integer',
        ]);

        $query = Timer::query();

        //date filter
        if ($request->has('date')) { 
            $date = Carbon::createFromFormat('Ymd', $request->date);

            $query = $query->whereDate('started_at', '>', $date->clone()->startOfWeek()->subSecond()->format("Y-m-d H:i:s"))
                ->whereDate('started_at', '<', $date->clone()->endOfWeek()->format("Y-m-d H:i:s"));
        }

        //user filter
        if ($request->has('user')) { 
            $query = $query->where('user_id', $request->user);
        }

        return $query->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'group_id' => 'required',
            'user_id' => 'required|integer',
            'project_id' => 'required|integer',
            'started_at' => 'required',
            'ended_at' => 'nullable',
            'duration' => 'nullable|integer',
            'notes' => 'nullable|string',
            'deleted_at' => 'nullable',
        ]);

        return Timer::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Timer::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            'group_id' => 'required',
            'user_id' => 'required|integer',
            'project_id' => 'required|integer',
            'started_at' => 'required|timestamp',
            'ended_at' => 'nullable|timestamp',
            'duration' => 'nullable|integer',
            'notes' => 'nullable|string',
            'deleted_at' => 'nullable',
        ]);

        $timer = Timer::findOrFail($id);

        return $timer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timer  $timer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timer $timer)
    {
        //
    }
}
