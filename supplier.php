<?php
	require "header.php";
if (isset($_POST['supplier'])){
	require 'includes/dbh.inc.php';
	$city=$_POST['city'];
	if(empty($city)){
	header("Location:inde.php?error=emptyfields");
	exit();	
	}
	else{
		$sql="SELECT SupplierName,OutletName,Address FROM outlets natural join supplier where outlets.City=?;";
		$stmt= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../inde.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$city);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_array($result)){
    echo "<table border='1'>
    <tr>
    <th>SupplierName</th>
    <th>OutletName</th>
    <th>Address</th>
    </tr>";
    echo "<tr>";
      echo "<td>" . $row['SupplierName'] . "</td>";
      echo "<td>" . $row['OutletName'] . "</td>";
      echo "<td>" . $row['Address'] . "</td>";
      echo "</tr>";
    while($row = mysqli_fetch_array($result))
    {
         echo "<tr>";
      echo "<td>" . $row['SupplierName'] . "</td>";
      echo "<td>" . $row['OutletName'] . "</td>";
      echo "<td>" . $row['Address'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

	
}
}
}
}
else{
	header("Location:inde.php");
	exit();
}