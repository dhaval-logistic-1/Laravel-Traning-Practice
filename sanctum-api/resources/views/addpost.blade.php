<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

    <!-- Header -->
    <div class="bg-primary text-white p-3 mb-3">
        <h2 class="mb-0 fw-bold">Create Post</h2>
    </div>


    <form id="addform" action="POST" enctype="multipart/form-data">
        <div class="container-fluid px-4">
            @csrf
            <div class="mb-3">
                <input type="text" id="title" class="form-control" placeholder="Title" />
            </div>

            <div class="mb-3">
                <textarea class="form-control" id="description" placeholder="Description" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <input type="file" id="image" class="form-control" />
            </div>

            <div>
                <button class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-secondary">Back</button>
            </div>

        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var addform = document.getElementById('addform');

        addform.onsubmit = async (e) => {
            e.preventDefault();

            const title = addform.querySelector('#title').value;
            const description = addform.querySelector('#description').value;
            const image = addform.querySelector('#image').files[0];

            const formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);
            formData.append('image', image);

            try {
                const response = await fetch('/api/posts', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('api_token'),
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    
                    // alert('Post created successfully!');
                    window.location.href = '/allposts';
                })


                
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while creating the post.');
            }
        };
    </script>
</body>

</html>
