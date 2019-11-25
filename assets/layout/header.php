<?php

session_start();

require __DIR__.'/../../vendor/autoload.php';

function redirect($url)
{
    if (headers_sent())
        die('<script type="text/javascript">window.location=\'' .App\Config::DOMAIN.$url.'\'; </script>');
    else
    {
        header('LOCATION: '.App\Config::DOMAIN.$url);
        die();
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Firehaus
    </title>

    <link rel="stylesheet" href="<?= App\Config::DOMAIN ?>/assets/css/style.css">
</head>

<body>

    <div class="header">
        <p class="menu-left">
            <span class="nav-link" style="padding-right: 20px;">Firehaus</span>

            <a class="nav-link" href="<?= App\Config::DOMAIN ?>/index.php">
                <i class="fas fa-fw fa-home icon-padding-right"></i> Home
            </a>
        </p>

        <p class="menu-right">
            <?php if (!\Auth\Auth::loggedIn()) { ?>
                <a class="nav-link" href="<?= App\Config::DOMAIN ?>/auth/user/login.php">
                    <i class="fas fa-fw fa-key icon-padding-right"></i> Login
                </a>
                &middot;
                <a class="nav-link" href="<?= App\Config::DOMAIN ?>/auth/user/register.php">
                    <i class="fas fa-fw fa-user-plus icon-padding-right"></i> Register
                </a>
            <?php } else { ?>
                <a class="nav-link" href="<?= App\Config::DOMAIN ?>/auth/profile/profile-view.php">
                    <i class="fas fa-fw fa-user icon-padding-right"></i> Profile
                </a>
                <a class="nav-link" href="<?= App\Config::DOMAIN ?>/auth/user/logout.php">
                    <i class="fas fa-fw fa-sign-out-alt icon-padding-right"></i> Logout
                </a>
            <?php } ?>
        </p>
    </div>
