<?php  
require "header.php";
if(isset($_POST['cancel'])){
	require 'includes/dbh.inc.php';
	$time=$_POST['date'];
	$quantity=$_POST['quantity'];
	$model=$_POST['model'];
	$sql6="DELETE FROM orders WHERE OrderTime=?;";
		$stmt6= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt6,$sql6)){
		header("Location:inde.php?error=sqlerror&cancelation=failed");
		exit();
		}
		else{
			
			



			$sql8="SELECT quantity from orders where OrderTime=?;";
			$stmt8= mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt8,$sql8)){
			header("Location:inde.php?error=sqlerror&cancelation=failed");
			exit();
			}
			else{
				mysqli_stmt_bind_param($stmt8,"s",$time);
				mysqli_stmt_execute($stmt8);
				$result=mysqli_stmt_get_result($stmt8);
				if ($row=mysqli_fetch_assoc($result)) {
					if($quantity==$row['quantity']){
						mysqli_stmt_bind_param($stmt6,"s",$time);
						mysqli_stmt_execute($stmt6);

						$sql7="UPDATE products SET ProductStock= ProductStock+? where Modelid=?;";
						$stmt7= mysqli_stmt_init($conn);
						if(!mysqli_stmt_prepare($stmt7,$sql7)){
						header("Location:inde.php?error=sqlerror&cancelation=failed");
						exit();
						}
						else{
						mysqli_stmt_bind_param($stmt7,"is",$quantity,$model);
						mysqli_stmt_execute($stmt7);
						header("Location:inde.php?cancelation=success");
						}


					}
					else{
					header("Location:inde.php?error=sqlerror&quantity=notmatch");
				}
				}

			}


			

}
}
else{
	header("Location:inde.php");
	exit();
}