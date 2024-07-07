<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{url('register/create')}}" method="POST" >
    @csrf
        NAME:<input type="text"name="name">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <br>
        EMAIL:<input type="email" name="email">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
        <br>
        PASSWORD:<input type="password" name="password">
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
       <br>
       <label for="password_confirmation">Confirm Password</label>
       <input type="password" name="password_confirmation" id="password_confirmation" required>
       @error('password_confirmation')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror
            <br>

        REGISTER AS <select name="type">
                <option value="user">User</option>
                <option value="worker">Worker</option>
                   </select>
            <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
