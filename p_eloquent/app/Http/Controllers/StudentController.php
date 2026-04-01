<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudent(){

    $students = \App\Models\Student::all();
        return view('/student', ['data'=>$students ]);
    }
}
