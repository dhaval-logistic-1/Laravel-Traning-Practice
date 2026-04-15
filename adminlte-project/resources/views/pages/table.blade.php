@extends('app')

@section('content')
    <div class="container-fluid">

        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Simple Tables</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        @include('pages.div1')
        @include('pages.div2')
        @include('pages.div3')

    </div>
@endsection
