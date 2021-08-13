<?php


$editorial_name =        $_POST['editorial_name'];
$editorial_phoneNumber = $_POST['editorial_phoneNumber'];
$editorial_address =     $_POST['editorial_address'];
$editorial_country =     $_POST['editorial_country'];


if (!$editorial_name) {       $errors[] =        'Editorial name is required';}
  
if (!$editorial_phoneNumber) {       $errors[] = 'Editorial phone number is required';}

if (!$editorial_address) {       $errors[] =     'Editorial address is required';}
    
if (!$editorial_country) {       $errors[] =     'Editorial country is required';}


