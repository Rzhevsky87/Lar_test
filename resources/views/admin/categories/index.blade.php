@extends('admin.layouts.admin')

@section('content')
    <h2>
        @foreach ($categories as $item)
            {{$item->name}}
            <br>
        @endforeach
    </h2>
@endsection
