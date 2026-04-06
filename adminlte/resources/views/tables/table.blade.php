@extends('adminlte::page')

@section('title', 'Simple Tables')

@section('content_header')
    <h1>Simple Tables</h1>
@endsection

@section('content')

    <div class="container-fluid">

        @include('tables.div1')

        @include('tables.div2')

        @include('tables.div3')

        @include('tables.div4')

        @include('tables.div5')

    </div>
@endsection


@push('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@endpush
