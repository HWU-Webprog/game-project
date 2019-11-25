<?php

require __DIR__.'/../../assets/layout/header.php';

use \Auth\Auth as Auth;

Auth::logOut();

redirect('/index.php');
