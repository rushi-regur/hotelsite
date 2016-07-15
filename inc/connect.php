<?php
$db = mysql_connect('localhost', 'root', 'root') or die('Error in database connection');
mysql_select_db('hotelsite',$db) or die(mysql_error($db));
?>