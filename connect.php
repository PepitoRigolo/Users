<?php

$hostname='localhost';
$username='root';
$password='';
$database='users';

$mysqli = new mysqli($hostname, $username, $password, $database);

if($mysqli->connect_error)
{
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}