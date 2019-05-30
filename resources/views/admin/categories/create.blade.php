@extends('admin.layouts.admin')

@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <label for="">Создать категорию</label>
        <input type="text" name="name">
        <input type="submit" value="submit">
    </form>
@endsection
