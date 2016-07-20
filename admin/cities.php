<?php 
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	$pageTitle='Manage Cities';
	include "../inc/globalFunctions.php";
	include "../inc/connect.php";
	include "inc/incCities.php";
	include "inc/template.php";
	include "inc/header.php";
?>


<div id=container>
	
	<div class=originalPage>
	
		<h1>Manage Places</h1>
		
		<?php $successMessage=sucessMsg('City');?>
			<p style="text-align:center; color:green;"><?php echo $successMessage;?></p>
		
		<div align="center">
			<form method="POST" id="stateDropDown" action="#">
				<input type="hidden" name="dropDownSet" value="true">
				
				Select State:
				<select name="stateDropDown" id="state">
					
					<option value="0"> </option>
					
					<?php allStatesInDropDown($stateId);?>
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
				
				<?php
					$class="evenRow";
					$cityArray = getAllCities($stateId);

					foreach($cityArray as $value)
					{
						$class=oddEvenRows($class);	?>				
							
							<tr class="<?php echo "$class";?>">
								<td style="width:70%"><?php echo $value['name'];?></td>
								<td>
									<a href="managecities.php?action=edit&id=<?php echo $value['id'];?>">[EDIT]</a>
									<a id="delete" href="#" onclick="deleteCities('<?php echo $value['id']; ?>')">[DELETE]</a>
								</td>
							</tr>
											
				<?php }?>
				
			</table>
		</form>
	</div>


</div>

<script type="text/javascript">

$(function() {
    $('#state').change(function() {
        this.form.submit();
    });
});


function deleteCities(id){
	
	$('form[name="submitForDelete"]').find('input[name="id"]').val(id);
	$('form[name="submitForDelete"]').submit();
	
}
</script>

<?php include "inc/footer.php";?>

	