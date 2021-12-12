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





                       _html +=  '<a class= "list-group-item"href="http://127.0.0.1:8000/product-details/'+data.id +'">'+data.name+'</a>';

                   });

                   $(".search-result").html(_html);

                },

                });
            }
        })

    })











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



