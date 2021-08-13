<?php


$user_name =        $_POST['username'];
$user_pass = $_POST['password'];


if (is_numeric($user_name)) $errors[] = 'Username can not be a number';
  