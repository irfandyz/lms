<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function explore(){
        return view('user.lecture.explore');
    }
    public function index(){
        return view('user.lecture.index');
    }
}
