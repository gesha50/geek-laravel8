
<div class="list-group margin">
{{--    <a href="{{ route('category') }}" class="list-group-item active">Категории</a>--}}
{{--    <a href="/category/1" class="list-group-item list-group-item-action">Спорт</a>--}}
{{--    <a href="/category/2" class="list-group-item list-group-item-action">Политика</a>--}}
{{--    <a href="/category/3" class="list-group-item list-group-item-action">Религия</a>--}}
{{--    <a href="/category/4" class="list-group-item list-group-item-action">Пандемия</a>--}}
{{--    <a href="#" class="list-group-item list-group-item-action">Бизнес</a>--}}

    {{--переделать в такой вариант !--}}
    <a href="{{ route('category') }}" class="list-group-item active">Категории</a>
    @for ($i = 0; $i < count($newsCategory); $i++)
        <a class="list-group-item list-group-item-action" href="{{ route('category.id', $i) }}">{{  $newsCategory[$i] }}</a>
    @endfor
</div>


