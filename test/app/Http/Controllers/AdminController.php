<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function store(){
       $data = [
            "first_name"=>"Test",
            "last_name"=>"user",
            "email"=>"test1@gmail.com",
            "mo_no"=> 6666666666,
            "gender"=>"male",
            "city_id"=>4,
            "address"=>"surat",
            "type"=>1,
            
       ];

       DB::table('admins')->insert($data);
       dd("Data create successfully");
    }
}
