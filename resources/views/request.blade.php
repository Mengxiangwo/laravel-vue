@extends('layouts.app')

@section('content')
    <form method="POST" action="/request/test" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{--<input type="text" name="t1" value="{{ old('t1') }}">
        <input type="text" name="t2" value="{{ old('t2') }}">--}}
        <input type="file" name="file1">
        <input type="submit" value="XXX">
    </form>
@stop