
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("frontend/css/navfoot.css")}}" />
    <link rel="stylesheet" href="{{asset("frontend/css/addProduct.css")}}">

</head>
<body>




@inject('category','App\Models\Category' )
@php
    $categories = $category->get();
@endphp

<body class="text-right">
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
                                    <a class="nav-link" href="{{url('/')}}"> ????????????????</a>
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
                    {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
    <form action="{{url('add-product')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="add text-right">
        <div class="image">
                <div class="container">
                <div class="section-title">
                    <h4 class="title">??????</h4>
                </div>

                <div class="adding-image w-100 position-relative">
                    <button>?????? ?????? ????????????</button>
                    <input type="file" class="d-block" id="upload_file" name="image[]"
                        onchange="preview_image(this)" multiple/>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="container collection_img">
                    <div class="row image_preview">

                    </div>
                </div>

            </div>
        </div>
        <div class="detailsproduct">
            <div class="container">
                <div class="section-title">
                    <h4 class="title">????????????????</h4>
                </div>

                  {{-- <div class="group"> --}}
                    {{-- <label>?????? ??????</label> --}}
                    {{-- <input type="text" placeholder="???????? , ??????  ,  ???????? , ?????????? , ??????..." name="" class="form-control" id=""> --}}
                {{-- </div> --}}
                <div class="group">
                  <label>?????? ?????? ????????????</label>
                  <input type="text" placeholder="???????? , ??????  ,  ???????? , ?????????? , ??????..." name="name" class="form-control" id="">

                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                </div>
           {{-- <div class="group">
                        <label for="">???????? ?????? ???????????? </label>
                        <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div> --}}

                    <div class="group">
                      <label for="">?????? ????????????</label>
                      <input type="text" class="form-control" name="size" placeholder="XL" id="">
                      @error('size')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                    </div>
                    <div class="group">
                    <label for="">?????? ????????????</label>
                    <input type="text" class="form-control" name="status" placeholder="????????" id="">
                    @error('status')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="group">
                  <label for="">?????? ??????????????</label>
                  <input type="text" class="form-control" name="brand" placeholder="??????????????" id="">
                  @error('brand')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
                </div>
              <div class="group">
                <label for="">?????? ??????????</label>
                <input type="text" class="form-control" name="color" placeholder="????????" id="">
                @error('color')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            </div>

            </div>
        </div>
        <div class="detailsproduct">
            <div class="container">
                <div class="section-title">
                    <h4 class="title">??????</h4>
                </div>
                <form action="">
                    <div class="group">
                        <label>?????? ??????</label>
                        <input type="text" placeholder="SAR" name="price" class="form-control" id="price" onblur="getAmount()">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="group">
                        <label>??????????</label>
                        @inject('category','App\Models\Category' )
                        @php
                            $categories = $category->get();
                        @endphp


@if (isset($categories))
<div class="group">

                        <select  style="width: 500px" id="SelectedSortOrderOptions" name="cat_id">

@foreach ($categories as  $cat)

                            <option value="{{$cat->id}}">{{$cat->name}}</option>

                            @endforeach
                        </select>
  @endif
  @error('cat_id')
  <div class="alert alert-danger">{{ $message }}</div>
@enderror
                    </div>
                    <div class="group">
                      <label>?????? ??????????</label>
                      <input type="text" placeholder="DisCount" name="discount" class="form-control" id="discount" onblur="getAmount()">

                    </div>
                  <div class="group">
                    <label>Total</label>
                    <input type="text" placeholder="total_price" name="total_price" class="form-control" id="total_price" onblur="getAmount()">
                </div>
                    {{-- <div class="group">
                        <label for="">?????? ?????? ?????????? IBAN</label>
                        <input type="text" class="form-control" name="" id="">
                    </div> --}}
                    <input type="checkbox" name="" id="">
                    <label for="">?????? 1% ???? ???????? ?????????? ?????????? ??????????</label>
                    <button type="submit" class="post">??????</button>
                </form>
            </div>
        </div>
    </div>
</form>
    <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <ul>
                <li>
                  <a href="#">
                    ?????????????? ????????
                  </a>
                </li>
                <li>
                  <a href="#">???????? ??????????????????</a>
                </li>
              </ul>
            </div>
            <div class="col-md-3">
              <ul>
                <li>
                  <a href="#">
                    ?????????????? ????????????????
                  </a>
                </li>
                <li>
                  <a href="#">?????????????? ?? ????????????</a>
                </li>
              </ul>
            </div>
            <div class="col-md-6 text-right">
              <h5 class="text-right">?????????? ?????????????? ??????</h5>
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
          <p class="text-center">
            ???????? ???????????? ???????????? ?????? DocTor WeB
          </p>
        </div>
      </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2"
        crossorigin="anonymous"></script>
    <script src="{{asset("frontend/js/script.js")}}"></script>

<script>

    function getAmount()
    {
          var   price = $('#price').val();
          var discount = $('#discount').val();
          $('#total_price').val(price-discount)
             }
 </script>

</body>

</html>
