<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home Page</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
        <link rel="stylesheet" href="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.css" >
    <link rel="stylesheet" href="{{asset("frontend/css/navfoot.css")}}" />

    @yield('css')
</head>

<body>
@inject('category','App\Models\Category' )
@php
    $categories = $category->get();
@endphp
    <div class="socialnav">
        @inject('socials','App\Models\SocialMedia' )
        @php
            $social = $socials->first();

        @endphp
        @if(isset($social))
        <a href="{{url($social->inesta)}}">
          <i class="fab fa-instagram"></i>
        </a>
                <a href="{{url($social->facebook)}}">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="{{url($social->twitter)}}">
                    <i class="fab fa-twitter"></i>
                </a>
                @else
                <a>
                    <i class="fab fa-instagram"></i>
                  </a>
                  <a>
                              <i class="fab fa-facebook"></i>

                  </a>
                  <a>
                              <i class="fab fa-twitter"></i>
                          </a>

                @endif
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
@if (auth('client')->user())


                <a href="{{url('profile')}}">
                    <i class="far fa-user"></i>
                </a>
                @endif

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/')}}"> الرئيسيه</a>
                        </li>
                        @if (isset($categories))


                        @foreach($categories as $cat)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('product',$cat->id)}}">{{$cat->name}}</a>
                        </li>
@endforeach
@endif
                    </ul>
                </div>
                <h1>logo</h1>
            </nav>


@yield('content')





<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    <li>
                        <a href="{{url("who")}}"> معلومات عننا </a>
                    </li>
                    <li>
                        <a href="#">مركز الخصوصيات</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <ul>
                    <li>
                        <a href="#"> اعدادات الخصوصيه </a>
                    </li>
                    <li>
                        <a href="#">الاحكام و الشروط</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 text-right">
                <h5 class="text-right">حملوا التطبيق عبر</h5>
                <div class="d-flex mt-5">
                    <div class="row">
                        <div class="col-md-12">
                            @if(isset($social))
                            <a href="{{$social->google_play ?? null}}" class="d-inline">
                                @endif
                                <img src="{{asset("frontend/img/googleplay.png")}}" width="300" />
                            </a>
                        </div>
                        <div class="col-md-12">
                            @if(isset($social))
                            <a href="{{url($social->google_app )}}" class="d-inline">
                                @endif
                                <img src="{{asset("frontend/img/appstore.png")}}" alt="" width="300" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-center">جميع الحقوق محفوظه لدي DocTor WeB</p>
    </div>
</footer>
<!-- alll files -->







<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper@6.8.4/swiper-bundle.min.js"></script>


<script src="{{asset("frontend/js/script.js")}}"></script>


@yield('script')

</body>

</html>
