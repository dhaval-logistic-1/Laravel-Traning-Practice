@extends('Layouts.masterlayout')

@section('content')
    <h1>Post Page</h1>
@endsection

@section('title')
    post
@endsection


@section('lode')
    @parent
    <p>This code is appended</p>
@endsection