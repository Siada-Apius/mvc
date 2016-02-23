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
    <div class="row">
        <div class="col-md-3">
            <div class="well">
                <div class="panel-heading">
                    <p>Friends <em>(<?=count($data['friends'])?>)</em></p>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        <?php foreach ($data['friends'] as $friend): ?>
                            <li><?= $friend['name'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="">
                <div class="panel-heading">
                    <p class="h3">Posts <em>(<?=count($data['posts'])?>)</em></p>
                </div>
                <div class="panel-body">
                    <?php foreach ($data['posts'] as $post): ?>
                        <div class="row">
                            <div class="thumbnail ">
                                <?php echo isset($post['story']) ? '<p class="lead">'. $post['story'] .'</p>' : ''?>
                                <?php echo isset($post['message']) ? '<p>'. $post['message'] .'</p>' : ''?>
                                <div class="caption">
                                    <span class="text-muted"><em><?php echo $post['id']?></em></span>
                                    <p class="pull-right text-muted"><?php echo $post['created_time']->format('Y-m-d H:i')?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div> <!-- /container -->
</body>
<script src="../js/jquery-2.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
</html>
