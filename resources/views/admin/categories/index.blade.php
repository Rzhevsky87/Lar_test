@extends('admin.layouts.admin')

@section('content')
    <h2>
        @foreach ($categories as $item)
            <div>
                {{$item->name}}
                <a href="{{route('category.edit', ['id' => $item->id]) }}">редактировать</a>
            </div>
        @endforeach
    </h2>
@endsection
