<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
