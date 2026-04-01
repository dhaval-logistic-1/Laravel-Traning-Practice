<div>
    <h3>Student page</h3>

    <table border="1">
        <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Age</td>
        </tr>
        @foreach ($data as $item)
            <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->age }}</td>
            </tr>
        @endforeach
    </table>
</div>
