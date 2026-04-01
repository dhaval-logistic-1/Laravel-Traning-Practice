<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class AdminController extends Controller
{
    public function store()
    {
        $data = [
            "first_name" => "dhaval",
            "last_name" => "user",
            "email" => "Dhava11@gmail.com",
            "mo_no" => 6665555656,
            "gender" => "male",
            "city_id" => 4,
            "address" => "surat",
            "type" => 1,

        ];

        DB::table('andmin')->insert($data);
        dd("Data create successfully");
    }

    public function list()
    {
        $user = DB::table('andmin')->get();
        // dd($admin->toArray());
        // dd($admin[1], $admin[0]->email);

        // foreach ($admin as $admin) {
        //     dump($admin);
        // }

        return view('user_list',compact('user'));
    }

    public function update(Request $req){
        $id=1;
        $data = [
            "first_name" => "Dhaval",
            "last_name" => "nbxckjb",
            "mo_no" => 6665555656,
            "gender" => "male",
            "city_id" => 4,
            "address" => "surat",
            "type" => 1,
            "updated_at" => now(), 

        ];

        DB::table('andmin')->where('id',$id)->update($data);
        dd('data succesfully update',$data);


    }

    public function delete(){

        $id=3;

        Db::table('andmin')->where('id',$id)->delete();

        dd("Delete Data successfully");
    }
}
