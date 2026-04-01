<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">

    <div class="card" style="width: 460px;">
        <div class="card-header bg-light">
            <h4 class="mb-0">Login</h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <input type="email" id="email" class="form-control" placeholder="Email" />
            </div>
            <div class="mb-3">
                <input type="password" id="password" class="form-control" placeholder="Password" />
            </div>
            <button class="btn btn-primary" id="loginButton">Login</button>
        </div>
        <div class="card-footer bg-light"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-4.0.0.min.js"
        integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#loginButton').click(function() {
                const email = $('#email').val();
                const password = $('#password').val();

                $.ajax({
                    url: '/api/login',
                    type: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        email: email,
                        password: password,
                    }),
                    success: function(response) {
                        console.log(response);
                        localStorage.setItem('api_token', response.token);
                        window.location.href = '/allposts';
                    },
                    error: function(xhr, status, error) {
                        alert('Login failed: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>




</body>

</html>
