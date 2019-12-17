<?php
require "header.php";
if (isset($_POST['add'])) {
	require 'includes/dbh.inc.php';
	$modelid=$_POST['modelid'];
	$quantity=$_POST['quantity'];
	$nameid=$_POST['nameid'];
	$password=$_POST['pass'];
	if(empty($modelid)||empty($password)||empty($quantity)||empty($nameid)){
	header("Location:inde.php?error=emptyfields");
	exit();
	}
	else{
		$sql="SELECT * from users where Idname=?;";
		$stmt= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:inde.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$nameid);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
		if ($row=mysqli_fetch_assoc($result)) {
			$pwdcheck=password_verify($password, $row['UserPassword']);
			if($pwdcheck==FALSE)
			{
			header("Location:inde.php?error=wrongpwd");
			exit();
			}
			else if($pwdcheck==TRUE){
				$sql9="SELECT ProductStock from products where Modelid=?;";
      $stmt9= mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt9,$sql9)){
      header("Location:inde.php?error=sqlerror&cancelation=failed");
      exit();
      }
      else{
        mysqli_stmt_bind_param($stmt9,"s",$modelid);
        mysqli_stmt_execute($stmt9);
        $result0=mysqli_stmt_get_result($stmt9);
        if ($row0=mysqli_fetch_assoc($result0)) {
          if($quantity<$row0['ProductStock']){
				$sql2= "insert into orders(OrderUserName,Modelid,quantity,OrderShipAddress,OrderShipAddress2,OrderCity,OrderState,OrderPin,OrderPhone) values (?,?,?,?,?,?,?,?,?);";
			$stmt2=mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt2,$sql2)) {
			header("Location:../signup.php?error=sqlerror");
			exit();
			}
			else{
				mysqli_stmt_bind_param($stmt2, "sssssssss",$row['Idname'],$modelid,$quantity,$row['UserAddress'],$row['UserAddress2'],$row['UserCity'],$row['UserState'],$row['UserPin'],$row['UserPhone']);
				mysqli_stmt_execute($stmt2);
				echo "Your order has been confirmed";
				echo "<br>";
				echo "<br>";
				echo "ORDER DETAILS :";
				echo "<br>";


				$sql5="UPDATE products SET ProductStock= ProductStock-? where Modelid=? and ProductStock>5;";
		$stmt5= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt5,$sql5)){
			header("Location:../inde.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt5,"is",$quantity,$modelid);
			mysqli_stmt_execute($stmt5);
		}


				$sql4="SELECT ProductName,Modelid,ProductPrice,quantity,OrderShipAddress,OrderTime FROM products natural join orders where orders.OrderUserName=?;";
		$stmt4= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt4,$sql4)){
			header("Location:../inde.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt4,"s",$nameid);
			mysqli_stmt_execute($stmt4);
			$result3=mysqli_stmt_get_result($stmt4);

    if ($row3 = mysqli_fetch_array($result3)){
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
					mysqli_stmt_bind_param($stmt3,"s",$nameid);
				mysqli_stmt_execute($stmt3);
				$result2=mysqli_stmt_get_result($stmt3);
				$row2=mysqli_fetch_assoc($result2);
				echo "<br>";
				echo "<b>Total Order Price = ".$row2['total']."</b>";
				}
				echo "<br>";
				echo "<br>";
    echo'<form action="inde.php" method="post">
		<button type="submit" name="back"> Go Back</button>
		</form>';

				exit();
				
			}
		}
		
		}








	}
	}
	}	
	}
	else{
			header("Location:inde.php?error=nouser");
			exit();	
		}
}
}
}
}
else{
	header("Location:inde.php");
	exit();
}