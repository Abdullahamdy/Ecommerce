<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Rating;
use App\User;
use Cart;
use Illuminate\Support\Str;
use ChristianKuri\LaravelFavorite\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{



    public function addProduct(){
       return view('frontend.add_product');
    }
    public function insertProduct(Request $request){
        $rules =
        [
            'name' => 'required',
            'price' => 'required',
            'cat_id' => 'required',
            'brand' => 'required',
            'image'=>'array|required',
            'price'=>'required',
            'size'=>'required',
            'color'=>'required',
            'status'=>'required',
            'brand'=>'required',
            

        ];

    $error_sms =
        [
            'name.required' => 'الرجاء ادخال الاسم ',
            'price.required' => 'الرجاء ادخال السعر ',
            'cat_id.required'=>'الرجاء ادخال القسم التابع',
            'brand.required'=>'الرجاء ادخال اسم الشركه',
            'size.required'=>'الرجاء ادخال  المقاس',
            'status.required'=>'الرجاء ادخال  حالة المنتج',
            'brand.required'=>'الرجاء ادخال اسم المركة',
            'color.required'=>'الرجاء ادخال اللون',
            'image.required'=>'أضف صور المنتج',


        ];

    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }

    $record =Product::create([
        'name'=>$request->name,
        'price'=>$request->price,
        'discount'=>$request->discount,
        'total_price'=>$request->total_price,
        'price'=>$request->price,
        'cat_id'=>$request->cat_id,
        'brand'=>$request->brand,
        'size'=>$request->size,
        'color'=>$request->color,
        'status'=>$request->status,
        'user_id'=>Auth::id(),
    ]);


    if ($request->hasfile('image')) {

        $files= $request->file('image');
        foreach($files as $file){
            $name = $file->getClientOriginalName();
            $name = Str::random(40) . '.' . pathinfo($name, PATHINFO_EXTENSION);
            $new = $file->storeAs('Ecommerce/products', $name, 'upload_attachments');
            $images= new Image();
            $images->filename = $name;

            $record->image()->save($images);



    }
}



    session()->flash('success', 'تمت الاضافة بنجاح');
    return back();

    }

public function edit($id){
    $product = Product::where('id',$id)->first();
    return view('frontend.edit-product',compact('product'));
}


public function updateProduct(Request $request,$id){

    $rules =
    [
        'name' => 'required',
        'price' => 'required',
        'cat_id' => 'required',
        'brand' => 'required',
        'image'=>'array',
        'price'=>'required',
        'size'=>'required',
        'color'=>'required',
        'status'=>'required',
        'brand'=>'required',

    ];

$error_sms =
    [
        'name.required' => 'الرجاء ادخال الاسم ',
        'price.required' => 'الرجاء ادخال السعر ',
        'cat_id.required'=>'الرجاء ادخال القسم التابع',
        'brand.required'=>'الرجاء ادخال اسم الشركه',
        'size.required'=>'الرجاء ادخال  المقاس',
        'status.required'=>'الرجاء ادخال  حالة المنتج',
        'brand.required'=>'الرجاء ادخال اسم المركة',
        'color.required'=>'الرجاء ادخال اللون',


    ];

$data = validator()->make($request->all(), $rules, $error_sms);

if ($data->fails()) {
    return back()->withInput()->withErrors($data->errors());
}
$record = Product::find($id);

$record->update([
    'name'=>$request->name,
    'price'=>$request->price,
    'discount'=>$request->discount,
    'total_price'=>$request->total_price,
    'price'=>$request->price,
    'cat_id'=>$request->cat_id,
    'brand'=>$request->brand,
    'size'=>$request->size,
    'color'=>$request->color,
    'status'=>$request->status,
    'user_id'=>Auth::id(),
]);


if ($request->hasfile('image')) {

    $files= $request->file('image');
    foreach($files as $file){
        $name = $file->getClientOriginalName();
        $name = Str::random(40) . '.' . pathinfo($name, PATHINFO_EXTENSION);
        $new = $file->storeAs('Ecommerce/products', $name, 'upload_attachments');
        $images= new Image();
        $images->filename = $name;

        $record->image()->save($images);



}
}



session()->flash('update', 'تمت التعديل بنجاح');
return back();

}

public function deleteProduct($id){
 $product = Product::find($id);
 $product->delete();
 session()->flash('delete', 'تمت الحذف بنجاح');
return back();
}



public function showDetails($id){
    $product = Product::where('id',$id)->first();
    $numvisit = $product->number_of_visit;
    $newvisit = $numvisit+1;
   $updat =  $product->update(['number_of_visit'=>$numvisit+1]);
    $photo = Product::where('id',$id)->get();
    return view('frontend.showproduct',compact('product','photo'));
}






    public function supplierProduct($id){
        $product = Product::where('id',$id)->first();
        $prouctThisUser = Product::where('user_id',$product->user_id)->get();
        $user = User::where('id',$product->user_id)->first();
        return view('frontend.visit-user',compact('prouctThisUser','user'));

    }


public function showFavourite(){

    $user = Auth::user();
$userFavourite = $user->favorite(Product::class);
return view('frontend.favourite',compact('userFavourite'));

}


public function search(Request $request) {
 if($request->has('q')){
     $q = $request->q;
     $result  = Product::where('name','like','%'.$q.'%')->get();

     return response()->json(['data'=>$result]);
 }

}
public function searchBrand(Request $request) {
    if($request->has('q')){
        $q = $request->q;
        $result  = Product::where('brand','like','%'.$q.'%')->get();

        return response()->json(['data'=>$result]);
    }

   }

   public function searchStatus(Request $request){
    if($request->has('q')){
        $q = $request->q;
        $result  = Product::where('status','like','%'.$q.'%')->get();

        return response()->json(['data'=>$result]);
    }
   }
   public function searchColor(Request $request){
    if($request->has('q')){
        $q = $request->q;
        $result  = Product::where('color','like','%'.$q.'%')->get();

        return response()->json(['data'=>$result]);
    }
   }

   public function searchPrice(Request $request){
    if($request->has('q')){
        $q = $request->q;
        $result  = Product::where('price','like','%'.$q.'%')->get();

        return response()->json(['data'=>$result]);
    }
   }


public function ProductDetails($id){
    $products = Product::where('id',$id)->get();
    $categories = Category::all();
    return view('frontend.product_details',compact('products','categories'));

}

public function store(Request $request)
{

$oldRating = Rating::where('user_id',$request->user)->where('rateable_id',$request->product_it)->first();
if($oldRating){


    return response()->json(['status'=>0,'message'=>'you have rated this product']);
}else{

    $rating = new Rating();
     $rating->rateable_id  = $request->product_it;
     $rating->rating  = $request->rating_num;
     $rating->user_id  = $request->user;
     $rating->rateable_type = 'App\Models\Product';
     $rating->save();
     return response()->json(['status'=>0,'message'=>'product rated successfully']);
}

}

public function highRating(){
    $minRating = 4;
    $maxRating = 5;
    $places = Product::whereHas('rating', function ($query) use ($minRating, $maxRating) {
        $query->havingRaw('AVG(ratings.rating) >= ?', [$minRating])
            ->havingRaw('AVG(ratings.rating) <= ?', [$maxRating]);
    })->get();
    dd($places);

}




}

