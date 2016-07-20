<?php
//To print an array of error messages
function print_errors($errors)
{
	foreach($errors as $error)
	{
		echo $error;
	}
}


//To populate dropdown by passing an array in key=>value format
function populateDropDown($data,$selectedKey)
{
	foreach($data as $key=>$value)
	{
		echo "<option value='$key' ";
		if($selectedKey == $key) echo "selected=\"selected\"";
		echo ">$value</option>";
	}
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

function allStatesInDropDown()   //Call this function to get all states in dropdown and retain value while post method
{
	global $stateId;
	$results = getAllStates();
	while($row = mysqli_fetch_assoc($results))
	{
		$row = array_values($row);
		$data = array ($row[0]=>$row[1]);
		populateDropDown($data,$stateId);
	}

}

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