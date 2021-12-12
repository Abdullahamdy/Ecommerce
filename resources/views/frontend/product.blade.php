@extends('frontend.layout.head_foot')
@section('css')
<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{asset('inspina/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
<style>

.HeartAnimation {
      padding-top: 2em;
      background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/66955/web_heart_animation.png');
      background-repeat: no-repeat;
      background-size: 2900%;
      background-position: left;
      height: .5rem;
      width: 50%;
      cursor: pointer;
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
<link rel="stylesheet" href="{{asset("frontend/css/products.css")}}" />
@endsection

<div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="
        col-md-3
        float-right
        col-1
        pl-0
        pr-0
        collapse
        width
        show
        text-right
      " id="sidebar">
            <div class="list-group border-0 text-center text-md-left">
                <a href="#menu1" class="list-group-item d-inline-block collapsed" data-toggle="collapse" aria-expanded="false"><i class="fas fa-list-ul"></i>
          <span class="d-none d-md-inline search-input" >الفئات </span></a>
        <div class="collapse" id="menu1" data-parent="#sidebar">
          <div class="wrap">
            <div class="search">
              <input
                type="text"
               
                class="searchTerm form-control search-input"
                placeholder="البحث"
              />
              <button type="submit" class="searchButton"
              id = "submitButton" onclick="show();" >
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
          <span href="#" name="q"  class="list-group-item  search-result" data-parent="#menu1">
            <input type="checkbox" name="serarch" id="" />
          </span>




@inject('searchProducts','App\Models\Product')


@foreach($searchProducts->get() as $searchPro)

          <span href="#" class="list-group-item" data-parent="#menu1">
            <input type="checkbox" name="" id="" value=" {{$searchPro->name}}" />
           {{$searchPro->name}}
          </span>

@endforeach
        </div>
        <a
          href="#menu2"
          class="list-group-item d-inline-block collapsed"
          data-toggle="collapse"
          aria-expanded="false"
          ><i class="far fa-copyright"></i>
          <span class="d-none d-md-inline">الماركات </span></a
        >
        <div class="collapse" id="menu2" data-parent="#sidebar">
          <div class="wrap">
            <div class="search">
              <input
                type="text"
                class="searchTerm form-control search-inputbrand"
                placeholder="البحث"
              />
              <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
          <span href="#" name="q"  class="list-group-item  search-result-brand" data-parent="#menu1">
            <input type="checkbox" name="" id="" />
          </span>

          @foreach($searchProducts->get() as $searchPro)

          <span href="#" class="list-group-item" data-parent="#menu1">
            <input type="checkbox" name="" id="" />
           {{$searchPro->brand}}
          </span>

@endforeach
        </div>
        <a
          href="#menu3"
          class="list-group-item d-inline-block collapsed"
          data-toggle="collapse"
          aria-expanded="false"
          ><i class="fas fa-thumbs-up"></i>
          <span class="d-none d-md-inline">الحاله </span></a
        >
        <div class="collapse" id="menu3" data-parent="#sidebar">
          <div class="wrap">
            <div class="search">
              <input
                type="text"
                class="searchTerm form-control search-inputstatus"
                placeholder="البحث"
              />
              <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
          <span href="#" name="q"  class="list-group-item  search-result-status" data-parent="#menu1">
            <input type="checkbox" name="" id="" />
          </span>



          @foreach($searchProducts->get() as $searchPro)

          <span href="#" class="list-group-item" data-parent="#menu1">
            <input type="checkbox" name="" id="" />
           {{$searchPro->status}}
          </span>

@endforeach
        </div>
        <a
          href="#menu5"
          class="list-group-item d-inline-block collapsed"
          data-toggle="collapse"
          aria-expanded="false"
          ><i class="fas fa-fill"></i>
          <span class="d-none d-md-inline">اللون </span></a
        >
        <div class="collapse" id="menu5" data-parent="#sidebar">
          <div class="wrap">
            <div class="search">
              <input
                type="text"
                class="searchTerm form-control search-inputcolor"
                placeholder="البحث"
              />
              <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
          <span href="#" name="q"  class="list-group-item  search-result-color" data-parent="#menu1">
            <input type="checkbox" name="" id="" />
          </span>


          @foreach($searchProducts->get() as $searchPro)

          <span href="#" class="list-group-item" data-parent="#menu1">
            <input type="checkbox" name="" id="" />
           {{$searchPro->color}}
          </span>

@endforeach
        </div>
        <a
          href="#menu4"
          class="list-group-item d-inline-block collapsed"
          data-toggle="collapse"
          aria-expanded="false"
          ><i class="far fa-money-bill-alt"></i>
          <span class="d-none d-md-inline">الاسعار </span></a
        >
        <div class="collapse" id="menu4" data-parent="#sidebar">
          <div class="wrap">
            <div class="search">
              <input
                type="text"
                class="searchTerm form-control search-inputprice"
                placeholder="البحث"
              />
              <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>

          <span href="#" name="q"  class="list-group-item  search-result-price" data-parent="#menu1">
            <input type="checkbox" name="" id="" />
          </span>



          @foreach($searchProducts->get() as $searchPro)

          <span href="#" class="list-group-item" data-parent="#menu1">
            <input type="checkbox" name="" id="" />
           {{$searchPro->price}}
          </span>

@endforeach



        </div>
      </div>
    </div>
    <div class="col-md-9 float-right col px-5 pl-md-2 pt-2 main">

@section('content')
            <div class="morelover text-right home-section">
                <div class="container">
                    <div class="section-title text-center mb-4">
                        <h4>حسابات الاكثر اعجابا</h4>
                    </div>
                    <div class="row">
                        @foreach ($products as $product)



                     <div class="col-md-4 searching">
                        <div class="searchres" id="searchres">
                        </div>
                            <div class="card" id="card">
                                {{-- @foreach ($product->image as $img) --}}
                                @if(isset($product->image[0]))
                                <div class="img_card" style="background-image: url('{{asset('Ecommerce/products/'.$product->image[0]->filename) }}')"></div>
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <h5 class="card-title">مقاس:{{$product->size}} </h5>

                                    <h5 class="card-title"> {{$product->brand}}</h5>
                                    <h5 class="card-title"> {{$product->total_price}}</h5>
                                    <div class="prop">
                                        <div class="row">
                                            <div class="col-lg-12 d-block w-100">
                                                <a href="{{url('inbox')}}" class="btn buy addCart"><i class="fas fa-shopping-cart"></i
                        ></a>
                                            </div>



                                            <div class="col-lg-12 d-block w-100">
                                                @if(auth()->user())
                                                @if ($product->isFavorited())
                                                    <div class="frame " style="height: fit-content">
                                                        <a class="btn  buy2  fav active"
                                                         onClick="favourites({{$product->id}}, {{auth('client')->user()->id }})"
                                                         id="like"

                                                         >
                                                         <i type="button" id="icon_7" class="HeartAnimation animate"></i>

                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="frame">
                                                        <a class="btn buy fav active " onClick="favourites({{$product->id}}, {{ Auth::user()->id }})">
                                                            <i type="button" id="icon_7" class="HeartAnimation"></i>
                                                        </a>
                                                    </div>
                                                @endif
                                            @endif

                                            </div>



                                            <div class="col-lg-12 d-block w-100">
                                                <abbr title="{{$product->number_of_visit}} visitor" class="">

                                                <a href="{{route('show-details',$product->id)}}" class="btn buy float-left"><i class="far fa-eye"></i
                        ></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>




        
                   
                  

@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

 <script type = "text/javascript" language = "javascript">	 
    function show(){
        $('#card').hide();
    var _q = $("input:checkbox:checked").val();
  
     $(document).ready(function(){
       
        $.ajax({
                       url:"{{url('search')}}/"+_q,
                       data:{
                        q:_q,
                    },

                    dataType:'json',
                    beforeSend:function(){
                       
                        $(".searching").html("<div class='card' id='card'> </div>")

                    },
                success:function(res){
                    
                   var _html = '';
                   $.each(res.data,function(index,data){       
                   
                // console.log(img)
                  
                   
                       _html +=  `
                       <div class="card">
                        <img src="{{asset("/Ecommerce/products")}}/${data.image[0].filename}">
                                    <div class="card-body">
                                        <h5 class="card-title">${data.name}</h5>
                                        <h5 class="card-title">مقاس: ${data.size}.</h5>
                         
                                        <h5 class="card-title">Micheal Kors</h5>
                                        <h5 class="card-title">150 رس</h5>
                                        <div class="prop">
                                            <div class="row">
                                                <div class="col-lg-12 d-block w-100">
                                                    <a href="chat.html" class="btn buy"><i class="fas fa-shopping-cart"></i
                            ></a>
                                                </div>
                                                <div class="col-lg-12 d-block w-100">
                                                    <a href="favPage.html" class="btn buy fav"><i class="far fa-heart"></i
                            ></a>
                                                </div>
                                                <div class="col-lg-12 d-block w-100">
                                                    <a href="showproduct.html" class="btn buy float-left"><i class="far fa-eye"></i
                            ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       `;

                   });
                   

                   $(".searching").html(_html);

                },
       
     });
   
     })
    }
 </script>
 <script>

    $(document).ready(function(){
            $(".addCart").on('click',function(){
                var id = $(this).data('id');
               if(id){
                   $.ajax({
                       url:"{{url('add/cart/')}}/"+id,
                       type:"GET",
                       dataType:"json",
                       success:function(data){


                       },
                   });

               }else{


               }

            });
        });


    </script>






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



{{-- search --}}


<script>
    $(document).ready(function(){
        $('.search-input').on('keyup',function(){
            var _q = $(this).val()
            if(_q.length>=3){
                $.ajax({
                    url:"{{url('productsearch')}}",
                    data:{
                        q:_q,
                    },

                    dataType:'json',
                    beforeSend:function(){
                        $(".search-result").html("<a href= '' class='list-group-item'>loading...</a>")

                    },
                success:function(res){
                   var _html = '';
                   $.each(res.data,function(index,data){

                       _html +=  '<a class= "list-group-item"href="http://127.0.0.1:8000/show-details/'+data.id +'">'+data.name+'</a>';

                   });

                   $(".search-result").html(_html);

                },

                });
            }
        })

    })

   </script>








{{-- search --}}


<script>
    $(document).ready(function(){
        $('.search-inputbrand').on('keyup',function(){
            var _q = $(this).val()
            if(_q.length>=3){
                $.ajax({
                    url:"{{url('productsearch-brand')}}",
                    data:{
                        q:_q,
                    },

                    dataType:'json',
                    beforeSend:function(){
                        $(".search-result-brand").html("<a href= '' class='list-group-item'>loading...</a>")

                    },
                success:function(res){
                   var _html = '';
                   $.each(res.data,function(index,data){






                       _html +=  '<a class= "list-group-item"href="http://127.0.0.1:8000/product-details/'+data.id +'">'+data.brand+'</a>';

                   });

                   $(".search-result-brand").html(_html);

                },

                });
            }
        })

    })

   </script>



<script>
    $(document).ready(function(){
        $('.search-inputstatus').on('keyup',function(){
            var _q = $(this).val()
            if(_q.length>=3){
                $.ajax({
                    url:"{{url('productsearch-status')}}",
                    data:{
                        q:_q,
                    },

                    dataType:'json',
                    beforeSend:function(){
                        $(".search-result-status").html("<a href= '' class='list-group-item'>loading...</a>")

                    },
                success:function(res){
                   var _html = '';
                   $.each(res.data,function(index,data){

                       _html +=  '<a class= "list-group-item"href="http://127.0.0.1:8000/product-details/'+data.id +'">'+data.status+'</a>';

                   });

                   $(".search-result-status").html(_html);

                },

                });
            }
        })

    })

   </script>


<script>
    $(document).ready(function(){
        $('.search-inputcolor').on('keyup',function(){
            var _q = $(this).val()
            if(_q.length>=3){
                $.ajax({
                    url:"{{url('productsearch-color')}}",
                    data:{
                        q:_q,
                    },

                    dataType:'json',
                    beforeSend:function(){
                        $(".search-result-color").html("<a href= '' class='list-group-item'>loading...</a>")

                    },
                success:function(res){
                   var _html = '';
                   $.each(res.data,function(index,data){

                       _html +=  '<a class= "list-group-item"href="http://127.0.0.1:8000/product-details/'+data.id +'">'+data.color+'</a>';

                   });

                   $(".search-result-color").html(_html);

                },

                });
            }
        })

    })

   </script>



<script>
    $(document).ready(function(){
        $('.search-inputprice').on('keyup',function(){
            var _q = $(this).val()
            if(_q.length>=3){
                $.ajax({
                    url:"{{url('productsearch-price')}}",
                    data:{
                        q:_q,
                    },

                    dataType:'json',
                    beforeSend:function(){
                        $(".search-result-price").html("<a href= '' class='list-group-item'>loading...</a>")

                    },
                success:function(res){
                   var _html = '';
                   $.each(res.data,function(index,data){

                       _html +=  '<a class= "list-group-item"href="http://127.0.0.1:8000/product-details/'+data.id +'">'+data.price+'</a>';

                   });

                   $(".search-result-price").html(_html);

                },

                });
            }
        })

    })

   </script>
   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @endsection
