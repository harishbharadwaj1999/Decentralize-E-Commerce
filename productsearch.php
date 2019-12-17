<?php
	require "header.php";
if (isset($_POST['productsearch'])){
	require 'includes/dbh.inc.php';
	$product=$_POST['product'];
	$city=$_POST['city'];
	if(empty($product)||empty($city)){
	header("Location:inde.php?error=emptyfields");
	exit();	
	}
	else{
		$sql="SELECT ProductName,Modelid,ProductPrice,ProductWeight,ProductCartDesc,ProductShortDesc,ProductStock FROM products natural join outlets where products.ProductName=? AND outlets.city=?;";
		$stmt= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../inde.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"ss",$product,$city);
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
    echo'<form action="inde.php" method="post">
		<button type="submit" name="back"> Go Back</button>
		</form>';
    echo '<p>   <form action="order.php" method="post">
    <br>
    PLACE ORDER:
    <br>
    <br>
    <input type="text" name="modelid" placeholder="model id">
  <input type="text" name="quantity" placeholder="quantity (max 5)"  pattern="[1-5]">
  <br>
  <br>
  CONFIRM ORDER:
  <br>
  <br>
  <input type="text" name="nameid" placeholder=" user name">
  <input type="password" name="pass" placeholder="password">
  <button type="submit" name="add">AddToCart</button>
  </form></p>';
	}
	else{
		echo"Product out of stock!";
		echo"<br>";
		echo"<br>";
    	echo'<form action="inde.php" method="post">
		<button type="submit" name="back"> Go Back</button>
		</form>';
	}
	}
	else{
		echo"<br>";
		echo"Sorry,<br>";
		echo"<p>The product : " . $product . " is currently not available in " . $city . "</p>";
		echo'<form action="inde.php" method="post">
		<button type="submit" name="back"> Go Back</button>
		</form>';
	}
}	
}
}
else{
	header("Location:inde.php");
	exit();
}
