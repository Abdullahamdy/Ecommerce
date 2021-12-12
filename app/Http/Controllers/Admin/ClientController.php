<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\MyHelper\Helper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
class ClientController extends Controller
{

    protected $model ;
    protected $packageModel ;
    protected $viewsDomain = 'admin/client.';
    protected $url = 'admin/client';
    public function __construct()
    {
        $this->model = new User();

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
                    $q->where('first_name', 'LIKE', '%' . $request->name . '%');
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
        return $this->view('create',compact('model'));
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
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',






        ];

    $error_sms =
        [
            'name.required' => 'الرجاء ادخال الاسم ',
            'email.required' => 'الرجاء ادخال الايميل ',
            'phone.required' => 'الرجاء ادخال الفون ',
            'password.required' => 'الرجاء ادخال الباسورد ',

        ];

    $data = validator()->make($request->all(), $rules, $error_sms);

    if ($data->fails()) {
        return back()->withInput()->withErrors($data->errors());
    }

    $record = $this->model->create([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'password'=>Hash::make($request->password),
        'is_admin'=>1,
        'is_active'=>1,
        
    ]);
    if($request->hasfile('image'))
    {

        foreach($request->file('image') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('Ecommerce/user/', $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new Image();
            $images->filename=$name;
            $images->imagable_id= $record->id;
            $images->imagable_type = 'App\User';
            $images->save();
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
      //  Log::createLog($record, auth()->user(), 'عملية حذف', 'حذف اهتمام #' . $record->name);
        return Response::json($data, 200);
    }


    public function toggleBoolean($id, $action)
    {
        $record = $this->model->findOrFail($id);
        Helper::toggleBoolean($record);

        return Helper::responseJson(1, 'تمت العملية بنجاح');
    }

}
