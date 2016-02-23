<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome-4.5.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-left">
                <ul class="nav navbar-nav">
                    <li><a href="/home">Home</a></li>
                </ul>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?=$_SESSION['auth_user']['first_name']?> <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/home/profile"><i class="fa fa-user"></i> Profile</a></li>
                            <?php if ($_SESSION['auth']): ?><li><a href="/auth/logout"><i class="fa fa-sign-out"></i> Logout</a></li><?php endif; ?>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container">

    </div>

</div> <!-- /container -->
</body>
<script src="../js/jquery-2.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
