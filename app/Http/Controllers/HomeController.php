<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appiontment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\If_;

class HomeController extends Controller
{
    public function redirect()
    {
        if (Auth::check()) {
            if (Auth::user()->userType == 0) {
                $doctor = doctor::all();
                return view('user.home' , compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        if (Auth::id()){
            return redirect('home');
        }
        else{
            $doctor = doctor::all();
            return view('index' , compact('doctor'));
        }
    }


    //solve  hy  nai
    public function appointment(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date',
            'doctor' => 'required|string',
            'number' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $data = new Appiontment;

        if (Auth::check()) {
            $userId = Auth::id();

            $data->name = $request->name;
            $data->email = $request->email;
            $data->date = $request->date;
            $data->phone = $request->number; // Corrected assignment
            $data->message = $request->message;
            $data->doctor = $request->doctor;
            $data->status = 'In Progress';
            $data->user_id = $userId;

            $data->save();
            return redirect()->back()->with('success', 'Appointment Successfully Done.');
        } else {
            return redirect()->back()->with('success', 'You have to register first for an Appointment.');
        }
    }

    public function myAppointment()
    {
        if (Auth::check()){
            $userId = Auth::user()->id;
            $appoint = Appiontment::where('user_id' , $userId )->get();
//            return view('user.myAppointment' , compact('appoint'));    //both are  right
            return view('user.myAppointment' , ['appoint' => $appoint]);
        }

        else{
            return redirect()->back();
        }
    }

    public function cancelAppointment($id)
    {
        $data = Appiontment::find($id);
        $data -> delete();
        return redirect()->back()->with('success', 'Appointment Successfully Delete.');
    }

}
