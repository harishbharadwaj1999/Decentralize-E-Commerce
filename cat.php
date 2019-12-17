<?php
	require "header.php";
				if(isset($_POST['catsearch'])){
					require 'includes/dbh.inc.php';
					$catid=$_POST['catid'];
					if(empty($catid)){
						header("Location:inde.php?error=emptyfields");
							exit();	
						}
					else{
						$sql="SELECT ProductName,Modelid,ProductPrice,ProductWeight,ProductCartDesc,ProductShortDesc,ProductStock FROM products where  ProductCategoryID=?;";
		$stmt= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../inde.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$catid);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_array($result)){
    	if($row['ProductStock']>5){
    echo "<table border='1'>
    <tr>
    <th>ProductName</th>
    <th>ModelID</th>
    <th>ProductPrice</th>
    <th>ProductWeight</th>
    <th>ProductType</th>
    <th>ProductDescription</th>
    <th>ProductStock</th>
    </tr>";
    echo "<tr>";
      echo "<td>" . $row['ProductName'] . "</td>";
      echo "<td>" . $row['Modelid'] . "</td>";
      echo "<td>" . $row['ProductPrice'] . "</td>";
      echo "<td>" . $row['ProductWeight'] . "</td>";
      echo "<td>" . $row['ProductCartDesc'] . "</td>";
      echo "<td>" . $row['ProductShortDesc'] . "</td>";
      echo "<td>" . $row['ProductStock'] . "</td>";

      echo "</tr>";
    while($row = mysqli_fetch_array($result))
    {
      if($row['ProductStock']>5){
      echo "<tr>";
      echo "<td>" . $row['ProductName'] . "</td>";
      echo "<td>" . $row['Modelid'] . "</td>";
      echo "<td>" . $row['ProductPrice'] . "</td>";
      echo "<td>" . $row['ProductWeight'] . "</td>";
      echo "<td>" . $row['ProductCartDesc'] . "</td>";
      echo "<td>" . $row['ProductShortDesc'] . "</td>";
      echo "<td>" . $row['ProductStock'] . "</td>";

      echo "</tr>";}
    }

    echo "</table>";
    echo "<br>";
    echo'<form action="prodcat.php" method="post">
		<button type="submit" name="back"> Go Back</button>
		</form>';
}
    else{
		echo"<br>None availabe currently";
    	echo'<form action="prodcat.php" method="post">
		<button type="submit" name="back"> Go Back</button>
		</form>';
	}
		}}

					}
				}
				else{
						header("Location:inde.php");
						exit();
				}
