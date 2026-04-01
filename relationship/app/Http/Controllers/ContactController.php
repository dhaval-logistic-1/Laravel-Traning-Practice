<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show(){
        $contect = Contact::with('student')->get();
        return $contect;
    }
}
