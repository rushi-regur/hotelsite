<?php

global $message;
$message = '';
$successMessage = '';
$stateId = '';


function printCitiesInTable()
{
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		global $db;
		$results = getAllCities($db);
		displayCitiesAndLinks($results);
	}
}

function getAllCities()
{
	global $db, $stateId;
	$query = "SELECT id, name FROM city WHERE stateId = {$stateId} ORDER BY name ";
	$results = mysqli_query($db,$query) or die(mysqli_error($db));
	return $results;
}


if($_SERVER['REQUEST_METHOD']=="GET")
{
	if(isset($_GET['updated']))
	{
		$successMessage = "City has been updated successfully";
	}
	if(isset($_GET['added']))
	{
		$successMessage = "City has been added successfully";
	}
	if(isset($_GET['deleted']))
	{
		$successMessage = "City has been deleted successfully";
	}
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	if(isset($_POST['dropDownSet'])?$_POST['dropDownSet']:0)
	{
		$stateId = $_POST['stateDropDown'];
	}
}



?>