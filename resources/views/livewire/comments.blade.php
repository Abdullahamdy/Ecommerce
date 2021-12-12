
<div>
    <div class="comment">
        <div class="container">
          <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7">

              @foreach ($comments->where('product_id',$product_value) as $comment)
              <div class="card">




<div class="row">
    @inject('users','App\User' )
    @php
    $user = $comment->user_id;
    $userCom = $users->where('id',$user)->first();

    @endphp
                  <div class="col-md-2"></div>
                  <div class="col-md-10">
                    <div class="row">
                      <div class="col-md-8">
                        <h3> {{$userCom->name}}</h3>
                        <p>{{ $comment->body}}</p>
                      </div>
                      @if(isset($userCom->image[0]->filename))
                      <div class="col-md-4">
                        <img src="{{asset("Ecommerce/user/".$userCom->image[0]->filename)}}" alt="" />
                      </div>
                      @endif
                    </div>
                  </div>
                </div>

              </div>
              @endforeach
              <div class="card">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                        <input wire:model.defer="body" style="height: 80px" type="text"class="form-control"placeholder="اكتب تعليق"/>

                    </div>
                    <div class="row">


                     <input wire:model.defer="products" type="hidden"class="form-control"placeholder="اكتب منتج" />

                    </div>
                    <br>
                   
                    <div class="col-md-12 text-center">

                    <button class="btn btn-primary"wire:click.prevent="addComment">Add Comment</button>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @push('js_script')
      <script>
          Livewire.restart();
          document.addEventListener("livewire:load", () => {
            @this.set('product',product);
        });
      </script>
      @endpush
</div>
