<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class clientloginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.authClient.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFormAccount()
    {

        return view('frontend.authClient.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

    }
    public function register(Request $request)
    {
        $rules = [
            'email'=>'required|unique:users,email',
            'phone'=>'required|unique:users,phone|min:10',
            'name'=>'required',
            'password'=>'required|min:6',
          

        ];

    $message = [
        'email.required'=>'يجب ادخال البريد الالكتروني',
        'email.unique'=>'هذا البريد الألكتروني موجود من قبل',
        'password.required' => ' كلمة المرور  مطلوبة',
        'password.min' => 'الحد الادني لكلمه المرور 6 حروف',
        'name.required'=>'يجب ادخال الأسم',
        'phone.required' => ' رقم الهاتف  مطلوب',
        'phone.min' => 'يجب ادخال رقم هاتف صحيح',
        'phone.unique'=>' رقم الهاتف موجود من قبل',

            // 'password.confirmed'=>'كلمه المرور  الجديده غير متطابقه',

        ];
    $data = validator()->make($request->all(), $rules,$message);

    if ($data->fails()) {
        Session::flash('error', $data->errors()->first());
        return back();
        

    } else {
        $record = new User();
        $create = $record->create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>Hash::make($request->password),
    'phone'=>$request->phone,
    'is_admin'=>0,
    'is_active'=>1,
]);



        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $name = $file->getClientOriginalName();
                $file->storeAs('Ecommerce/user/', $file->getClientOriginalName(), 'upload_attachments');

                // insert in image_table
                $images= new Image();
                $images->filename=$name;
                $images->imagable_id= $create->id;
                $images->imagable_type = 'App\User';
                $images->save();
            }
        }
    }
return back();



    }

    public function login(Request $request){

        $validate =  $request->validate([
            'email'=>'required|string',
            'password'=>'required|min:6',



        ]);

if (Auth::guard('client')->attempt(['email'=>$request->email,'password'=>$request->password,'is_admin'=>0])) {
$user = auth('client')->user();
$user->update(['is_online'=>1]);
return redirect()->route('front.main');


        }else{
            Session::flash('error', 'خطأ في بيانات الدخول');

            return redirect()->back();
        }

    }
    public function logout () {
        //logout client
        $user = auth('client')->user();
        $user->update(['is_online'=>0]);
        auth('client')->logout();
        // redirect to homepage
        return redirect('/');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
