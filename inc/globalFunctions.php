<?php

//*********************************Utility Functions *******************************************
function isPost()
{
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		return true;
	}
	else 
	{
		return false;
	}
}


function isGet()
{
	if($_SERVER['REQUEST_METHOD']=="GET")
	{
		return true;
	}
	else
	{
		return false;
	}
}


//To print an array of error messages
function print_errors($errors)
{
	foreach($errors as $error)
	{
		echo $error;
		echo " | ";
	}
}


//To populate dropdown by passing an array in key=>value format
function populateDropDown($data,$selectedKey)
{
	echo "<br>KEY= $selectedKey";
	foreach($data as $key=>$value)
	{
		echo "<option value='$key' ";
		if($selectedKey == $key) echo "selected=\"selected\"";
		echo ">$value</option>";
	}
}


function getAllHotels()
{
	global $db;
	$stateArray=array();
	$query = "SELECT id, name FROM hotel ORDER BY name";
	$results = mysqli_query($db,$query) or die(mysql_error());
	while($row=mysqli_fetch_assoc($results))
	{
		$stateArray[]=$row;
	}
	
	return $stateArray;
}


//To fetch all the states along with ID used in incstates.php and incCities.php to populate dropdown
function getAllStates()
{
	global $db;
	$stateArray=array();
	$query = "SELECT * FROM state ORDER BY name";
	$results = mysqli_query($db,$query) or die(mysql_error());
	while($row=mysqli_fetch_assoc($results))
	{
		$stateArray[]=$row;
	}

	return $stateArray;
}

function allStatesInDropDown($stateId)   //Call this function to get all states in dropdown and retain value while post method
{
	$stateArray = getAllStates();
	foreach($stateArray as $value)
	{
		$data = array ($value['id']=>$value['name']);
		populateDropDown($data, $stateId);
	}
}

function getAllCities($stateId)
{
	if($stateId>0)
	{
		global $db;
		$query = "SELECT id, name FROM city WHERE stateId = {$stateId} ORDER BY name";
		$results = mysqli_query($db,$query) or die(mysqli_error($db));
		while($row=mysqli_fetch_assoc($results))
		{
			$cityArray[]=$row;
		}

		return $cityArray;
	}
	else
	{
		$cityArray = array();
		return $cityArray;
	}
}

function allCitiesInDropDown($stateId,$cityId)
{
	$cityArray = getAllCities($stateId);
	foreach($cityArray as $value)
	{
		$data = array ($value['id']=>$value['name']);
		populateDropDown($data, $cityId);
		echo "In allcitiesindropodown $cityId";
	}
}


// To fetch all amenities and return an array that could be printed directly as done in amenities.php
function getAllAmenities()
{
	global $db;
	$query = "SELECT id, name FROM amenities ORDER BY name";
	$results = mysqli_query($db,$query) or die(mysqli_error($db));
	while($row=mysqli_fetch_assoc($results))
	{
		$amenitiesArray[]=$row;
	}

	return $amenitiesArray;
}


/*
function allStatesInDropDown($stateId)   //Call this function to get all states in dropdown and retain value while post method
{
	$stateArray = getAllStates();
	foreach($stateArray as $value)
	{
		$data = array ($value['id']=>$value['name']);
		populateDropDown($data, $stateId);
	}
}
*/
function oddEvenRows($class)
{
 	//global $odd;
	return ($class=="evenRow" ? 'oddRow' : 'evenRow');
	//$odd=!$odd;
}

function sucessMsg($type)
{
	$successMessage = '';
	if($_SERVER['REQUEST_METHOD']=="GET")
	{
		if(isset($_GET['updated']))
		{
			$successMessage = "$type has been updated successfully";
		}
		elseif(isset($_GET['added']))
		{
			$successMessage = "$type has been added successfully";
		}
		elseif(isset($_GET['deleted']))
		{
			$successMessage = "$type has been deleted successfully";
		}
		//return $successMessage;
	}
	return $successMessage;
}
?>