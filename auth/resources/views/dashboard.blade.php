<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-5 text-center" style="width:500px;">

        <h2 class="mb-4">Welcome to Dashboard </h2>
        <h2 class="mb-4">{{Auth::user()->name}}</h2>

        <div class="d-grid gap-3">

            <a href="#" class="btn btn-primary btn-lg">
                Go To Inner Page
            </a>

            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg w-100">
                    Logout
                </button>
            </form>

        </div>

    </div>
</div>

</body>
</html>