
@extends('admin.layouts.main',[
    'page_header'		=> 'المستخدمين',
    'page_description'	=> 'عرض المستخدمين',
    'link' => url('admin/inbox')

    ])
@section('css')
<link rel="stylesheet" href="{{asset("frontend/css/chat.css")}}" />

@endsection
@section('content')
    <div class="container-fluid">
        <div class="container">
            @livewire('show', ['users' => $users, 'messages' => $messages, 'sender' => $sender])
        </div>
    </div>
@endsection



