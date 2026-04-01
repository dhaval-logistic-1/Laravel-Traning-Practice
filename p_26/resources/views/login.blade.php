<div>
    <h1>Login</h1>
    <form action="login" method="post">
        @csrf

        <input type="text" name="user">

        <input type="password" name="password">


        <button>Login</button>
    </form>
</div>
