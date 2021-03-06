<?php
	error_reporting(E_ALL);
	ini_set('display_errors','On');
	$pageTitle='Manage Amenities';
	include "../inc/globalFunctions.php";
	include "../inc/connect.php";
	include "inc/header.php";
?>


<div id=container>
	
	<div class=originalPage>
	
		<h1>Manage Amenities</h1>
		
		<?php $successMessage=sucessMsg('City');?>
			<p style="text-align:center; color:green;"><?php echo $successMessage;?></p>
				
		
		<form method="POST" id="cities" action="manageamenities.php" name="submitForDelete">
		
			<input type="hidden" name="dropDownSet" value="false">		
			<input type="hidden" name="action" value="delete">
			<input type="hidden" name="id" value=""> 
			<table class="managePlacesTable">
			
				<tr class="managePlacesTr">
					<th colspan="2" class="managePlacesTh">List of Amenities<a href="manageamenities.php">[ADD]</a></th>
				</tr>
				
				<?php
					$class="evenRow";
					$amenitiesArray = getAllAmenities();

					foreach($amenitiesArray as $value)
					{
						$class=oddEvenRows($class);	?>				
							
							<tr class="<?php echo "$class";?>">
								<td style="width:70%"><?php echo $value['name'];?></td>
								<td>
									<a href="manageamenities.php?action=edit&id=<?php echo $value['id'];?>">[EDIT]</a>
									<a id="delete" href="#" onclick="deleteAmenities('<?php echo $value['id']; ?>')">[DELETE]</a>
								</td>
							</tr>
											
				<?php }?> 
			
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
