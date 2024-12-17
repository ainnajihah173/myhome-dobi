<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all staff with their user details
        $staffs = Staff::with('user')->get();

        // Return the view with the staff data
        return view('staff.index', compact('staffs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required|in:Male,Female',
            'address' => 'required|string',
            'role' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        // Save the user data to the users table
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'contact_number' => $validated['contact_number'],
            'role' => 'Staff', // Set role as Staff
        ]);

        // Save staff-specific details to the staff table
        $user->staff()->create([
            'gender' => $validated['gender'],
            'role' => $validated['role'],
            'address' => $validated['address'],
        ]);

        // Redirect back with a success message
        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    // public function schedule()
    // {
    //     return view('staff.schedule');
    // }


    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        // return view('staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'string|max:255',
            'contact_number' => 'string|max:15',
            'email' => 'email|unique:users,email,' . $staff->user->id,
            'gender' => 'in:Male,Female',
            'address' => 'string',
            'role' => 'string',
            'password' => 'nullable|string|min:8', // Allow password to be nullable
        ]);

        // Prepare user update data
        $userData = [
            'name' => $validated['name'],
            'contact_number' => $validated['contact_number'],
            'email' => $validated['email'],
        ];

        // Update password if provided
        if (!empty($validated['password'])) {
            $userData['password'] = bcrypt($validated['password']);
        }

        // Update user info
        $staff->user->update($userData);

        // Update staff info
        $staff->update([
            'gender' => $validated['gender'],
            'role' => $validated['role'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->user->delete(); // Deletes user and cascades to staff
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
