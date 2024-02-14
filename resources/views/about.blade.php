@extends('master')
@section('page_title','About Page')

@section('content')
@if ($page_name==true)
<h1>{{ $page_name }}</h1>
@endif
@endsection