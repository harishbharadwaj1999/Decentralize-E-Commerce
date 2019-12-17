<?php
	require "header.php";
?>
<main>
			<div class="section-default">
			<section class="section-default">
				<?php
				if(isset($_SESSION['userUid'])){
					echo'<br>';
					echo'<form action="supplier.php" method="post">
					<input type="text" name="city" placeholder="enter your city">
					<button type="submit" name="supplier">Search</button>
				</form>';
				}
				else{
					echo'<br>';
					echo'<p class="login-status">Log in first!</p>';
				}
				?>
			
			
			</section>
			</div>
		</main>
