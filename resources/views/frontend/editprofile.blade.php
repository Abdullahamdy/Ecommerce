@extends('frontend.layout.head_foot')
@section('css')
<link rel="stylesheet" href="{{asset("frontend/css/editprofile.css")}}" />
@endsection



@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="main-body">
        <form method="post" action="{{url("update-profile")}}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">


@php
$path = auth()->user()->image[0]->filename ?? null;
@endphp
{{-- @if(isset($image[0]->filename)) --}}
                            <div class="preview img-wrapper "style="background-image:url('{{asset('Ecommerce/user/'.$path)}}')"></div>
{{-- @endif --}}
                            <div class="file-upload-wrapper">
                                <input type="file" name="image[]" class="file-upload-native" accept="image/*" multiple/>
                                <input type="text" disabled placeholder="upload image" class="file-upload-text" />
                            </div>
                            <div class="mt-3">
                                <h4>{{$user->name}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 editdetails">

                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">User Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text " class="form-control" id="usernameinput" name="name" value="{{$user->name}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text " class="form-control"name="email" value="{{$user->email}}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">old password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="oldpassword" class="form-control" name="oldpassword" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Password</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text " class="form-control" placeholder="password" name="password" />
                            </div>
                        </div>
                         <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Re fPassword</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text " class="form-control" value=""  name="password_confirmation"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <button type="submit " class="btn btn-primary px-4 w-100 d-block">Save Changes</button
                >
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
</form>

  </div>
</div>
@endsection




