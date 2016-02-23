<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/signin.css">
</head>
<body>
<div class="container">
    <form class="form-signin" method="post" action="/auth/signin">
        <h2 class="form-signin-heading">Please log in</h2>
        <input name="first_name" type="text" class="form-control" placeholder="First name" required>
        <input name="last_name" type="text" class="form-control" placeholder="Last name" required>
        <input name="email" type="email" class="form-control" placeholder="Email address" required>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-success btn-block" type="submit">Sign in</button>
<!--        <p class="help-block text-center">OR</p>-->
<!--        <a class="btn btn-lg btn-primary btn-block" href="/auth/face">Log in with <i class="fa fa-facebook"></i>acebook!</a>-->
    </form>

    <div class="form-signin">
        <div class="row">
            <div class="col-xs-12 text-center">
                <i class="fa fa-caret-square-o-left"></i>
                <a href="/">Back</a>
            </div>
        </div>
    </div>

</div> <!-- /container -->
</body>
<script src="../js/jquery-2.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
