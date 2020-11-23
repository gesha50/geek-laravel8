@extends('layouts.app')

@section('title')Категории@endsection

@section('content')
    <h1>Одна Категория</h1>

    @for ($i = 0; $i < count($oneCategory); $i++)
    <div class="newsBlock">
        <h3>{{ $oneCategory[$i]['title'] }}</h3>
        <p>{{ $oneCategory[$i]['description'] }}</p>
        <a href="{{ route('news_id', $oneCategory[$i]['id']) }}">Читать подробнее...</a>
    </div>
    @endfor
@endsection
