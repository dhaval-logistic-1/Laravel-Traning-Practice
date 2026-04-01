<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <title>File Upload </title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <h1 class="text-center mt-5">File Upload </h1>

                <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Choose file to upload</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">

                        @error('photo')
                            <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>

                <div class="row">
                    <div class="col-6">
                        @if (session('status'))
                            <div class="alert alert-success mt-2 mb-2">{{ session('status') }}</div>
                        @endif
                    </div>
                </div>


                <div class="row">

                    @foreach ($users as $user)
                        <div class="col-2">
                            <img src="{{ asset('storage/' . $user->file_name) }}" alt="Image"
                                class="img-fluid  img-thumbnail">
                            <div class="d-flex justify-content-between">
                                <form action="  {{ route('user.destroy', $user->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mt-2 ">Delete</button>
                                </form>

                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning mt-2">Update</a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</body>

</html>
