<?php
	require "header.php";
?>
		

		<main>
			<div class="section-default">
			<section class="section-default">
			<h1>Signup</h1>
			<?php
				if (isset($_GET['error'])) {
					if ($_GET['error']=="emptyfields") {
						echo'<p class="signuperror">Fill in all fields!</p>';
					}
					elseif ($_GET['error']=="invalidmailuid") {
						echo'<p class="signuperror">invalid username and email</p>';
					}
					elseif ($_GET['error']=="invaliduid") {
						echo'<p class="signuperror">invalid username</p>';
					}
					elseif ($_GET['error']=="usertaken") {
						echo'<p class="signuperror">this username is already taken!</p>';
					}
					elseif ($_GET['error']=="invalidmail") {
						echo'<p class="signuperror">invalid email</p>';
					}
					elseif ($_GET['error']=="passwordcheck") {
						echo'<p class="signuperror">your password doesnt match!</p>';
					}
				}
				elseif (isset($_GET['signup']) && $_GET['signup']=="success") {
					  echo'<p class="signsuccess">Signup successfull!</p>';
				}
			?><pre>                 																<form action="includes/signup.inc.php" method="post">
				  <input type="text" name="uid" placeholder="username">  <input type="text" name="mail" placeholder="E-mail">
				  <input type="password" name="pwd" placeholder="password">  <input type="password" name="pwd-repeat" placeholder="repeat password">
				  <input type="text" name="firstname" placeholder="firstname">  <input type="text" name="lastname" placeholder="lastname">
				  <input type="text" name="city" placeholder="city">  <input type="text" name="state" placeholder="state">
				  <input type="text" name="pin" placeholder="pin">  <input type="text" name="phone" placeholder="phone">
				  <input type="text" name="address" placeholder="address">  <input type="text" name="address2" placeholder="address2">   <button type="submit" name="signup-submit">Sign Up</button>
			</form>
		</pre>
			</section>
			</div>
		</main>
<?php 
	require "footer.php";
?>