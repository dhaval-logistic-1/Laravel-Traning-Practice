<div>
    <h1>Profile Page</h1>


    @if (session('user'))
        <h4>Welcome {{session('user')}}</h4>  
    @else
        <h4>User Not Founde In session</h4>
    @endif

    <a href="logout">Logout</a>
    
</div>
