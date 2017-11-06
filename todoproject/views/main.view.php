<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Todos</title>
    <link rel="stylesheet" href="<?php echo ROOT_URL;?>assets/css/superhero/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_URL;?>assets/css/superhero/custom.css">

</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="<?php echo ROOT_PATH;?>">TODO'S</a>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo ROOT_PATH;?>todos/all">Overzicht</a></li>
                <!-- Kijkt of gebruiker is ingelogd en of gebruiker rol 3 is. -->
                <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['user_info']['role'] == 3) :?>
                    <li><a href="<?php echo ROOT_PATH; ?>users/register">Add user</a></li>
                <?php endif;?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Kijkt of gebruiker is ingelogd zoja, laat naam zien in menu. -->
                <?php if(isset($_SESSION['isLoggedIn'])) :?>
                    <li><a>Welcome <?php echo $_SESSION['user_info']['username']; ?></a></li>
                    <li><a href="<?php echo ROOT_PATH; ?>users/logout">Logout</a></li>
                <?php else:?>
                    <li><a href="<?php echo ROOT_PATH; ?>users/login">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <?php require($view); ?>
</div>


</body>
<script src="<?php echo ROOT_PATH;?>assets/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo ROOT_PATH;?>assets/js/bootstrap.js"></script>
<script src="<?php echo ROOT_PATH;?>assets/js/remove.js"></script>
<script src="<?php echo ROOT_PATH;?>assets/js/checkpassword.js"></script>
</html>