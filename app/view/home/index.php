<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <?php

                echo '<pre>';
                print_r($_SESSION);
                echo '</pre>';

            ?>


            <div class="navbar-left">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                </ul>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <?php if (empty($_SESSION['fb_access_token'])): ?><li><a href="auth/login">Login</a></li><?php endif; ?>
                    <?php if ( ! empty($_SESSION['fb_access_token'])): ?><li><a href="auth/logout">Logout</a></li><?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <ul class="nav nav-list">
            <li class="nav-header">Image</li>
            <li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
            <li class="nav-header">Facebook ID</li>
            <li><?php echo  $_SESSION['FBID']; ?></li>
            <li class="nav-header">Facebook fullname</li>
            <li><?php echo $_SESSION['FULLNAME']; ?></li>
            <li class="nav-header">Facebook Email</li>
            <li><?php echo $_SESSION['EMAIL']; ?></li>
            <div><a href="/auth/logout">Logout</a></div>
        </ul>
    </div>

</div> <!-- /container -->
</body>
<script src="../js/jquery-2.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
