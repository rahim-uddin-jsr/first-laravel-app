@extends('master')
@section('page_title','Services')

@section('content')
    @if ($page_name==true)
    <h1>{{ $page_name }}</h1>
    @endif

    @if (count($products)>=0)
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">

        @foreach ($products as $product)
        @include('include.partial.products')
        @endforeach
    </div>
    @endif
@endsection
