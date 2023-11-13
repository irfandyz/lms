<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Lecture;
use Auth;

class AdministratorController extends Controller
{
    public function lecture(request $request){
        $lectures = Lecture::where('user_id',Auth::user()->id)->get();
        $lecture = null;
        if ($request) {
            $lecture = Lecture::find($request->id);
        }
        return view('administrator.lecture.lecture',compact('lecture','lectures'));
    }
    public function create(){
        $categories = Category::get();
        return view('administrator.lecture.create',compact('categories'));
    }
    public function dashboard(){
        return view('administrator.dashboard');
    }
}
