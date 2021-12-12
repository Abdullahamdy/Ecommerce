@extends('frontend.layout.head_foot')
@section('css')
<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{asset('inspina/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset("frontend/css/products.css")}}" />
<link href="{{asset('inspina/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

<style>

    .HeartAnimation {
          padding-top: 2em;
          background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/66955/web_heart_animation.png');
          background-repeat: no-repeat;
          background-size: 2900%;
          background-position: left;
          height: 2.5rem;
    width: 28%;
    display: inline-block;
          cursor: pointer;
          position: absolute;
    left: 252px;
      }

      .animate {
          animation: heart-burst .8s steps(28) forwards;
          -webkit-animation: heart-burst .8s steps(28) forwards;
      }

      @keyframes heart-burst {
          0% {
              background-position: left
          }
          100% {
              background-position: right
          }
      }

    .animate {
        animation: heart-burst .8s steps(28) forwards;
        -webkit-animation: heart-burst .8s steps(28) forwards;
    }


    </style>


    <link rel="stylesheet" href="{{asset("frontend/css/homepage.css")}}" />
@endsection
@section('content')
@if(Session::has('error'))
<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
@endif

<header class="overlay">
    <div class="container info">
        <h3 class="mb-4">
            متجر عصري مع تجار مثمره و استثمار امن ابدا باستثمار خزنتك معنا
        </h3>
@if(auth('client')->guest())
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
      سجل الان
    </button>

    @else
    <form method="post" action="logout">
        @csrf
    <button type="submit" class="btn btn-primary" data-toggle="" data-target="">
        تسجيل الخروج
      </button>
    </form>
    @endif
    </div>
</header>
<div class="morelover text-right">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h4>حسابات الاكثر اعجابا</h4>
        </div>
        <div class="row">

          @foreach ($adminProduct as $product)

            <div class="col-md-4">
                <div class="card">
                    @if(isset($product->image[0]))
                    <a href="{{route('show-details',$product->id)}}">
                        <div class="img_card" style="background-image: url('{{asset('Ecommerce/products/'.$product->image[0]->filename)}}')"></div>
                    </a>
                  @endif
                    <div class="card-body">
                        <a href="{{route('show-details',$product->id)}}" class="text-black">
                            <h5 class="card-title">{{$product->name}}</h5>
                            <h5 class="card-title">مقاس: {{$product->size}}</h5>
                            <h5 class="card-title"></h5>
                            <h5 class="card-title">{{$product->brand}}</h5>
                            <h5 class="card-title">{{$product->total_price}}</h5>
                        </a>

                            <div class="prop">
                                {{-- <a href="{{url('inbox')}}" class="btn buy"><i class="fas fa-shopping-cart"></i></a> --}}

                                <div class="col-lg-12 d-block w-100">
                                    @if(auth()->user())
                                    @if ($product->isFavorited())
                                        <div class="frame " style="height:20px">
                                            <a class="" style="width: 20px"
                                             onClick="favourites({{$product->id}}, {{ Auth::user()->id }})"
                                             id="like"

                                             >
                                             <i type="button" id="icon_7" class="HeartAnimation animate"></i>

                                            </a>
                                        </div>
                                    @else
                                        <div class="frame">
                                            <a class="" onClick="favourites({{$product->id}}, {{ Auth::user()->id }})">
                                                <i type="button" id="icon_7" class="HeartAnimation"></i>
                                            </a>
                                        </div>
                                    @endif
                                @endif

                                </div>



                                {{-- <a onClick="favourites({{$product->id}}, {{ auth('client')->user()->id ?? null}})"class="btn buy fav"><i class="far fa-heart"></i></a> --}}
                                <abbr title="{{$product->number_of_visit}} visitor" class="btn buy float-left">
                                    <a  href="{{route('show-details',$product->id)}}" style="color:#eb9912"> <i class="far fa-eye"></i></a></abbr>
                                {{-- <a href="{{route('show-details',$product->id)}}" class="btn buy float-left"><i class="far fa-eye"></i></a> --}}
                            </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="about text-right">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <i class="fas fa-user-cog d-inline ml-3"></i>
                <h5 class="d-inline mb-4">بحث مخصص</h5>
                <p>سهوله البحث عن القطعه بالتفصيل و يهوله البحث عن الموقع</p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-handshake d-inline ml-3"></i>
                <h5 cass="d-inline mb-4">شفافيه في التجاره</h5>
                <p>
                    نسعي لتسهيل عمليه البيع و الشراء بين الطرفين حيث يمكن للبائع عرض قطعته لجميع تفاصيلها بالاضافه الي الموقع ليسهل للمشتري الوصول
                </p>
            </div>
            <div class="col-md-4">
                <i class="fas fa-briefcase d-inline ml-3"></i>
                <h5 class="d-inline mb-4">ماركات اصليه</h5>
                <p>
                    القطع المعروضه كلها من الماركات و الشركات العالميه القطع المعروضه : جديده / كالجديده / مستعلمه
                </p>
            </div>
        </div>
    </div>
    <div class="m-auto text-center mt-4">
        <h2>اعرضي قطعتك في رفوفنا سهلي لها الطريق الي البيت جديد محب</h2>
    </div>
</div>
<div class="evalution text-center mt-5">
    <div class="container">
        <div class="section-title text-center mb-4">
            <h4>تقييم</h4>
        </div>

        <div class="row">
@php
foreach ($places as $use) {
    $array[] = $use->user_id;
    $uniqUser =  array_unique($array);
}
@endphp
@if(isset($uniqUser))
@foreach( $uniqUser as $rate)

@inject('users','App\User')
@php
    $user  = $users->where('id',$rate)->first() ?? null;
   $path = $user->image[0]->filename ?? null;
@endphp
            <div class="col-md-4">
                <div class="group">
                    <img src="{{asset("Ecommerce/user/".$path)}}" class="text-center d-block m-auto mb-4" alt="" />
                    <h4 class="mt-4">{{$user->name}}</h4>




                    <form>
                        @if(isset($product))
                        <input id="InputProd" name="rating" value="{{$product->id}}" type="hidden"/>
                        <input id="InputUser" name="rating" value="{{auth('client')->user()->id ?? null}}" type="hidden"/>
                    @endif
                        <fieldset class="rating">
                        <input id="rate-5" type="radio" checked name="rating" value="5" />
                        <label for="rate-5">
              <svg viewBox="0 -4 80 80">
                <path
                  d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                ></path>
              </svg>
            </label>
                        <input id="rate-4" type="radio" name="rating" value="4"/>
                        <label for="rate-4">
              <svg viewBox="0 -4 80 80">
                <path
                  d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                ></path>
              </svg>
            </label>
                        <input id="rate-3" type="radio" name="rating" value="3"/>
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


                </form>

                    <p>منتجاته نظيفه انصح بالشراء بالشراء من صاحب الحساب</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>






<section>
    <div class="modal fade log" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">تسجيل دخول</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                </div>
                <div class="modal-body">
                    <form action="clientLogin" method="post" class="text-right">
                        @csrf
                        <div class="group d-block">
                            <label for="email">الايميل</label>
                            <input type="text" class="form-control" name="email" id="" />
                        </div>
                        <div class="group d-block">
                            <label for="email">كلمه المرور</label>
                            <input type="password" class="form-control" name="password" id="" />
                        </div>
                        <div class="group d-block">
                            <input type="checkbox" id="" />
                            <label for="savePassword">حفظ كلمه المرور</label>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn ml-auto">تسجيل الدخول</button>
                            <button type="button" class="btn btn-primary signup" data-toggle="modal" data-target="#signupModal">
                                انشاء حساب جديد
                              </button>
                        </div>
                    </form>
                </div>




            </div>
        </div>
    </div>
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupModalLabel">انشاء حساب</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
                </div>
                <div class="modal-body">
                    <form action="/create-account" class="text-right" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="group d-block">
                                    <label for="email">اسم المستخدم</label>
                                    <input type="text" class="form-control" name="name" id="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="group d-block">
                                    <label for="email">الايميل</label>
                                    <input type="text" class="form-control" name="email" id="" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                        <div class="group d-block">
                            <label for="phone">الموبايل</label>
                            <input type="text" class="form-control" name="phone" id="" />
                        </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="group d-block">
                                    <label for="email">كلمه المرور</label>
                                    <input type="password" class="form-control" name="password" id="" />
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <div class="preview img-wrapper"></div>
                            <div class="file-upload-wrapper">
                                <input type="file" name="image[]" class="file-upload-native" accept="image/*" />
                                <input type="text" disabled placeholder="upload image" class="file-upload-text" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">انشاء حساب</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>


<script>


    function favourites(item_id, userid) {
       var user_id = userid;
       var item_id = item_id;

       $.ajax({
           type: 'post',
           url: "/api/favourite",
           data: {
               'item_id': item_id,
               'user_id':userid,
           },
           success: function (data) {
               console.log(item_id)
              if (item_id != null)
               {

              }else{
               $('#like').empty()

              }
           },
           error: function (XMLHttpRequest) {
              console.log(XMLHttpRequest);
           }
       });
   }
   </script>

   <script>
       $(function myFunction() {
           $(".HeartAnimation").click(function() {
               $(this).toggleClass("animate");

           });
       });
   </script>
<script>
function clickId(r, id, user) {
    $.ajax({
          url: "/insertrating",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            product_it:id,
            rating_num:r,
            user:user,
          },
          success:function(response){

            console.log('response');
          },
          error: function(response) {
            console.log('error');
          },
          });


}


</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
@endsection



