
<div class="col-md-4 card m-2 @if($item->is_private) bg-warning @endif">
    <img src="{{ $item->image }}"
         class="height_250" alt="Card image">
    <h3 class="card-header">{{ $item->title }}</h3>
    <div class="card-body">
        <p class="card-text">{{ $item->spoiler }}</p>
        <a href="{{ route('news.id', $item->id) }}" class="btn btn-primary">Читать подробнее...</a>
        @if(isset($isAdmin))
            <a href="{{ route('admin.news.delete', $item->id) }}" class="btn btn-danger" >x</a>
        @endif
    </div>
</div>
