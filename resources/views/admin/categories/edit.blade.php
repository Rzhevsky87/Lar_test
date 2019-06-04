@extends('admin.layouts.admin')

@section('content')
    <div>
        <form method="POST" action="{{ route('category.update', ['id'=>$id]) }}">
            @csrf
            @method('PUT')
            <label for="">Название катеории</label>
            <input type="text" name="name">
            {{-- <input type="hidden" name="id" value="{{ $id }}"> --}}
            <input type="submit" value="Редактировать">
        </form>
    </div>
@endsection
