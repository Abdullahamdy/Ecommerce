<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
class ProductsController extends Controller
{

    protected $model ;
    protected $category ;
    protected $trader ;
    protected $image ;
    protected $viewsDomain = 'admin/products.';
    protected $url = 'admin/product';
    public function __construct()
    {
        $this->model = new Product();
        $this->category = new Category();
        $this->image = new Image();


    }
    public function view($view, $params = [])
    {
        return view($this->viewsDomain . $view, $params);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $records = $this->model->where(function ($q) use ($request) {
            if ($request->id) {
                $q->where('id', $request->id);
            }
            if ($request->name) {
                $q->where(function ($q) use ($request) {
                    $q->where('name', 'LIKE', '%' . $request->name . '%');
                });
            }

        })->paginate();
        return $this->view('index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = $this->model;
        $category = $this->category;
        $trader = $this->trader;
        $image= $this->image;
        return $this->view('create',compact('model','category','image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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

        ];

    $error_sms =
        [
            'name.required' => 'الرجاء ادخال الاسم ',
            'price.required' => 'الرجاء ادخال السعر ',
            'cat_id.required'=>'الرجاء ادخال القسم التابع',
            'brand.required'=>'الرجاء ادخال اسم الشركه',
            'size.required'=>'الرجاء ادخال  المقاس',
            'status.required'=>'الرجاء ادخال الحاله ',
            'color.required'=>'الرجاء ادخال اللون',


        ];

    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }

    $record = $this->model->create([
        'name'=>$request->name,
        'price'=>$request->price,
        'cat_id'=>$request->cat_id,
        'brand'=>$request->brand,
        'size'=>$request->size,
        'status'=>$request->status,
        'discount'=>$request->discount,
        'total_price'=>$request->total_price,
        'color'=>$request->color,
        'user_id'=>auth()->user()->id,
        'is_admin'=>1,
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
    return redirect($this->url);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->model->findOrFail($id);
        $category = $this->category;
        $trader = $this->trader;
        $image= $this->image;
        return $this->view('edit',compact('model','category','trader','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

        ];

    $error_sms =
        [
            'name.required' => 'الرجاء ادخال الاسم ',
            'price.required' => 'الرجاء ادخال السعر ',
            'cat_id.required'=>'الرجاء ادخال القسم التابع',
            'brand.required'=>'الرجاء ادخال اسم الشركه',
            'size.required'=>'الرجاء ادخال  المقاس',
            'brand.required'=>'الرجاء ادخال اسم المركة',
            'color.required'=>'الرجاء ادخال اللون',


        ];


    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }

    $record = $this->model->findOrFail($id);
    $record->update($request->except('image'));
    $record->update($request->except('image'));
    if ($request->hasfile('image')) {

        $files= $request->file('image');
        foreach($files as $file){
            $name = $file->getClientOriginalName();
            $name = Str::random(40) . '.' . pathinfo($name, PATHINFO_EXTENSION);

             $file->storeAs('Ecommerce/products', $name, 'upload_attachments');
             $images= new Image();
             $images->filename = $name;
             $record->image()->save($images);



    }

    }
    // Log::createLog($record, auth()->user(), 'عملية تعديل', 'تعديل اهتمام #' . $record->id);


    // Log::createLog($record, auth()->user(), 'عملية تعديل', 'تعديل اهتمام #' . $record->id);
    session()->flash('success', 'تمت تحديث بنجاح');
    return redirect($this->url);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = $this->model->findOrFail($id);

        $record->delete();

        $data = [
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $id
        ];

      $images = $record->image()->get();
     foreach($images as $image){
        File::delete(public_path('Ecommerce/products/'.$image->filename));
        $record->image()->delete();
     }

        return Response::json($data, 200);


    }


    public function getAttachment($id){
      $images =   Image::where('imagable_id',$id)->get();
      $details = Product::where('id',$id)->get();
      return $this->view('show',compact('images','details'));


    }


    public function deleteAttachment($filename){
        // dd($filename);
        $image = Image::where('filename',$filename)->first();
        $image->delete();
        $data = [
            'status' => 1,
            'message' => 'تم الحذف بنجاح',
            'id' => $filename
        ];
        File::delete(public_path('Ecommerce/products/'.$filename));
        return Response::json($data, 200);



    }

    public function shoppingBasket(){
        $records = Product::whereHas('Clients',function($q){
            $q->where('client_product.status','binding');
        })->get();

        // dd($records[0]->Clients[0]);

        return $this->view('shopping',compact('records'));


}


public function shoppingaccept(){
    $records = Product::whereHas('Clients',function($q){
        $q->where('client_product.status','accept');

    })->get();


    return $this->view('shopping',compact('records'));


}
public function shoppingRefuse(){
    $records = Product::whereHas('Clients',function($q){
        $q->where('client_product.status','refuse');

    })->get();


    return $this->view('shopping',compact('records'));


}
public function deleteBasket($id){
    $record = Product::find($id);
    $record->Clients()->detach();



    $data = [
        'status' => 1,
        'message' => 'تم الحذف بنجاح',
        'id' => $id
    ];

    return Response::json($data, 200);



}











public function editAttachment($id){
   $image = Image::where('id',$id)->first();
   $image->delete();


   $data = [
    'status' => 1,
    'message' => 'تم الحذف بنجاح',
    'id' => $id
];
File::delete(public_path('Ecommerce/products/'.$image->filename));
   return Response::json($data, 200);




}

}




