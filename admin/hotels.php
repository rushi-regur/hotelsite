<?php 
	$pageTitle='Manage Hotels';
	include "inc/header.php";
	include "../inc/globalFunctions.php";
	include "../inc/connect.php";
	include "inc/incCities.php";
?>

<div id=container>
	
	<div class=originalPage>
	
	<h1>Manage Hotels</h1>
	
	<?php $successMessage=sucessMsg('Hotel');?>
			<p style="text-align:center; color:green;"><?php echo $successMessage;?></p>
	
		<form method="POST" id="hotels" action="managehotels.php" name="submitForDelete">
			
			<input type="hidden" name="dropDownSet" value="false">		
			<input type="hidden" name="action" value="delete">
			<input type="hidden" name="id" value=""> 
	
			<table class="managePlacesTable">
			
				<tr class="managePlacesTr">
					<th colspan="2" class="managePlacesTh">List of Hotels<a href="managehotels.php">[ADD]</a></th>
				</tr>
				
				
				<?php
					$class="evenRow";
					$hotelArray = getAllHotels();

					foreach($hotelArray as $value)
					{
						$class=oddEvenRows($class);	?>				
							
							<tr class="<?php echo "$class";?>">
								<td style="width:70%"><?php echo $value['name'];?></td>
								<td>
									<a href="managehotels.php?action=edit&id=<?php echo $value['id'];?>">[EDIT]</a>
									<a id="delete" href="#" onclick="deletehotels('<?php echo $value['id']; ?>')">[DELETE]</a>
								</td>
							</tr>
											
				<?php }?> 
			
			</table>
		</form>
	
	</div>

</div>

<?php include "inc/footer.php";?>