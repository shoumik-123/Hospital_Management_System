<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addView()
    {
        return view('admin.add_doctor');
    }

    public function uploadDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:11',
            'roomNumber' => 'required|string|max:50',
            'speciality' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $doctor = new Doctor;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('doctorImages'), $imageName);
            $doctor->image = $imageName;
        }

        $doctor->name = $request->name;
        $doctor->phone = $request->number;
        $doctor->roomNumber = $request->roomNumber;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()->with('success', 'Doctor added successfully.');
    }


}
