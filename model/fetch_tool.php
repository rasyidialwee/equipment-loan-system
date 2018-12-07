<?php
require_once("../assets/connection.php"); 

$getTool = mysqli_query($conn,"SELECT tlName, tlQuantity FROM tools ORDER BY RAND() LIMIT 6");
$output = '';
while($fetchTool = mysqli_fetch_assoc($getTool)){
	$output .= '
	<div class="card card-hover" style="padding: 0px; margin: 2px;">
		<div class="box bg-cyan">
			<div class="row">
				<div class="col-md-10">
					<h5 class="text-white text-left">'.$fetchTool["tlName"].'</h5>
				</div>
				<div class="col-md-2">
					<h5 class="text-white text-right">'.$fetchTool["tlQuantity"].'</h5>
				</div>
			</div>
		</div>
	</div>
	';
}

echo $output;
?>