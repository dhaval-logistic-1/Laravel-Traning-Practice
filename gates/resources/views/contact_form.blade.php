<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">

        <div class="card">
            <div class="card-header">
                <h4>Contact Form</h4>
            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                    </div>

                    <div class="mb-3">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Your Email">
                    </div>

                    <div class="mb-3">
                        <label>Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>

                    <div class="mb-3">
                        <label>Message</label>
                        <textarea name="message" class="form-control" rows="4" placeholder="Message"></textarea>
                    </div>

                    <div class="mb-3">
                        <label>Attach File</label>
                        <input type="file" name="file" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>

                </form>

            </div>
        </div>

    </div>
</body>

</html>
