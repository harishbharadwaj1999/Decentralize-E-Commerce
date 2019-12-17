<?php  
require "header.php";
if(isset($_SESSION['userUid'])){
	require 'includes/dbh.inc.php';
	$sql4="SELECT ProductName,Modelid,ProductPrice,quantity,OrderShipAddress,OrderTime FROM products natural join orders where orders.OrderUserName=?;";
		$stmt4= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt4,$sql4)){
		header("Location:inde.php?error=sqlerror");
		exit();
		}
		else{
			mysqli_stmt_bind_param($stmt4,"s",$_SESSION['userUid']);
			mysqli_stmt_execute($stmt4);
			$result3=mysqli_stmt_get_result($stmt4);

    if ($row3 = mysqli_fetch_array($result3)){
    echo "ORDER DETAILS :";
    echo "<br>";
    echo "<table border='1'>
    <tr>
    <th>ProductName</th>
    <th>ModelID</th>
    <th>ProductPrice</th>
    <th>Quantity</th>
    <th>OrderShipAddress</th>
    <th>Ordered Date</th>
    </tr>";
    echo "<tr>";
      echo "<td>" . $row3['ProductName'] . "</td>";
      echo "<td>" . $row3['Modelid'] . "</td>";
      echo "<td>" . $row3['ProductPrice'] . "</td>";
      echo "<td>" . $row3['quantity'] . "</td>";
      echo "<td>" . $row3['OrderShipAddress'] . "</td>";
      echo "<td>" . $row3['OrderTime'] . "</td>";
      echo "</tr>";
    while($row3 = mysqli_fetch_array($result3))
    {
      echo "<tr>";
      echo "<td>" . $row3['ProductName'] . "</td>";
      echo "<td>" . $row3['Modelid'] . "</td>";
      echo "<td>" . $row3['ProductPrice'] . "</td>";
      echo "<td>" . $row3['quantity'] . "</td>";
      echo "<td>" . $row3['OrderShipAddress'] . "</td>";
      echo "<td>" . $row3['OrderTime'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";

    $sql3= "SELECT sum(ProductPrice*quantity) as total from orders natural join products where OrderUserName=?;";
        $stmt3= mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt3,$sql3)){
        header("Location:inde.php?error=sqlerror");
        exit();
        }
        else{
          mysqli_stmt_bind_param($stmt3,"s",$_SESSION['userUid']);
        mysqli_stmt_execute($stmt3);
        $result2=mysqli_stmt_get_result($stmt3);
        $row2=mysqli_fetch_assoc($result2);
        echo "<br>";
        echo "<b>Total Order Price = ".$row2['total']."</b>";
        }
        echo'<br><br><b>CANCEL ORDER:</b><br><br>
        <form action="cancel.php" method="post">
        <input type="text" name="model" placeholder="enter product name">
        <input type="text" name="quantity" placeholder="enter specified quantity">
        <input type="datetime" name="date" placeholder="enter ordered time">
    <button type="submit" name="cancel">Confirm Cancel</button>
    </form>';
}
else
{
  echo "No orders placed";
  echo "<br>";
  echo "<br>";
  echo'<form action="inde.php" method="post">
  <button type="submit" name="back"> Go Back</button>
  </form>';
}
}
}
else{
          echo"<br>";
          echo'<p class="login-status">Log in first!</p>';
        }
?>