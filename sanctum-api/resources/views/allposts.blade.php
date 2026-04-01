<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

    <div class="bg-primary text-white p-3 mb-3">
        <h2 class="mb-0 fw-bold">All Posts</h2>
    </div>

    <div class="container-fluid px-4">

        <div class="mb-3">
            <button class="btn btn-primary me-2">Add New</button>
            <button class="btn btn-danger" id="logoutButton">Logout</button>
        </div>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="postContainer">
                


            </tbody>
        </table>

    </div>
    {{-- single post modal --}}
    <div class="modal fade" id="singlePostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="singlePostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="singlePostModalLabel">single Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>




    {{-- update post modal --}}
    <div class="modal fade" id="updatePostModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="updatePostModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="updateform" enctype="multipart/form-data">

                        <div class="modal-header">
                            <h5 class="modal-title">Update Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <input type="hidden" id="postId">

                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" id="postTitle" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea id="postBody" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Current Image</label><br>
                                <img id="showImage" width="150" class="img-thumbnail">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Upload New Image</label>
                                <input type="file" id="postImage" class="form-control">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>

                            <button type="submit" id="updatePost" class="btn btn-primary">
                                Save Changes
                            </button>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"
        integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>


    <script>
        document.getElementById('logoutButton').addEventListener('click', function() {
            const token = localStorage.getItem('api_token');

            if (!token) {
                alert('No token found. Please login first.');
                return;
            }

            fetch('/api/logout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token
                    }
                })
                .then(response => response.json())
                .then(data => {
                    localStorage.removeItem('api_token');
                    alert('Logged out successfully');
                    window.location.href = '/';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred during logout');
                });
        });

        function loadPosts() {
            const token = localStorage.getItem('api_token');

            if (!token) {
                alert('No token found. Please login first.');
                return;
            }

            fetch('/api/posts', {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    }
                })
                .then(response => response.json())

                .then(data => {
                    console.log(data.data.posts);
                    const posts = data.data.posts;
                    const postContainer = document.getElementById('postContainer');
                    postContainer.innerHTML = '';
                    posts.forEach(post => {
                        const row = document.createElement('tr');

                        row.innerHTML = `
                            <td style="width: 80px;"><img src="/images/uploads${post.image}" alt="Post Image" class="img-fluid"></td>
                            <td class="fw-bold">${post.title}</td>
                            <td>${post.description}</td>
                            <td><button class="btn btn-primary btn-sm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#singlePostModal" data-bs-posts="${post.id}" >View</button></td>
                            <td><button class="btn btn-success btn-sm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updatePostModal" data-bs-posts="${post.id}  ">Update</button></td>
                            <td><button class="btn btn-danger btn-sm" onclick="deletePost('${post.id}')">Delete</button></td>
                        `;


                        postContainer.appendChild(row);
                    });

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        window.addEventListener('load', loadPosts);


        var singlePostModal = document.getElementById('singlePostModal');

        if (singlePostModal) {

            singlePostModal.addEventListener('show.bs.modal', function(event) {

                var button = event.relatedTarget;
                var postId = button.getAttribute('data-bs-posts');

                fetch(`/api/posts/${postId}`, {
                        method: 'GET',
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('api_token'),
                            'content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data.data.post[0].title);


                        var modalTitle = singlePostModal.querySelector('.modal-title');
                        var modalBody = singlePostModal.querySelector('.modal-body');

                        modalTitle.textContent = data.data.post[0].title;
                        modalBody.innerHTML = `
                        <p><strong>Description:</strong> ${data.data.post[0].description}</p>
                        <img src="/images/uploads${data.data.post[0].image}" alt="Post Image" class="img-fluid">
                    `;
                    })
                    .catch(error => {
                        console.error('Error fetching post details:', error);
                        var modalBody = singlePostModal.querySelector('.modal-body');


                        modalBody.innerHTML = `<p class="text-danger">Failed to load post details.</p>`;
                    });
            });
        }


        var updatePostModal = document.getElementById('updatePostModal');

        if (updatePostModal) {

            updatePostModal.addEventListener('show.bs.modal', function(event) {

                var button = event.relatedTarget;
                var postId = button.getAttribute('data-bs-posts');

                fetch(`/api/posts/${postId}`, {
                        method: 'GET',
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('api_token'),
                            'content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        const postData = data.data.post[0];

                        document.getElementById('postId').value = postData.id;
                        document.getElementById('postTitle').value = postData.title;
                        document.getElementById('postBody').value = postData.description;
                        document.getElementById('showImage').src = `/images/uploads${postData.image}`;
                        

                    })
                    .catch(error => {
                        console.error('Error fetching post details:', error);
                        var modalBody = updatePostModal.querySelector('.modal-body');


                        modalBody.innerHTML = `<p class="text-danger">Failed to load post details.</p>`;
                    });
            });
        }


        var updateForm = document.getElementById('updateform');

        updateForm.onsubmit = async (e) => {
            e.preventDefault();

            const postId = document.getElementById('postId').value;
            const title = document.getElementById('postTitle').value;
            const description = document.getElementById('postBody').value;
            const image = document.getElementById('postImage').files[0];

            const formData = new FormData();
            formData.append('title', title);
            formData.append('description', description);
            if (image) {
                formData.append('image', image);
            }

            try {
                const response = await fetch(`/api/posts/${postId}`, {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('api_token'),
                        'X-HTTP-Method-Override': 'PUT'
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    
                    window.location.href = '/allposts';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the post.');
                });
                
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while updating the post.');
            }
        }

        function deletePost(postId) {
            if (confirm('Are you sure you want to delete this post?')) {
                fetch(`/api/posts/${postId}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('api_token'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // console.log(data);
                    loadPosts();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the post.');
                });
            }
        }
    </script>
</body>

</html>
