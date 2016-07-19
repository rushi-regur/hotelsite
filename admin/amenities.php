<?php
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	$pageTitle='Manage Amenities';
	include "../inc/connect.php";
	include "inc/incamenities.php";
	include "inc/template.php";
	include "../inc/globalFunctions.php";
	include "inc/header.php";
?>


<div id=container>
	
	<div class=originalPage>
	
		<h1>Manage Amenities</h1>
		<?php echo "<p style=\"text-align:center; color:green;\">$successMessage</p>";?>
		
		
		<form method="POST" id="cities" action="manageamenities.php" name="submitForDelete">
		
			<input type="hidden" name="dropDownSet" value="false">		
			<input type="hidden" name="action" value="delete">
			<input type="hidden" name="id" value=""> 
			<table class="managePlacesTable">
			
				<tr class="managePlacesTr">
					<th colspan="2" class="managePlacesTh">List of Amenities<a href="manageamenities.php">[ADD]</a></th>
				</tr>
				
				<?php printAmenitiesInTable();?>
			
			</table>
		</form>
		
	</div>


</div>

<script>

function deleteAmenities(id){
	
	$('form[name="submitForDelete"]').find('input[name="id"]').val(id);
	$('form[name="submitForDelete"]').submit();
	
}
</script>

<?php include "inc/footer.php";?>
