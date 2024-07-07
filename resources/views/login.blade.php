
<form action="{{route('login')}}" method="POST">
    @csrf
    Email:<input type="email" name="email" ><br>

    Password:<input type="password" name="password"><br>

        <button type="submit">Login</button>
        <a href="{{url('register')}}">Register</a>
</form>
