@extends('frontend.layout.head_foot')
@section('css')
<link rel ="stylesheet"href="{{asset('frontend/css/showproduct.css')}}">
@livewireStyles

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
    left: 120px;
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




@livewireStyles
@endsection
@section('content')


<div class="product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="w-100 d-block">
                            <h3>
                                <a style="color: #000">أسم المنتج :{{$product->name}} </a>
              </h3>
              <h4>
                  @inject('user','App\User' )
                  @php
                      $users = $user->where('id',$product->user_id)->first();

                  @endphp
               <h4> <a style="color: #000" href="{{route('supplier',$product->id)}}"> منتجات التاجر:  {{$users->name}} </a></h4>
            </div>
            <form>



            <div class="w-100 d-block">


                <fieldset class="rating">
           @inject('ratings','App\Models\Rating' )

           @php
           $av = $ratings->where('rateable_id',$product->id)->where('user_id',auth('client')->user()->id)->first() ?? null;


        //    $avg =  round($av->avg('rating'),1);

           @endphp
                {{-- <input {{$avg >= 4 ? 'checked'  : ''}} id="rate-5" type="radio" name="rating" value="5" class="clickrating" /> <label for="rate-5"><svg viewBox="0 -4 80 80"><path d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"></path></svg></label>
                <input {{$avg > 3 && $avg < 4 ?  'checked' : ''}} id="rate-4" type="radio" name="rating" value="4" class="clickrating" /> <label for="rate-4"> <svg viewBox="0 -4 80 80"> <path   d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"></path> </svg> </label>
                <input {{$avg >= 2 && $avg < 3 ?  'checked' : ''}} id="rate-3" type="radio" name="rating" value="3" class="clickrating" /><label for="rate-3"><svg viewBox="0 -4 80 80"> <path d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000" ></path></svg> </label>
                <input {{$avg > 1 && $avg < 2 ?  'checked' : ''}} id="rate-2" type="radio" name="rating" value="2" class="clickrating" /><label for="rate-2"><svg viewBox="0 -4 80 80"><path d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000" ></path> </svg> </label>
                <input {{$avg < 1  ? 'checked' : ''}} id="rate-1" type="radio" name="rating" value="1" class="clickrating" /><label for="rate-1"><svg viewBox="0 -4 80 80"><path d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000" ></path></svg> </label>  --}}

                <fieldset class="rating">
            @if($av != null)

            <input id="rate-5" type="radio"
            id="rate-5"
            {{$av->rating ==5 ?'checked' :''}} type="radio"
            name="rating" value="5" />
            <label for="rate-5">
              <svg viewBox="0 -4 80 80">
                <path
                  d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                ></path>
              </svg>
            </label>

            <input id="rate-4" type="radio"
            id="rate-4"
            {{$av->rating ==4 ?'checked' :''}} type="radio"
                name="rating" value="4" />
                <label for="rate-4">
                  <svg viewBox="0 -4 80 80">
                    <path
                      d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                    ></path>
                  </svg>
                </label>

                <input id="rate-3" type="radio"
                id="rate-3"
                {{$av->rating == 3 ?'checked' :''}} type="radio"

                name="rating" value="3" />
                <label for="rate-3">
                  <svg viewBox="0 -4 80 80">
                    <path
                      d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                    ></path>
                  </svg>
                </label>

                <input id="rate-2" type="radio"
                {{$av->rating == 2 ?'checked' :''}} type="radio"
                name="rating" value="2" />
                <label for="rate-2">
                  <svg viewBox="0 -4 80 80">
                    <path
                      d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                    ></path>
                  </svg>
                </label>


                <input id="rate-1" type="radio"
                {{$av->rating ==1 ?'checked' :''}} type="radio"
                name="rating" value="1" />
                <label for="rate-1">
                  <svg viewBox="0 -4 80 80">
                    <path
                      d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
                    ></path>
                  </svg>
                </label>





                {{-- <input  {{$av->rating ==5 ?'checked' :''}} type="radio" /><label  for="rate-5"><svg viewBox="0 -4 80 80"><path d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"></path></svg>
                    <input {{$av->rating == 4 ?'checked' :''}}  type="radio" /><label  for="rate-4"><svg viewBox="0 -4 80 80"><path d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"></path></svg>
                        <input {{$av->rating == 3 ?'checked' :''}} type="radio" /><label  for="rate-3"><svg viewBox="0 -4 80 80"><path d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"></path></svg>
                            <input  {{$av->rating == 2 ?'checked' :''}} type="radio" /><label  for="rate-2"><svg viewBox="0 -4 80 80"><path d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"></path></svg>

                                <input  type="radio" {{$av->rating == 1 ?'checked' :''}} /><label  for="rate-1"><svg viewBox="0 -4 80 80"><path d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"></path></svg> --}}

                                    @else
<form>
<input id="rate-5" type="radio"
id="rate-5"
onclick="clickId(5, {{$product->id}},{{auth('client')->user()->id}})"
name="rating" value="5" />
<label for="rate-5">
  <svg viewBox="0 -4 80 80">
    <path
      d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
    ></path>
  </svg>
</label>

<input id="rate-4" type="radio"
id="rate-4"
    onclick="clickId(4, {{$product->id}},{{auth('client')->user()->id}})"
    name="rating" value="4" />
    <label for="rate-4">
      <svg viewBox="0 -4 80 80">
        <path
          d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
        ></path>
      </svg>
    </label>

    <input id="rate-3" type="radio"
    id="rate-3"
    onclick="clickId(3, {{$product->id}},{{auth('client')->user()->id}})"

    name="rating" value="3" />
    <label for="rate-3">
      <svg viewBox="0 -4 80 80">
        <path
          d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
        ></path>
      </svg>
    </label>

    <input id="rate-2" type="radio"
    onclick="clickId(2, {{$product->id}},{{auth('client')->user()->id}})"
    name="rating" value="2" />
    <label for="rate-2">
      <svg viewBox="0 -4 80 80">
        <path
          d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
        ></path>
      </svg>
    </label>


    <input id="rate-1" type="radio"
    onclick="clickId(1, {{$product->id}},{{auth('client')->user()->id}})"
    name="rating" value="1" />
    <label for="rate-1">
      <svg viewBox="0 -4 80 80">
        <path
          d="M 40.000 60.000 L 63.511 72.361 L 59.021 46.180 L 78.042 27.639 L 51.756 23.820 L 40.000 0.000 L 28.244 23.820 L 1.958 27.639 L 20.979 46.180 L 16.489 72.361 L 40.000 60.000"
        ></path>
      </svg>
    </label>
</form>

            @endif


            </fieldset>
            </div>
        </form>
          </div>
          @if(isset($product->image[0]))
          <div class="col-md-6">
            <img src="{{asset("Ecommerce/products/".$product->image[0]->filename)}}" class="person" alt="" />
          </div>
          @endif

        </div>


         <p style=
         "display: inline-block;
         width: auto;
         position: absolute;
          left: 294px;"> اضف الي المفضله</p>

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






        <ul class="info" style="text-align: right">
          <li>
            <h2>الفئة : {{$product->categories->name}}</h2>
          </li>
          <li>
            <h2>اللون : {{$product->color}}</h2>
          </li>
          <li>
            <h2>الماركه : {{$product->brand}}</h2>
          </li>
          <li>
            <h2>المقاس : {{$product->size}}</h2>
          </li>
          <li>
            <h2>الحاله : {{$product->status}}</h2>
          </li>
          <li>
            <h2>السعر : {{$product->total_price}}</h2>
          </li>
          <li>
              <a href="{{url('inbox')}}" class="btn buyProduct">شراء هذا المنتج</a>
          </li>
        </ul>
      </div>
     <div class="col-md-6">
            <section class="slider">
              <div class="slider__flex">
                <div class="slider__col">

                  <div class="slider__prev">Prev</div> <!-- Кнопка для переключения на предыдущий слайд -->

                  <div class="slider__thumbs">
                    <div class="swiper-container"> <!-- Слайдер с превью -->
                      <div class="swiper-wrapper">

                      @foreach($photo as $image)
                      @foreach($image->image as $img)

                      {{-- @php
                      $path =  ?? null;
                      @endphp --}}
                        <div class="swiper-slide">
                          <div class="slider__image"><img src="{{asset('Ecommerce/products/'.$img->filename)}}" alt=""/></div>
                        </div>

                      @endforeach
                      @endforeach
                      </div>
                    </div>
                  </div>

                  <div class="slider__next">Next</div> <!-- Кнопка для переключения на следующий слайд -->

                </div>

                <div class="slider__images">
                  <div class="swiper-container"> <!-- Слайдер с изображениями -->
                    <div class="swiper-wrapper">
                    @foreach($photo as $image)
                      @foreach($image->image as $img)
                      <div class="swiper-slide">
                        <div class="slider__image"><img src="{{asset('Ecommerce/products/'.$img->filename)}}" alt=""/></div>
                      </div>
                      @endforeach
                      @endforeach

                    </div>
                  </div>
                </div>

              </div>
            </section>
          </div>
    </div>
  </div>
</div>
@livewire('comments', ['product_value' => $product->id])
<div class="morelover text-right">
  <div class="container">
    <div class="section-title text-center mb-4">
      <h4>حسابات الاكثر اعجابا</h4>
    </div>

    <div class="row">
        @inject('pro','App\Models\Product' )
        @foreach ($pro->where('is_admin',1)->get() as $admprod)

                {{-- @dd($admprod->image == '[]'  ? null : $admprod->image[0]->filename) --}}
      <div class="col-md-4">

            @php
              $path =  $admprod->image[0]->filename  ?? null ;
            @endphp
        <div class="card">
          <div
            class="img_card"
            style="background-image:
             url('{{asset("Ecommerce/products/".$path)}}')"
          ></div>
          <div class="card-body">
            <h5 class="card-title">{{$admprod->name}}</h5>
            <h5 class="card-title">مقاس: {{$admprod->size}}</h5>
            <form>

                <input id="InputProd" name="rating" value="{{$product->id}}" type="hidden"/>
                <input id="InputUser" name="rating" value="{{auth('client')->user()->id ?? null}}" type="hidden"/>
              <fieldset>
                <span class="star-cb-group">
                  <input
                  type="hidden"

                    id="rating-5"
                    name="rating"
                    value="5"
                    class="clickrating"
                  />
                  <input

                    type="hidden"
                    id="rating-4"
                    name="rating"
                    value="4"

                    class="clickrating"
                  /><label></label>
                  <input
                  type="hidden"
                    id="rating-3"
                    name="rating"
                    value="3"
                    class="clickrating"
                  />
                  <input
                  type="hidden"
                    id="rating-2"
                    name="rating"
                    value="2"
                    class="clickrating"
                  />
                  <input
                  type="hidden"
                    id="rating-1"
                    name="rating"
                    value="1"
                    class="clickrating"
                  />
                  <input
                  type="hidden"
                    id="rating-0"
                    name=""
                    value="0"
                    class=""
                    class=""
                  />
                </span>
              </fieldset>

            </form>
            <h5 class="card-title">{{$admprod->brand}}</h5>
            <h5 class="card-title">{{$admprod->total_price}}</h5>
            <div class="prop">
                <a style="position: absolute;;
               top: 402px;
               right: 20px;
                " href="{{url('/inbox')}}" class="btn buy"><i class="fas fa-shopping-cart"></i></a>





                    @if(auth()->user())
                    @if ($product->isFavorited())
                        <div class=" " style="">
                            <a class="" style=""
                             onClick="favourites({{$product->id}}, {{ auth('client')->user()->id }})"
                             id="like"

                             >
                             <i type="button" id="icon_7" class="HeartAnimation animate"></i>

                            </a>
                        </div>
                    @else
                        <div class="frame">
                            <a class="" onClick="favourites({{$product->id}}, {{ auth('client')->user()->id }})">
                                <i type="button" id="icon_7" class="HeartAnimation"></i>
                            </a>
                        </div>
                    @endif
                @endif






                <a href="{{route('show-details',$product->id)}}" class="btn buy float-left"><i class="far fa-eye"></i></a>
            </div>
                    </div>
                </div>

        </div>


        @endforeach





    </div>
</div>

@endsection
@section('script')

@livewireScripts
<script>


    function favourites(item_id, userid) {
       var user_id = userid;
       var item_id = item_id;

       $.ajax({
           type: 'post',
           url: "/api/favourite",
           data: {
               'user_id': user_id,
               'item_id': item_id,
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





@stack('js_script')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



@endsection
