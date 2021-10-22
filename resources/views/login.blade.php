<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('../login/assets/css/login.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
          integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Document</title>
</head>

<body>
<div class="container">
    <div class="left">
        <img src="{{asset('login/assets/img/d2.jpg')}}" alt=""><br>
        <span>Book Rental</span>
    </div>
    <div class="right">
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label class="welcome">Welcome back!</label><br>
                <label class="sign">Sign in to your account</label><br>
                <label class="username">User name </label>
                <input type="text" class="form-control" name="email"
                       placeholder="Enter ID" required="required">
            </div>
            <div class="form-group">
                <label class="pass">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember_me">
                <label class="form-check-label" for="exampleCheck1" >Remember me</label>
                <label class="Forgot">  <a href="#">Forgot Password</a> </label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>

            <div class="form-group">
                <span>Dont have a account ?</span>
                <a href="" class="register">Register account</a>
            </div>

        </form>
    </div>


</div>

<script src="{{asset('../login/assets/javascript/jquery-3.6.0.min.js')}}"></script>
</body>

</html>
