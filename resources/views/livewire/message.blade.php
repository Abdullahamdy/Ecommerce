<div>
    <div class="row justify-content-center" wire:poll="mountComponent()">
        @if(auth()->user()->is_admin == true)
            <div class="col-md-4" wire:init>
                <div class="card">
                    <div class="card-header">
                        Users
                    </div>
                    <div class="card-body chatbox p-0">
                        <ul class="list-group list-group-flush" wire:poll="render">
                            @foreach($users as $user)
                                @php
                                    $not_seen = \App\Models\Message::where('user_id', $user->id)->where('receiver', auth()->id())->where('is_seen', false)->get() ?? null
                                @endphp
                                <a href="{{ route('inbox.show', $user->id) }}" class="text-dark link">
                                    <li class="list-group-item" wire:click="getUser({{ $user->id }})" id="user_{{ $user->id }}">
                                        <img class="img-fluid avatar" src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png">
                                        <p style="margin-top: 8%; text-align:center;">   @if($user->is_online) <i class="fa fa-circle text-success online-icon"></i> @endif  {{ $user->name }}</p>
                                        @if(filled($not_seen))
                                            <div class="badge badge-success rounded">{{ $not_seen->count() }}</div>
                                        @endif
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(isset($clicked_user)) {{ $clicked_user->name }}

                    @elseif(auth()->user()->is_admin == true)
                        Select a user to see the chat
                    @elseif($admin->is_online)
                        <i class="fa fa-circle text-success"></i> We are online
                    @else
                        Messages
                    @endif
                </div>
                    <div class="card-body message-box">
                        @if(!$messages)
                            No messages to show
                        @else




<div class="container" style="margin-bottom: 10%">
    <div class="row">
        <div class="col-md-3">
            <div class="notification">
                {{-- <div class="pic" style="background-image: url('{{asset('Ecommerce/user/'.$path)}}')"></div> --}}
                <p class="h4">{{auth()->user()->name}}</p>
            </div>
            <div class="location">
                <p class="h6">
                    <i class="fas fa-map-marker-alt"></i> المملكه العربيه السعوديه جدة
                </p>
                <p class="h6">عدد المبيعات <span>35</span></p>
            </div>
        </div>

        <div class="col-md-6">
            
            @inject('users','App\User' )

           

            <!-- <input type="text" placeholder="ابحث  بريدك.." name="search" />
            <button type="submit"><i class="fa fa-search"></i></button> -->
            <div class="wrap">
              <div class="search">
                 <input type="text" class="searchTerm form-control" placeholder="ابحث هنا"wire:model="search">
                 <button type="submit" class="searchButton">
                   <i class="fa fa-search"></i>
                </button>
              </div>
              <ul>
                
                  @if(isset($searching))
               
                    <li>رساله البحث:<strong> {{ $searching->message }}</strong></li>



                    @php 
            $user1= App\User::where('id',$searching->receiver)->first()->name
           @endphp
                   {{-- @dd($users->where('id','==',$searching->receiver)->first()) --}}
                 <li>أسم الأدمن الذي تواصل معك :<strong>{{ $user1}}</strong></li>
                    

                @endif
                
            </ul>
           </div>

     @if(isset($messages))
        @foreach($messages as $message)
                <div class="single-message @if($message->user_id !== auth()->id()) received @else sent @endif">
@php
    $path = auth('client')->user()->image[0]->filename ??null;
@endphp
            <div class="massage">
                @if($message->user_id == auth()->id())
                <img src="{{asset('Ecommerce/user/'.$path)}}" alt="Avatar" style="width: 100%" />
                @endif
                <p class="font-weight-bolder my-0">{{ $message->user->name }}</p>
                 <p class="my-0">{{ $message->message }}</p>
                 @if (isPhoto($message->file))
                
                                            <div class="w-100 my-2">
                                                <img class="img-fluid rounded" loading="lazy" style="height: 250px" src="{{$message->file}}">
                                            </div>
             @elseif (isVideo($message->file))
                 <div class="w-100 my-2">
                     <video style="height: 250px" class="img-fluid rounded" controls>
                         <source src="{{ $message->file }}">
                     </video>
                 </div>
             @elseif ($message->file)
                 <div class="w-100 my-2">
                     <a href="{{ $message->file}}" class="bg-light p-2 rounded-pill" target="_blank"><i class="fa fa-download"></i>
                         {{ $message->file_name }}
                     </a>
                 </div>
             @endif

         </div>
                <span class="time-right">Sent<em>{{ $message->created_at }}</em></span>
            </div>



        @endforeach
 @else
 No messages to show
@endif
@if(!isset($clicked_user) and auth()->user()->is_admin == true)
                                Click on a user to see the messages
                            @endif
                            @if(auth()->user()->is_admin == false)
                            <div class="card-footer">
                                <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
                                    <div wire:loading wire:target='SendMessage'>
                                        Sending message . . .
                                    </div>

            <div class="sendimg">
                <div class="file-input">
                    <input type="file" name="file-input" id="file-input" class="file-input__input"  wire:model="file" />
                    <label class="file-input__label" for="file-input">
            <svg
              aria-hidden="true"
              focusable="false"
              data-prefix="fas"
              data-icon="upload"
              class="svg-inline--fa fa-upload fa-w-16"
              role="img"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
            >
              <path
                fill="currentColor"
                d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"
              ></path>
            </svg>
            <div wire:loading wire:target="file">
                Uploading file . . .
            </div>
            @if($file)
            <div class="mb-2">
               You have an uploaded file <button type="button" wire:click="resetFile" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Remove {{ $file->getClientOriginalName() }}</button>
            </div>
        @else
            No file is uploaded.
        @endif
         </label >
         <div class="row">

            @if(empty($file))
            <div class="col-md-1">
                <button type="button" class="border" id="file-area">
                    <label>
                        <i class="fa fa-file-upload"></i>
                    </label>
                </button>
            </div>
            @endif
            <div class="col-md-4">
            </div>
        </div>



        </div>
      </div>

      <div class="sendMassege">
        <textarea wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" @if(!$file) required @endif
          name="sendMassege"
          class="form-control"
          id=""
          cols="73"
          rows="1"
        ></textarea>
        <input
          type="submit"
          class="btn btn-success"
          value="ارسال"
          name="send"
        />
      </div>


    </div>
    @endif
        </div>
        </form>
  
  </div>
</div>









                                {{-- @foreach($messages as $message)
                                    <div class="single-message @if($message->user_id !== auth()->id()) received @else sent @endif">
                                        <p class="font-weight-bolder my-0">{{ $message->user->name }}</p>
                                        <p class="my-0">{{ $message->message }}</p>
                                        @if (isPhoto($message->file))
                                            <div class="w-100 my-2">
                                                <img class="img-fluid rounded" loading="lazy" style="height: 250px" src="{{ $message->file }}">
                                            </div>
                                        @elseif (isVideo($message->file))
                                            <div class="w-100 my-2">
                                                <video style="height: 250px" class="img-fluid rounded" controls>
                                                    <source src="{{ $message->file }}">
                                                </video>
                                            </div>
                                        @elseif ($message->file)
                                            <div class="w-100 my-2">
                                                <a href="{{ $message->file}}" class="bg-light p-2 rounded-pill" target="_blank"><i class="fa fa-download"></i>
                                                    {{ $message->file_name }}
                                                </a>
                                            </div>
                                        @endif
                                        <small class="text-muted w-100">Sent <em>{{ $message->created_at }}</em></small>
                                    </div>
                                @endforeach --}}
                            {{-- @else --}}
                                No messages to show
                            {{-- @endif --}}
                            {{-- @if(!isset($clicked_user) and auth()->user()->is_admin == true)
                                Click on a user to see the messages
                            @endif
                        @endif
                    </div>
                @if(auth()->user()->is_admin == false)
                    <div class="card-footer">
                        <form wire:submit.prevent="SendMessage" enctype="multipart/form-data">
                            <div wire:loading wire:target='SendMessage'>
                                Sending message . . .
                            </div>
                            <div wire:loading wire:target="file">
                                Uploading file . . .
                            </div>
                            @if($file)
                                <div class="mb-2">
                                   You have an uploaded file <button type="button" wire:click="resetFile" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Remove {{ $file->getClientOriginalName() }}</button>
                                </div>
                            @else
                                No file is uploaded.
                            @endif
                            <div class="row">
                                <div class="col-md-7">
                                    <input wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" @if(!$file) required @endif>
                                </div>
                                @if(empty($file))
                                <div class="col-md-1">
                                    <button type="button" class="border" id="file-area">
                                        <label>
                                            <i class="fa fa-file-upload"></i>
                                            <input type="file" wire:model="file">
                                        </label>
                                    </button>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <button class="btn btn-primary d-inline-block w-100"><i class="far fa-paper-plane"></i> Send</button>
                                </div>
                            </div>
                        </form>
                    {{-- </div> --}}
                 @endif

            </div>
        </div>
    </div>
</div>
