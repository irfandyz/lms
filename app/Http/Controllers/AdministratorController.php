<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Lecture;
use App\Models\Lesson;
use Auth;

class AdministratorController extends Controller
{
    public function lecture(request $request){
        $lectures = Lecture::where('user_id',Auth::user()->id)->paginate(6);
        $lecture = null;
        $lesson = null;
        if ($request->id) {
            $lecture = Lecture::find($request->id);
            $lesson = Lesson::where('lecture_id',$lecture->id)->get();
        }
        return view('administrator.lecture.lecture',compact('lecture','lectures','lesson'));
    }
    public function create(){
        $categories = Category::get();
        return view('administrator.lecture.create',compact('categories'));
    }
    public function lesson(request $request){
        if (!$request->id or !Lecture::find($request->id)) {
            return redirect()->back();
        }
        return view('administrator.lesson.create');
    }
    public function dashboard(){
        return view('administrator.dashboard');
    }
}
