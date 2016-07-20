<?php 

//For incAmenities.php to display all amenities in a table
function displayAmenitiesAndLinks($results)
{
	$odd=1;
	while($row=mysqli_fetch_assoc($results))
	{
		echo $odd==1 ? '<tr class=managePlacesOddRow>' : '<tr class=managePlacesEvenRow>';
		$odd=~$odd;
		echo '<td style="width:70%">';
		echo $row['name'];
		echo '</td>';
			
		echo '<td>';
		echo '<a href="manageamenities.php?action=edit&id=' . $row['id'] . '">[EDIT]</a>';
		//echo ' <a href="manageamenities.php?action=delete&id=' . $row['id'] . '">[DELETE]</a>';
		echo '<a id="delete" href="#" onclick="deleteAmenities(' . $row['id'] . ');">[DELETE]</a>';
		echo '</td>';
		echo '</tr>';
	}
}


//For incCities.php to display all cities in a table
function displayCitiesAndLinks($results)
{
	$odd=1;
	while($row=mysqli_fetch_assoc($results))
	{
//		global $row;
		echo $odd==1 ? '<tr class=managePlacesOddRow>' : '<tr class=managePlacesEvenRow>';
		$odd=~$odd;
		echo '<td style="width:70%">';
		echo $row['name'];
		echo '</td>';
		
		echo '<td>';
		echo '<a href="managecities.php?action=edit&id=' . $row['id'] . '">[EDIT]</a>';
		echo '<a id="delete" href="#" onclick="deleteCities(' . $row['id'] . ');">[DELETE]</a>';
		echo '</td>';
		echo '</tr>';
	}
}
?>