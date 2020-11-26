@extends('layouts.app')

@section('title')Категории@endsection

@section('content')
    <h1>Одна Категория</h1>
     @foreach ($oneCategory as $item)
         @include('news.cart')
     @endforeach
@endsection
