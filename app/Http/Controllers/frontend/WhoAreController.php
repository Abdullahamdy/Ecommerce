<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\whoAre;
use Illuminate\Http\Request;

class WhoAreController extends Controller
{
    public function index(){
        $whoAre = whoAre::first();
return view('frontend.who_are',compact('whoAre'));
    }
}
