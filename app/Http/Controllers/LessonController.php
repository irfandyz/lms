<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use Auth;

class LessonController extends Controller
{
    public function create(request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'file'=>'required|mimes:mkv,mp4,mov,wmv',
        ]);
        $file = $request->file;
        $url = 'assets/lesson-video';
        $filename = date('dmYHis'). "." . $file->extension();
        $file->move(public_path($url), $filename);

        $lesson = Lesson::create([
            'title'=>$request->title,
            'lecture_id'=>$request->lecture_id,
            'file'=>$filename,
            'description'=>$request->description,
        ]);
        return redirect(Auth::user()->role.'/lecture?id='.$request->lecture_id);
    }
}
