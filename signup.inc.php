<?php
if (isset($_POST['signup-submit'])) {
	
	require 'dbh.inc.php';

	$username= $_POST['uid'];
	$email= $_POST['mail'];
	$password= $_POST['pwd'];
	$passwordrepeat= $_POST['pwd-repeat'];
	$firstname= $_POST['firstname'];
	$lastname= $_POST['lastname'];
	$city= $_POST['city'];
	$state= $_POST['state'];
	$pin= $_POST['pin'];
	$phone= $_POST['phone'];
	$address= $_POST['address'];
	$address2= $_POST['address2'];

	if(empty($username)||empty($email)||empty($password)||empty($passwordrepeat)||empty($firstname)||empty($lastname)||empty($city)||empty($state)||empty($pin)||empty($phone)||empty($address))
	{
		header("Location:../signup.php?error=emptyfields&uid=".$username."&mail=".$email."&firstname=".$firstname."&lastname".$lastname."&city=".$city."&state=".$state."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username))) {
		header("Location:../signup.php?error=invaliduid&mailuid&firstname=".$firstname."&lastname".$lastname."&city=".$city."&state=".$state."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location:../signup.php?error=invalidmail&uid=".$username."&firstname=".$firstname."&lastname".$lastname."&city=".$city."&state=".$state."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else if (!preg_match("/^[0-9]{6}$/", $pin)){
		header("Location:../signup.php?error=invalidpin&uid=".$username."&mail=".$email."&firstname=".$firstname."&lastname".$lastname."&city=".$city."&state=".$state."&phone=".$phone."&address=".$address);
		exit();
	}
	else if (!preg_match("/^[0-9]{10}$/", $phone)) {
		header("Location:../signup.php?error=invalidphone&uid=".$username."&mail=".$email."&firstname=".$firstname."&lastname".$lastname."&city=".$city."&state=".$state."&pin=".$pin."&address=".$address);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location:../signup.php?error=invaliduid&mail=".$email."&firstname=".$firstname."&lastname".$lastname."&city=".$city."&state=".$state."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z]*$/", $firstname)){
		header("Location:../signup.php?error=invalidfirstname&uid=".$username."uid&mail=".$email."&firstname=".$firstname."&lastname".$lastname."&city=".$city."&state=".$state."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z]*$/", $lastname)){
		header("Location:../signup.php?error=invalidlastname&uid=".$username."uid&mail=".$email."&firstname=".$firstname."&city=".$city."&state=".$state."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z]*$/", $city)){
		header("Location:../signup.php?error=invalidcity&uid=".$username."uid&mail=".$email."&firstname=".$firstname."&lastname".$lastname."&state=".$state."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z]*$/", $state)){
		header("Location:../signup.php?error=invalidstate&uid=".$username."uid&mail=".$email."&firstname=".$firstname."&lastname".$lastname."&city=".$city."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $address)){
		header("Location:../signup.php?error=invalidaddress&uid=".$username."uid&mail=".$email."&firstname=".$firstname."&lastname".$lastname."&city=".$city."&state=".$state."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else if($password!== $passwordrepeat){
		header("Location:../signup.php?error=passwordcheck&uid=".$username."&mail=".$email."&firstname=".$firstname."&lastname".$lastname."&city=".$city."&state=".$state."&pin=".$pin."&phone=".$phone."&address=".$address);
		exit();
	}
	else  {

		$sql="SELECT Idname from users where Idname=?;";
		$stmt=mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../signup.php?error=sqlerror");
			exit();
		}
		else{
		mysqli_stmt_bind_param($stmt, "s", $username);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_store_result($stmt);
		$resultCheck= mysqli_stmt_num_rows($stmt);
		if($resultCheck>0){
			header("Location:../signup.php?error=usertaken&mail=".$email);
			exit();
		}
		else{
			$sql= "insert into users(Idname,UserEmail,UserPassword,UserFirstName,UserLastName,UserCity,UserState,UserPin,UserPhone,UserAddress,UserAddress2) values (?,?,?,?,?,?,?,?,?,?,?);";
			$stmt=mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../signup.php?error=sqlerror");
			exit();
			}
			else{
				$hashedPwd=password_hash($password, PASSWORD_DEFAULT);
				mysqli_stmt_bind_param($stmt, "sssssssssss", $username,$email, $hashedPwd,$firstname,$lastname,$city,$state,$pin,$phone,$address,$address2);
				mysqli_stmt_execute($stmt);
				header("Location:../signup.php?signup=success");
				exit();
				}
			}

		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location:../signup.php");
	exit();
}