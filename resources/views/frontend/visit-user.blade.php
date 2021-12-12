@extends('frontend.layout.head_foot')
@section('css')
<link rel="stylesheet" href="{{asset("frontend/css/profile.css")}}" />
@endsection
@section('content')

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        @php
                            $path = $user->image[0]->filename ?? null;
                        @endphp
                        <div class="d-flex flex-column align-items-center text-center">
                            <div style="
                  height: 100px;
                  background-image: url('{{asset("Ecommerce/user/".$path)}}');
                  width: 76px;
                  background-size: contain;
                  background-position: center;
                  background-repeat: no-repeat;
                  border-radius: 20px;
                " alt="Admin" class="p-1 bg-primary img-fluid"></div>

                            <div class="mt-3">
                                <h4>{{$user->name}}</h4>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card mt-3"></div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">الاسم</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="username">
                                {{$user->name}}
                            </div>
                        </div>
                        <hr />

                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">التقييم</h6>
                            </div>
                            <div class="col-sm-9">
                                <div class="w-100 d-block">
                                    <fieldset class="rating">
                                      <input id="rate-5" checked type="radio" name="rating" value="5" />
                                      <label for="rate-5">
                                        <svg viewBox="0 -4 80 80">
                                          <path
                                            d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                                          ></path>
                                        </svg>
                                      </label>
                                      <input id="rate-4" type="radio" name="rating" value="4" />
                                      <label for="rate-4">
                                        <svg viewBox="0 -4 80 80">
                                          <path
                                            d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                                          ></path>
                                        </svg>
                                      </label>
                                      <input id="rate-3" type="radio" name="rating" value="3" />
                                      <label for="rate-3">
                                        <svg viewBox="0 -4 80 80">
                                          <path
                                            d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                                          ></path>
                                        </svg>
                                      </label>
                                      <input id="rate-2" type="radio" name="rating" value="2" />
                                      <label for="rate-2">
                                        <svg viewBox="0 -4 80 80">
                                          <path
                                            d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                                          ></path>
                                        </svg>
                                      </label>
                                      <input id="rate-1" type="radio" name="rating" value="1" />
                                      <label for="rate-1">
                                        <svg viewBox="0 -4 80 80">
                                          <path
                                            d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                                          ></path>
                                        </svg>
                                      </label>
                                    </fieldset>
                                  </div>
                                </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="useremail">
                                {{$user->email}}
                            </div>
                        </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-12">
          <h5 class="text-center my-4">المفضله</h5>
                <div class="morelover row">
                    @foreach($prouctThisUser as $productuser)
                    <div class="col-md-4">
                        @php
                            $path = $productuser->image[0]->filename ?? null;
                        @endphp
                       
                        <div class="card">
                            <div class="img_card" style="background-image: url('{{asset("Ecommerce/products/".$path)}}')"></div>
                            <div class="card-body">
                                <h5 class="card-title">{{$productuser->name}}</h5>
                                <h5 class="card-title">مقاس: {{$productuser->size}}</h5>
                                <h5 class="card-title">{{$productuser->brand}}</h5>
                                <h5 class="card-title">{{$productuser->total_price}} رس</h5>
                                <a href="{{url('inbox')}}" class="btn buy">شراء</a>
                                <button class="btn btn-danger">حذف</button>
                            </div>
                        </div>                       
                    </div>
                    @endforeach
                </div>
             </div>
   
</div>
@endsection