<?php

namespace App\Http\Controllers\api;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;
use ChristianKuri\LaravelFavorite\Models\Favorite;
use Cart;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    use Favoriteability;
    public function favouriteToggle(Request $request){
        $user=User::findorfail($request->user_id);
        $product=Product::findorfail($request->item_id);
        $user->toggleFavorite($product);
        return response()->json();

    }


    public function AddCart($id){
        $client_id = auth('client')->user()->id;
        $product = Product::where('id',$id)->first();
        foreach($product->image as $prod){




    }


        $cartContent =  Cart::add(['id' => $product->id,'weight'=>'530','color'=>$product->color,'client'=>Auth::id(), 'name' =>$product->name, 'qty' => 1, 'price' => $product->total_price,'brand'=>$product->brand,'status'=>$product->status, 'options' => ['img' => $prod->filename,'client'=> $client_id]]);

        return response()->json();
    }

    public function searchProaj($pro){
        $string = preg_replace('/\s+/', '', $pro);
      $product =   Product::where('name',$string)->get();
    //   return response()->json($product[0]->image[0]->filename);

    //   $image =   Product::where('name',$string)->first();
    //   $img = $image->image[0]->filename;
        return response()->json(['data'=>$product]);
    
    }
    
}
