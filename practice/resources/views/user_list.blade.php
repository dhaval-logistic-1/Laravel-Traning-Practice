<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->gender}}</td>
                    <td>{{$item->mo_no}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>