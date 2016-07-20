<?php
error_reporting(E_ALL);
ini_set('display_errors','On');

global $db;
$db = mysqli_connect('localhost', 'root', 'root') or die('Error in database connection');
mysqli_select_db($db, "hotelsite") or die ("no database");
//mysql_select_db('hotelsite',$db) or die(mysql_error($db));
?>