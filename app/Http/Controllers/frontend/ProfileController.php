<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\User;
use ChristianKuri\LaravelFavorite\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Nullable;
use Session;
class ProfileController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        $user = Auth::user();
        $favourites = $user->favorite(Product::class);

        return view('frontend.profile', compact('products', 'favourites'));
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('frontend.editprofile', compact('user'));
    }
    public function update(Request $request)
    {

        $rules = [
                'oldpassword'=>'nullable|min:6',
                'password' => 'nullable|min:6|confirmed',
                 'image' => 'nullable|array',

            ];

        $message = [
                'password.nullable' => ' كلمة المرور  الجديده مطلوبة',
                'password.min' => 'الحد الادني لكلمه المرور 6 حروف',
                'oldpassword.nullable' => 'كلمة المرور  القديمه مطلوبة',
                'oldpassword.min' => 'الحد الادني لكلمه المرور 6 حروف',
                'password.confirmed'=>'كلمه المرور  الجديده غير متطابقه',

            ];
        $data = validator()->make($request->all(), $rules,$message);

        if ($data->fails()) {
            return back()->withErrors($data->errors())->withInput();
            Session::flash('error', 'خطأ في بيانات الدخول');

        } else {
            $marketer=User::findorfail(Auth::id());
            $hashedPassword =$marketer->password;

            if ($request->oldpassword) {
                if (\Hash::check($request->oldpassword, $hashedPassword)) {
                    if (!\Hash::check($request->password, $hashedPassword)) {
                        $newpassword = bcrypt($request->password);
                        $marketer->update(["password" =>  $newpassword]);
                        $id = auth()->user()->image[0]->id;
                        if ($request->hasfile('image')) {

                            foreach ($request->file('image') as $file) {
                                $name = $file->getClientOriginalName();
                                $file->storeAs('Ecommerce/user/', $file->getClientOriginalName(), 'upload_attachments');

                                // insert in image_table
                                $images = Image::where('id', $id);
                                $images->update([
                                'filename'=>$name,
                        ]);
                                Session::flash('message', 'تم تحديث بيناتك بنجاح');
                            }
                        }
                       // return redirect('/logout');
                        Session::flash('message', 'تم تحديث بيناتك بنجاح');
                        return redirect()->back();
                    } else {
                        Session::flash('error', "new password can not be the old password!");

                        return back();
                    }
                } else {
                    // dd('error');

                    Session::flash('error', " خطأ في كلمه المرور!");
                    return back();
                }
            }

$id = auth()->user()->image[0]->id ?? null;
if(!$id){
    foreach($request->file('image') as $file)
    {
        $name = $file->getClientOriginalName();
        $file->storeAs('Ecommerce/user/', $file->getClientOriginalName(),'upload_attachments');

    // dd(auth('client')->user()->id);
        $images= new Image();
        $images->filename=$name;
        $images->imagable_id= auth('client')->user()->id;
        $images->imagable_type = 'App\User';
        $images->save();
    }
    return back();
    Session::flash('message', 'تم تحديث بيناتك بنجاح');

}
if ($request->hasfile('image')) {

    foreach ($request->file('image') as $file) {
        $name = $file->getClientOriginalName();
        $file->storeAs('Ecommerce/user/', $file->getClientOriginalName(), 'upload_attachments');

        // insert in image_table
        $images = Image::where('id', $id);

        $images->update([

'filename'=>$name,
]);


    }

}
return back();
Session::flash('message', 'تم تحديث بيناتك بنجاح');
    }
}


public function deleteFavourite($id){
    $post = Product::find($id);
    $post->removeFavorite();



    return back();
}
}






