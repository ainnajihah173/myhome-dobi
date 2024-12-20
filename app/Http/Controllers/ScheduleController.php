<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Staff;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Set the session flag when the schedule page is viewed
        session(['schedule_viewed' => true]);
        $staff = Staff::with('user')->get(); // Fetch all staff with their associated user
        return view('schedule.index', compact('staff'));
    }

    // Fetch schedules for the calendar
    public function getSchedules()
    {
        $schedules = Schedule::with('staff.user')->get();

        // Map data into FullCalendar format
        $events = $schedules->map(function ($schedule) {
            return [
                'id' => $schedule->id,
                'title' => $schedule->staff->user->name, // Event title is the staff's name
                'start' => $schedule->start_time,        // Event start datetime
                'end' => $schedule->end_time,            // Event end datetime
                'category' => $schedule->category,       // Add category (e.g., 'bg-danger')
                'extendedProps' => [
                    'role' => $schedule->staff->role,    // Staff role (e.g., 'washer', 'dryer')
                    'staff_id' => $schedule->staff_id,    // Staff ID
                ],
            ];
        });

        return response()->json($events); // Return the events as JSON
    }


    // Fetch staff to display in the dropdown
    public function getAllStaff()
    {
        $staff = Staff::with('user')->get(); // Fetch staff with user info
        return response()->json($staff);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ensure only Admin can create schedules
        if (auth()->user()->role !== 'Admin') {
            abort(403, 'Unauthorized action.');
        }

        $validatedData = $request->validate([
            'staff_id'   => 'required|exists:staff,id',
            'category'   => 'required|string',
            'start_time' => 'required|date',
            'end_time'   => 'required|date|after:start_time',
        ]);
    
        // Save the schedule in the database
        Schedule::create($validatedData);
        
        // Redirect to the index page with a success message
        return redirect()->route('schedule.index')->with('success', 'Schedule created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('schedule.index')->with('success', 'Schedule deleted successfully!');
    }
}
