<?php

global $message, $successMessage;
$message = '';
$successMessage = '';

function printAmenitiesInTable()
{
	$results = getAllAmenities();
	displayAmenitiesAndLinks($results);
}

function getAllAmenities()
{
	$query = "SELECT * FROM amenities ORDER BY name";
	$results = mysql_query($query) or die(mysql_error());
	return $results;
}


function displayAmenitiesAndLinks($results)
{
	$odd=1;
	while($row=mysql_fetch_assoc($results))
	{
		echo $odd==1 ? '<tr class=managePlacesOddRow>' : '<tr class=managePlacesEvenRow>';
		$odd=~$odd;
		echo '<td style="width:70%">';
		echo $row['name'];
		echo '</td>';
			
		echo '<td>';
		echo '<a href="manageamenities.php?action=edit&id=' . $row['id'] . '">[EDIT]</a>';
		echo ' <a href="manageamenities.php?action=delete&id=' . $row['id'] . '">[DELETE]</a>';
		echo '</td>';
		echo '</tr>';
	}
}

if($_SERVER['REQUEST_METHOD']=="GET")
{
	if(isset($_GET['updated']))
	{
		$successMessage = "Amenity has been updated successfully";
	}
	if(isset($_GET['added']))
	{
		$successMessage = "Amenity has been added successfully";
	}
	if(isset($_GET['deleted']))
	{
		$successMessage = "Amenity has been deleted successfully";
	}
}
?>