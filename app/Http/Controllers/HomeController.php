<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use App\Models\Neww;
use App\Models\Product;
use App\Models\Qusetion;
use App\Models\Servece;
use App\Models\whoAre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }



}
