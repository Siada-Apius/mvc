<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/signin.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">


            <div class="navbar-left">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                </ul>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Please log in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
        <p class="help-block text-center">OR</p>
        <a class="btn btn-lg btn-primary btn-block" href="/auth/face">Log in with Facebook!</a>

    </form>





</div> <!-- /container -->
</body>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>
