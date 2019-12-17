<?php
if (isset($_POST['login-submit'])) {
	
	require 'dbh.inc.php';

	$mailuid=$_POST['mailuid'];
	$password=$_POST['pwd'];
	if(empty($mailuid)||empty($password)){
	header("Location:../inde.php?error=emptyfields");
	exit();	
	}
	else{
		$sql="SELECT * from users where Idname=?;";
		$stmt= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:../inde.php?error=sqlerror");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt,"s",$mailuid);
			mysqli_stmt_execute($stmt);
			$result=mysqli_stmt_get_result($stmt);
		if ($row=mysqli_fetch_assoc($result)) {
			$pwdcheck=password_verify($password, $row['UserPassword']);
			if($pwdcheck==FALSE)
			{
			header("Location:../inde.php?error=wrongpwd");
			exit();
			}
			else if($pwdcheck==TRUE){
				session_start();
				$_SESSION['userUid']=$row['Idname'];

				header("Location:../inde.php?login=success");
				exit();
			}
		}
		else{
			header("Location:../inde.php?error=nouser");
			exit();	
		}
		}
	}
}
else{
	header("Location:../inde.php");
	exit();
}