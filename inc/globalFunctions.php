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
	$query = "SELECT * FROM state ORDER BY name";
	$results = mysqli_query($db,$query) or die(mysql_error());
	return $results;
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
?>