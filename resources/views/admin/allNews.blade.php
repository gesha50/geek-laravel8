@extends('layouts.admin')

@section('title')Новости@endsection

@section('content')
    <h1>Новости</h1>
    <div class="d-flex flex-wrap justify-content-start row">
        @foreach ($news as $item)
            @include('news.cart')
        @endforeach
    </div>
@endsection
