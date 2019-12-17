<?php
	require "header.php";
?>
		

		<main>
			<div class="section-default">
			<section class="section-default">
				<?php
				if(isset($_SESSION['userUid'])){
					echo'<b>~~~~~~~~~SEARCH PRODUCT~~~~~~~~~~~</b>';
					echo'<form action="productsearch.php" method="post">
					<input type="text" name="product" placeholder="enter product">
					<input type="text" name="city" placeholder="enter your city">
					<button type="submit" name="productsearch">Go</button>
				</form>';
				}
				else{
					echo'<p class="login-status">Login to place order</p>';
					echo'<a href="signup.php">Signup</a>';
				}
				?>
			
			
			</section>
			</div>
		</main>
<?php 
	require "footer.php";
?>