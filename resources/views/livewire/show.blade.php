



    <div class="card-body message-box" wire:poll.10ms="mountComponent()">
    <div class="container" style="margin-bottom: 10%">
        <div class="row">
            <div class="col-md-3">
                <div class="notification">
                    <div class="pic" style="background-image: url(frontend/img/person.jpg)"></div>
                    <p class="h4">ساره </p>
                </div>
                <div class="location">
                    <p class="h6">
                        <i class="fas fa-map-marker-alt"></i> المملكه العربيه السعوديه جدة
                    </p>
                    <p class="h6">عدد المبيعات <span>35</span></p>
                </div>
            </div>
            <div class="col-md-6">

                <!-- <input type="text" placeholder="ابحث  بريدك.." name="search" />
                <button type="submit"><i class="fa fa-search"></i></button> -->
                <div class="wrap">
                  <div class="search">
                     <input type="text" class="searchTerm form-control search-inputbrand" placeholder="ابحث هنا">
                     <button type="submit" class="searchButton">
                       <i class="fa fa-search"></i>
                    </button>
                  </div>
                  <span href="#" name="q"  class="list-group-item  search-result-brand" data-parent="#menu1">
                    <input type="checkbox" name="" id="" />
                  </span>
               </div>

               <div class="card-body message-box" wire:poll.10ms="mountComponent()">
                @if(filled($messages))
                    @foreach($messages as $message)
                <div class="massage">
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
                            <a href="{{ $message->file}}" class="bg-light p-2 rounded-pill" target="_blank" download><i class="fa fa-download"></i>
                                {{ $message->file_name }}
                            </a>
                        </div>
                    @endif
                    {{-- <img src="frontend/img/person.jpg" alt="Avatar" style="width: 100%" /> --}}

                    <span class="time-right">{{ $message->created_at }}</span>
                </div>
                </div>
                @endforeach
                @else
                No messages to show
                @endif
            </div>

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


            @if(empty($file))
            <div class="col-md-1">

            </div>
            @endif

                <div class="sendimg">
                    <div class="file-input">
                        <input type="file" wire:model="file" id="file-input" class="file-input__input" />
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
                <span>Upload file</span></label
              >
            </div>
          </div>
          <div class="sendMassege">
            <input wire:model="message" class="form-control input shadow-none w-100 d-inline-block" placeholder="Type a message" @if(!$file) required @endif>
            <input
              type="submit"
              class="btn btn-success"
              value="ارسال"
              name="send"
            />
          </div>
        </form>

        </div>



        <div class="col-md-2">
          <p class="h4">الرسائل</p>

          <p class="h4"><i class="fas fa-plus"></i> الف رساله</p>
          <p class="h4 active">البريد</p>
          <p class="h4">بريد مؤذى</p>
          <p class="h4">رسل</p>
        </div>
      </div>






</div>
    </div>
</div>
