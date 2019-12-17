<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"type="text/css" href="./f.css" />
    <script src="https://kit.fontawesome.com/e6035a1e6f.js"></script>
</head>
<body>
    <body style="background-color:#B4CBCC;">
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="form-inline my-2 my-lg-0">
                  <a class="nav-link enabled" href="#" tabindex="-1" aria-disabled="true">Pprtfolio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link enabled" href="vieworder.php" tabindex="-1" aria-disabled="true">My Order</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link enabled" href="contact.php" tabindex="-1" aria-disabled="true">Contact</a>
                </li>
            </div>
        </nav>
			<div>
				<?php
				 if(isset($_SESSION['userUid'])){
						echo'<form action="includes/logout.inc.php" method="post">
					<button type="submit" name="logout-submit">Logout</button>
				</form>';
				echo"<br>";
				}
				else{
					echo'<form action="includes/login.inc.php" method="post">
					<input type="text" name="mailuid" placeholder="username">
					<input type="password" name="pwd" placeholder="password">
					<button type="submit" name="login-submit">Login</button>
				</form>
				<a href="signup.php">Signup</a>';
				}
				?>
				
		
			
			</div>
		</nav> 
	</header>