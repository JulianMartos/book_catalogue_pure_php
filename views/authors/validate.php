<?php


$author_name =        $_POST['author_name'];
$author_lastName =    $_POST['author_lastName'];
$author_phoneNumber = $_POST['author_phoneNumber'];
$author_address =     $_POST['author_address'];
$author_country =     $_POST['author_country'];


if (!$author_name) {       $errors[] =        'Author name is required';}
  
if (!$author_lastName) {    $errors[] =       'Author last name is required';

if (!$author_phoneNumber) {       $errors[] = 'Author phone number is required';}

if (!$author_address) {       $errors[] =     'Author address is required';}
    
if (!$author_country) {       $errors[] =     'Author country is required';}

}
