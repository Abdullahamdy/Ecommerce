@extends('frontend.layout.head_foot')
@section('css')
<link rel="stylesheet" href="{{asset("frontend/css/profile.css")}}" />
@endsection


@section('content')
@if(session()->has('delete'))
<div class="alert alert-danger">
    {{ session()->get('delete') }}
</div>
@endif
  <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
@if(isset(auth()->user()->image[0]->filename))
                                <div style="
                      height: 100px;
                      background-image:url('{{asset("Ecommerce/user/".auth()->user()->image[0]->filename)}}');
                      width: 76px;
                      background-size: contain;
                      background-position: center;
                      background-repeat: no-repeat;
                      border-radius: 20px;
                    " alt="Admin" class="p-1 bg-primary img-fluid"></div>
  @endif

                                <div class="mt-3">
                                    <h4>{{auth()->user()->name}}</h4>
                                </div>
                                <div class="w-100 d-block">
                                    <fieldset class="rating">
                                      <input id="rate-5" type="radio" name="rating" value="5" />
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
                                      <input id="rate-3" type="radio" name="rating" value="3" checked />
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
                                   {{auth()->user()->name}}
                                </div>
                            </div>
                            <hr />

                            <hr />
                            <hr />
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" id="useremail">
                                   {{auth()->user()->email}}
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info w-100 d-block" href="{{route('profile-edit',auth()->user()->id)}}">Edit</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
              <a
                class="list-group-item list-group-item-action active"
                id="list-home-list"
                data-toggle="list"
                href="#list-home"
                role="tab"
                aria-controls="home"
                >متجرك</a
              >
              <a
                class="list-group-item list-group-item-action"
                id="list-profile-list"
                data-toggle="list"
                href="#list-profile"
                role="tab"
                aria-controls="profile"
                >المفضله</a
              >
            </div>
          </div>
          <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
              <div
                class="tab-pane fade show active"
                id="list-home"
                role="tabpanel"
                aria-labelledby="list-home-list"
              >
                <div class="morelover row">
                    @foreach ($products as $product)
                  <div class="col-md-4">

                  


                    <div class="card">
                   
@if(isset($product->image[0]->filename))
                      <div  class="img_card"
                        style="background-image: url('{{asset('Ecommerce/products/'.$product->image[0]->filename)}}')"></div>
                    
@endif
                      <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <h5 class="card-title">{{$product->size}}</h5>
                        <h5 class="card-title">{{$product->brand}}</h5>
                        <h5 class="card-title">{{$product->total_price}}</h5>
                        <a href="{{route('edit-product',$product->id)}}" class="btn buy">تعديل</a>
                                 
                        
                        <form action="{{route('delete-product',$product->id)}}"method="post" style="display: inline">
                            @csrf
                        <button href="" class="btn btn-danger">حذف</button>
                        </form>            
                    </div>
                            </div>
                           

                        </div>
                        @endforeach
                        <div class="col-md-4">
                            <a href="{{url("add-product")}}">
                                <div class="card" style="
                          background-color: #ddd;
                          height: 100%;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          color: #17a2b8;
                          font-size: 50px;
                          font-weight: 900;
                        ">
                                    +
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                    <div class="morelover row">
                        @foreach($favourites as $favourite)

                        <div class="col-md-4">

                          
                            
                            <div class="card">
                                @if (isset($favourite->image[0]->filename))
                                    
                                
                                <div class="img_card" style="background-image: url('{{asset('Ecommerce/products/'.$favourite->image[0]->filename)}}')"></div>
                               
                                
                                <div class="card-body">
                                    <h5 class="card-title">{{$favourite->name}}</h5>
                                    <h5 class="card-title">{{$favourite->size}}</h5>
                                    <h5 class="card-title">{{$favourite->brand}}</h5>
                                    <h5 class="card-title">{{$favourite->total_price}}</h5>
                                    <a href="{{url('/inbox')}}" class="btn buy">شراء</a>
                                    <form style = "display:inline;" method="post" action="{{route('delete-favourite',$favourite->id)}}">
                                        @csrf
                                    <button  class="btn btn-danger">حذف</button>
                                    <form>
                                </div>
                                @endif
                            </div>
                          
                        </div>
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
           </div>
            </div>
@endsection
