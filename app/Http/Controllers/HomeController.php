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
        $data = new Appiontment;


        if (Auth::id()){
            $data->name = $request->name;
            $data->email = $request->email;
            $data->date = $request->date;
            $data->phone = $request->phone;
            $data->message = $request->message;
            $data->doctor = $request->doctor;
            $data->status = 'In Progress';
            $data->user_id = Auth::user()->id;

            $data->save();
            return redirect()->back()->with('appointment_message', 'Appointment Successfully Done.');

        }
        else{
            return redirect()->back()->with('appointment_message', 'You have  to  registration first for Appointment.');

        }


    }
}
