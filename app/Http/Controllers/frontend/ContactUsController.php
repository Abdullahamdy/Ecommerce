<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function getForm(){

        return view('frontend.contact-us');
    }
    public function subForm(Request $request){
        $record = new ContactUs();

        $validation = $this->validate($request,[
            'phone'=>'required',
            'name'=>'required',
            'tittle'=>'required',
            'message'=>'required|string',

        ]);

        if($validation){

            $record->create([
                'tittle'=>$request->tittle,
                'message'=>$request->message,
                'name'=>$request->name,
                'phone'=>$request->phone,

            ]);

            return redirect()->back();
        }
    }
}
