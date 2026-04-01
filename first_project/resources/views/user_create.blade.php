<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Srore User</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">


</head>

<body>


    <div class="container mt-5">

        <div class="card shadow">
            <div class="card-header text-center bg-primary text-white">
                <h4 class="mb-0"> Create new User</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('user/store') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">First Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="first_name"
                                class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                                
                            @error('first_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="last_name"
                                class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                            @error('last_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email" required>
                            @error('email')
                               <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                required>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        <label class="col-sm-2 col-form-label">Gender</label>

                        <div class="col-sm-10 d-flex align-items-center">

                            <div class="form-check mr-3">
                                <input class="form-check-input" type="radio" name="gender" id="male"
                                    value="male" required>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female"
                                    value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="mo_no"
                                class="form-control @error('mo_no') is-invalid @enderror" placeholder="Phone Number">
                            @error('mo_no')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-sm-2">
                            <button type="submit" class="btn btn-primary">Save User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
