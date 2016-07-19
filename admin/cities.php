<?php 
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	$pageTitle='Manage Cities';
	include "../inc/connect.php";
	include "inc/incCities.php";
	include "inc/template.php";
	include "../inc/globalFunctions.php";
	include "inc/header.php";
?>


<div id=container>
	
	<div class=originalPage>
	
		<h1>Manage Places</h1>
		
		<?php echo "<p style=\"text-align:center; color:green;\">$successMessage</p>";?>
		
		<div align="center">
			<form method="POST" id="stateDropDown" action="#">
				<input type="hidden" name="dropDownSet" value="true">
				
				Select State:
				<select name="stateDropDown" id="city">
					
					<option value="0"> </option>
					
					<?php allStatesInDropDown();?>
				</select>
				
			</form>
		</div>
		
		
		<form method="POST" id="cities" action="managecities.php" name="submitForDelete">
		
			<input type="hidden" name="dropDownSet" value="false">		
			<input type="hidden" name="action" value="delete">
			<input type="hidden" name="id" value=""> 
			
			<table class="managePlacesTable">
			
				<tr class="managePlacesTr">
					<th colspan="2" class="managePlacesTh">List of Cities<a href="managecities.php">[ADD]</a></th>
				</tr>
				
				<?php printCitiesInTable();?>
				
			</table>
		</form>
	</div>


</div>

<script type="text/javascript">

$(function() {
    $('#city').change(function() {
        this.form.submit();
    });
});


function deleteCities(id){
	
	$('form[name="submitForDelete"]').find('input[name="id"]').val(id);
	$('form[name="submitForDelete"]').submit();
	
}
</script>

<?php include "inc/footer.php";?>

	