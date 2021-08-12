<?php


$book_title =   $_POST['title'];
$book_authors = $_POST['author'];
$book_edit =    $_POST['edit'];
$book_pub_date =$_POST['pub_date'];


if (!$book_title) {       $errors[] = 'Book title is required';}

if (!isset($book_authors)) {       $errors[] = 'Book author is required';}

if (!isset($book_edit)) {        $errors[] = 'Book editorial is required';}

if (!$book_pub_date) {    $errors[] = 'Book published date is required';
}
