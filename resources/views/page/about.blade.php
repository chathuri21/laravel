@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>
This is about page
<br>
<a href="{{route('profile')}}">name routing before reverse routing</a>
<a href="{{route('admin::dashboard')}}">Dashboard</a>
<a href="{{route('admin::reports')}}">Reports</a>
@endsection
