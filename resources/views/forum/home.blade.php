@extends('forum.layouts.forum')

@section('content')
    <div>
        @foreach ($questions as $item)
            <h4>
                {{$item->title}}
            </h4>
            <p>
                {{$item->text}}
            </p>
        @endforeach
        {{dd($questions)}}
    </div>
@endsection
