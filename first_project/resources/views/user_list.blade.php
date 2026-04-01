<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>User List</title>
</head>

<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-6">
                <a href="{{ url('user/create') }}"class="btn btn-sm btn-primary ">Add User</a>
                <a href="{{ url('logout') }}"class="btn btn-sm btn-warning">Logout</a>
            </div>

            <div class="col-6 ">

                <form action="" class="row">
                    <div class="col-10">
                        <input type="text" name="search" placeholder="search here" id=""
                            class="form-control">

                    </div>
                    <div class="col-2">
                        <button class="btn  btn-success">Search</button>
                    </div>
                </form>


            </div>


        </div>



        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Mo_No</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                @foreach ($users as $key => $user)
                    <tr class="{{ $user->id == Auth::user()->id ? 'table-warning' : '' }}">
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->mo_no }}</td>
                        <td>
                            <a href="{{ url('user/edit/' . $user->id) }}"class="btn btn-sm btn-primary ">Edit</a>
                            <a href="{{ url('user/delete/' . $user->id) }}"class="btn btn-sm btn-danger ">Delete</a>

                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {{ $users->Links() }}

    </div>


    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
