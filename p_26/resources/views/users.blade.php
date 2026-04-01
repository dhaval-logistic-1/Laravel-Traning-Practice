<div>



    <h3>Add new User</h3>

    <form action="adduser" method="post">

        @csrf 

        <span style="color: green">
            {{session('message')}}
        </span>
        

        <br>
        <input type="text" name="name" id="name " placeholder="Enter Name"><br>

        <input type="email" name="email" id="email" placeholder="Enter email"><br>

        <input type="tel" name="phone" id="phone" placeholder="Enter Phone number"><br>

        <button>Add User data</button>
    </form>


    {{-- <h1>Users</h1>
  

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->age }}</td>
            </tr>
        @endforeach
    </table> --}}



    {{-- <div>
        <h2>User Demo page</h2>

        <form action="users" method="post">
            @csrf

            <input type="text" name="name">

            <input type="password" name="password" >


            <button>Login</button>
        </form>
    </div> --}}

</div>
