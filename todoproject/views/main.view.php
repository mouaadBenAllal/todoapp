<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Todos</title>
    <link rel="stylesheet" href="<?php echo ROOT_PATH?>assets/css/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH?>assets/css/flatly/custom.css">
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php ROOT_URL;?>/todoproject">TODO'S</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo ROOT_URL;?>todos/index">Todos</a></li>
                <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['user_info']['role'] == 3) :?>
                    <li class="actived"><a href="<?php echo ROOT_URL;?>users/register">Register user</a></li>
                <?php endif;?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['isLoggedIn'])) :?>
                    <li><a href="<?php echo ROOT_URL; ?>">Welcome <?php echo  $_SESSION['user_info']['username'] ?></a></li>
                    <li><a href="<?php echo ROOT_URL; ?>users/logout">Logout</a></li>
                    <?php else:?>
                    <li><a href="<?php echo ROOT_URL; ?>users/login">Login</a></li>1
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <?php
    require($view);
    ?>

</div>


</body>
<script src="<?php echo ROOT_PATH?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo ROOT_PATH?>assets/js/bootstrap.js"></script>
<script src="<?php echo ROOT_PATH?>assets/js/remove.js"></script>
<script src="<?php echo ROOT_PATH?>assets/js/checkpassword.js"></script>


</html>

