<?php

session_start();

require('../app/app.php');

ensure_user_is_authenticated();

$view_bag =['title' => 'Forms'];

view('user/formindex');

?>