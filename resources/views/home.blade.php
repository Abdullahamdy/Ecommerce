{{-- @extends('layouts.app') --}}
@extends('frontend.layout.head_foot')
<link rel="stylesheet" href="{{asset("frontend/css/chat.css")}}" />
@section('css')
@livewireStyles
@endsection

@section('content')
<div class="container">
    @livewire('message', ['users' => $users, 'messages' => $messages ?? null])
</div>
@endsection
@section('script')
@livewireScripts
@endsection





{{-- <div class="container" style="margin-bottom: 10%">
    <div class="row">
        <div class="col-md-3">
            <div class="notification">
                <div class="pic" style="background-image: url(assets/img/person.jpg)"></div>
                <p class="h4">ساره القحطانى</p>
            </div>
            <div class="location">
                <p class="h6">
                    <i class="fas fa-map-marker-alt"></i> المملكه العربيه السعوديه جدة
                </p>
                <p class="h6">عدد المبيعات <span>35</span></p>
            </div>
        </div>
        <div class="col-md-6">
          <form action="/action_page.php">
            <!-- <input type="text" placeholder="ابحث  بريدك.." name="search" />
            <button type="submit"><i class="fa fa-search"></i></button> -->
            <div class="wrap">
              <div class="search">
                 <input type="text" class="searchTerm form-control" placeholder="ابحث هنا">
                 <button type="submit" class="searchButton">
                   <i class="fa fa-search"></i>
                </button>
              </div>
           </div>
        </form>

            <div class="massage">
                <img src="assets/img/person.jpg" alt="Avatar" style="width: 100%" />
                <p>السلام عليكم ورحمه الله وبركاته</p>
                <span class="time-right">11:00</span>
            </div>
            <div class="massage darker">
                <img src="assets/img/person.jpg" alt="Avatar" class="right" style="width: 100%" />
                <p>Hey! I'm fine. Thanks for asking!</p>
                <span class="time-left">11:01</span>
            </div>
            <div class="massage">
                <img src="assets/img/person.jpg" alt="Avatar" style="width: 100%" />
                <p>Sweet! So, what do you wanna do today?</p>
                <span class="time-right">11:02</span>
            </div>
            <div class="massage darker">
                <img src="assets/img/person.jpg" alt="Avatar" class="right" style="width: 100%" />
                <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                <span class="time-left">11:05</span>
            </div>
            <div class="sendimg">
                <div class="file-input">
                    <input type="file" name="file-input" id="file-input" class="file-input__input" />
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
        <textarea
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
    <div class="col-md-2">
      <p class="h4">الرسائل</p>

      <p class="h4"><i class="fas fa-plus"></i> الف رساله</p>
      <p class="h4 active">البريد</p>
      <p class="h4">بريد مؤذى</p>
      <p class="h4">رسل</p>
    </div>
  </div>
</div> --}}
