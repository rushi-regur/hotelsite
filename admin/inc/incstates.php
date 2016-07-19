<?php

global $message;
$message = '';
$successMessage = '';

function printStatesinTable()
{
	global $db;
	$results = getAllStates($db);
	displayStateAndLinks($results);
}


if($_SERVER['REQUEST_METHOD']=="GET")
{
	if(isset($_GET['updated']))
	{
		$successMessage = "State has been updated successfully";
	}
	if(isset($_GET['added']))
	{
		$successMessage = "State has been added successfully";
	}
	if(isset($_GET['deleted']))
	{
		$successMessage = "State has been deleted successfully";
	}
}
?>