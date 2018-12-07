<?php
require_once("../assets/connection.php"); 

$getLoan = mysqli_query($conn,"SELECT loans.lnID, loans.lnMatricID, loans.lnTool, loans.lnQuantity, tools.tlName FROM loans INNER JOIN tools ON loans.lnTool = tools.tlID WHERE lnStatus = 'Unreturned' ");

$output = '
<table class="table">
      <thead>
        <tr>
          <th scope="col"><b>Matric ID</b></th>
          <th scope="col"><b>Item</b></th>
          <th scope="col"><b>Quantity</b></th>
        </tr>
      </thead>
      <tbody>
';

while($fetchLoan = mysqli_fetch_assoc($getLoan)){
	$lnID = $fetchLoan["lnID"];

    $output .='
    <tr>
        <td><a href="loan-information.php?id='.$lnID.'">'.$fetchLoan["lnMatricID"].'</a></td>
        <td>'.$fetchLoan["tlName"].'</td>
        <td align="center">'.$fetchLoan["lnQuantity"].'</td>
    </tr>
    ';
}

$output .='
      </tbody>
</table>
';

echo $output;
?>