@extends('frontend.layout.head_foot')
@section('css')
<link rel="stylesheet" href="{{asset("frontend/css/who.css")}}" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="h1">من نحن؟</p>
            <p class="h4">
                نحن الموقع الأول فى المملكه العربيه السعوديه الذى يساعد على تقريب البائع بالمشترى من غير وسائط
            </p>
            <hr />
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="h1">Team Members</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="pic" style="background-image: url({{asset("frontend/img/person.jpg")}})"></div>
            <div class="text">
                <p class="h4">Ahmed El_Solaya</p>
                <p class="h4">Web Design</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pic" style="background-image: url({{asset("frontend/img/elgayar.jpg")}})"></div>
            <div class="text">
                <p class="h4">Abdullah El_Gayar </p>
                <p class="h4">backEnd web devoleper</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="pic" style="background-image: url({{asset('frontend/img/201577824_2897308150516725_7630860166567257425_n.jpg')}})"></div>
            <div class="text">
                <p class="h4">Mohamed El_Ganayne </p>
                <p class="h4">Web Design</p>
            </div>
        </div>

    </div>
</div>
@endsection
