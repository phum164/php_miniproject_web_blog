@extends('layout')
@section('title', 'เกี่ยวกับเรา')
@section('content')
    <h2>เกี่ยวกับเรา</h2>
    <hr>
    {{-- นำค่าที่ compact มาใช้งาน --}}
    <p>ผู่จัดทำ : {{$name}}</p>
    <p>วันเริ่มต้น : {{$date}}</p>
    <p>lorem ipsum dolor sit amen consertetur adipisicing elti. Eligendi ipsa reifl
        nulla autem? Modi incideij ded necsessitatibus dignissimos assumenda eum volup
        eum mollitia magin. A,
    </p>
    <a href="all">บทความทั้งหมด</a>
    <a href="{{route('page')}}">หน้าแรก</a>
@endsection