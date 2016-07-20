<?php

function getAllCities($stateId)
{
	if($stateId>0)
	{
		global $db;//, $stateId;
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


if(isPost())
{
	$stateId = $_POST['stateDropDown'];
}
else
{
	$stateId = 0;
}

?>