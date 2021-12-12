<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index(Request $request){

        $minRating = 3.5;
        $maxRating = 5;
        $places = Product::whereHas('rating', function ($query) use ($minRating, $maxRating) {
            $query->havingRaw('AVG(ratings.rating) >= ?', [$minRating])
                ->havingRaw('AVG(ratings.rating) <= ?', [$maxRating]);
        })->get();
       

        $adminProduct = Product::whereNotNull('is_admin')->get();
         return view('frontend.index',compact('adminProduct','places'));


    }

    public function product($id){

        $products = Product::where('cat_id',$id)->get();
        return view('frontend.product',compact('products'));
    }
    public function chatindex(){
        return redirect()->to(route('inbox.index'));
    }


}
