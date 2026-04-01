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

                <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="col-3 h-100">
                            <img  id="output" alt=""  class=" img-responsive img-fluid img-thumbnail" src="{{ asset('storage/' . $user->file_name) }}" >
                        </div>
                        <div class="col-9">
                            <label for="file" class="form-label">Choose file to upload</label>
                            <input type="file" onchange="loadFile(event)" class="form-control" id="photo" name="photo" accept="image/*">

                            @error('photo')
                                <div class="alert alert-danger mt-2 mb-2">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>



            </div>
        </div>
    </div>
</body>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output'); 
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
</html>
