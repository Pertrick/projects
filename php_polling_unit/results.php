<?php require_once('constants.php');
	$page_title = "Result";

	require_once('menu.php');

	$sql = "SELECT polling_unit.polling_unit_number, polling_unit.polling_unit_name, polling_unit.polling_unit_description, announced_pu_results.polling_unit_uniqueid,announced_pu_results.party_abbreviation, announced_pu_results.party_score FROM polling_unit INNER JOIN announced_pu_results ON polling_unit.polling_unit_id = announced_pu_results.polling_unit_uniqueid   WHERE uniqueid = 30";

	$res = mysqli_query($conn, $sql);
?>

	<div class="content">
		<table>
		  <tr>
			<th>Polling Unit Number</th>
            <th>Polling Unit Name</th>
            <th>Polling Unit Description</th>
            <th>Party Abreviation</th>
            <th>Party Scores</th>
      
          </tr>

		<?php
			if($res){
		         while($rows = mysqli_fetch_assoc($res)){
			      $polling_unit_number = $rows['polling_unit_number'];
                  $polling_unit_name = $rows['polling_unit_name'];
                  $polling_unit_description = $rows['polling_unit_description'];
                  $party_abbreviation = $rows['party_abbreviation'];
		          $party_scores = $rows['party_score'];
		          


			      ?>

			   <tr>
				<td><?php echo $polling_unit_number;?></td>
				<td><?php echo $polling_unit_name;?></td>
				<td><?php echo $polling_unit_description;?></td>
				<td><?php echo $party_abbreviation;?></td>
				<td><?php echo $party_scores;?></td>
				

			</tr>

			<?php
		}
	}
	else{
		echo "not working";
	}
		?>	
		</table>
		
	</div>






<?php require_once('footer.php'); ?>