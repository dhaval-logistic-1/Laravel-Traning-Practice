
@extends('master') 

@section('content')
    <div class="row justify-content-center w-100">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card shadow-lg p-4">
                    <h3 class="text-center mb-4">Login</h3>
                    <form method="POST" action="/login">
                        @csrf  

                        <div class="form-group mb-3">
                            <label for="Email1">Email address</label>
                            <input type="email" name="email" class="form-control" id="Email1" placeholder="Enter email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="Password1">Password</label>
                            <input type="password" name="password" class="form-control" id="Password1" placeholder="Password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="#" class="text-muted">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
