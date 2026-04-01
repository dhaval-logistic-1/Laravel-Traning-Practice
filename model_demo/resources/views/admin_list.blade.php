<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin List</title>
</head>

<body>
    <table border="1">
        <thead >
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>IsActive</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admin as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->frist_name}}</td>
                    <td>{{$item->gender}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->is_active}}</td>
                    <td><a href="{{ url('admin/'.$item->id)}}">view</a></td>
                </tr>
            @endforeach
           
        </tbody>
    </table>

</body>

</html>
