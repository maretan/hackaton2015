<?php
/**
 * Created by PhpStorm.
 * User: slennie12
 * Date: 11/11/15
 * Time: 4:08 PM
 */
$url = "localhost";
$user = "root";
$password = "usbw";
$database = "zeehondje";
$mysqli = new mysqli($url, $user, $password, $database);

if($mysqli->connect_errno > 0){
    die('Unable to connect to database [' . $mysqli->connect_error . ']');
}

?>