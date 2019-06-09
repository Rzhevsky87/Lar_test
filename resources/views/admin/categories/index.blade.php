@extends('admin.layouts.admin')

@section('content')
    <h2>
        @foreach ($categories as $item)
            <div>
                {{$item->name}}
                <a href="{{route('category.edit', ['id' => $item->id]) }}">редактировать</a>
                <form method="POST" action="{{route('category.destroy', ['category' => $item->id])}}">
                    {@dump($item->id)}
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Удалить">
                </form>
            </div>
        @endforeach
    </h2>
@endsection
