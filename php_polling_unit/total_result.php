<?php require_once('constants.php');
	$page_title = "Total Result";

	require_once('menu.php');

	$sql = "SELECT lga_name, lga_id FROM lga";
	$res = mysqli_query($conn, $sql);

	?>

	<div class="content">
	<form action="" method="POST">
		 <label for="lga">Select LGA</label>
			<Select name="select">

			<?php

		while($row = mysqli_fetch_array($res)){
			  //$id = $row['lga_id'];

          echo "<option value= ".$row['lga_id'] .">" . $row['lga_name'] . "</option>";

			}
				?>

					
				
			</Select>
			<input type="submit" name="submit">
		</form>

		



		<?php

		if(isset($_POST['submit'])){
			$select = $_POST['select'];

			$sql2 = "SELECT polling_unit.polling_unit_number, polling_unit.polling_unit_name, polling_unit.polling_unit_description, announced_pu_results.polling_unit_uniqueid,announced_pu_results.party_abbreviation, announced_pu_results.party_score FROM polling_unit INNER JOIN announced_pu_results ON polling_unit.polling_unit_id = announced_pu_results.polling_unit_uniqueid

				WHERE lga_id = '$select'

			";

			$res2 = mysqli_query($conn, $sql2 );

			?>
			<br>
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
				$total_score =0;
		         while($rows = mysqli_fetch_assoc($res2)){
			      $polling_unit_number = $rows['polling_unit_number'];
                  $polling_unit_name = $rows['polling_unit_name'];
                  $polling_unit_description = $rows['polling_unit_description'];
                  $party_abbreviation = $rows['party_abbreviation'];
		          $party_scores = $rows['party_score'];

		          $total_score +=$party_scores;
		          


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
        echo "<p class='result text-center'>Total Result:" . "$total_score" . "</p>";
		
	}else{
		echo "rubbish";
	}
			}
			else{
				
			}
		


		?>

		</table>
		</div>



<?php require_once('footer.php'); ?>