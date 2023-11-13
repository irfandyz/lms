<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Lecture;

class LectureController extends Controller
{
    public function create(request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'description'=>'required',
            'category_id'=>'required|array',
        ]);
        $lecture = Lecture::create([
            'user_id'=>Auth::user()->id,
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
        ]);
        $lecture->category()->sync($request->category_id);
        return redirect(Auth::user()->role.'/lecture?id='.$lecture->id);
    }
}
