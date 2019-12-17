<?php
				require "header.php";
				if(isset($_SESSION['userUid'])){

					echo'
					<main>
			<div class="section-default">
			<section class="section-default">';
				if(isset($_SESSION['userUid'])){
					echo'<br>';
					echo'<form action="cat.php" method="post">
					<input type="text" name="catid" placeholder="enter category no.">
					<button type="submit" name="catsearch">Search</button>
				</form>';
				}
				else{
					echo'<p class="login-status">Login to place order</p>';
					echo'<a href="signup.php">Signup</a>';
				}
			
			echo'
			</section>
			</div>
		</main>
					<div class="container">
            <div class="row">
              <div class="col-1">
              </div>

        <div class="col-10">
          <div>
          <h2>
            Product Category
          </h2>
          <br></br><br></br><br></br>
          </div>

            <div class="row">
            <div class="col-sm">
              <div class="card">
                <img src="card-1.jpg" class="card-img-top" width="400px" height="190px">
                <div class="card-body">
                  <center>
                  <h5 class="card-title">Tech Devices - 1</h5>
                  </center>
                </div>
              </div>
            </div>
            <div class="col-sm">
              <div class="card">
                <img src="iron.jpg" class="card-img-top" width="400px" height="190px">
                <div class="card-body">
                  <center>
                  <h5 class="card-title">Electrical Appliances - 2</h5>
                  </center>
                </div>
              </div>
            </div>
            <div class="col-sm">
              <div class="card">
                <img src="gro.jpg" class="card-img-top" width="400px" height="190px">
                <div class="card-body">
                  <center>
                  <h5 class="card-title">Grocery & Consumable Products - 3</h5>
                  </center>
                </div>
              </div>
            </div>
          </div>
          <p></p>
          <div class="row">
          <div class="col-sm">
            <div class="card">
              <img src="clo.jpg" class="card-img-top" width="400px" height="190px">
              <div class="card-body">
                <center>
                <h5 class="card-title">Clothing and Accesories - 4</h5>
                </center>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card">
              <img src="hea.jpg" class="card-img-top" width="400px" height="190px">
              <div class="card-body">
                <center>
                <h5 class="card-title">Health and Beauty - 5</h5>
                </center>
              </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card">
              <img src="spo.jpeg" class="card-img-top" width="400px" height="190px">
              <div class="card-body">
                <center>
                <h5 class="card-title">Sports and Games - 6</h5>
                </center>
              </div>
            </div>
          </div>
          </div>
          <br></br>

          <div>
          <h2>
            Top Grossing
          </h2>
          <br></br><br></br><br></br>
          </div>

          <ul class="list-unstyled">
            <li class="media">
              <img src="card-1.jpg" class="mr-3" height="80" width="100">
              <div class="media-body">
                <h5 class="mt-0 mb-1">Mac Book Pro</h5>
              </div>
            </li>
            <p></p>
            <li class="media">
              <img src="cam.jpeg" class="mr-3" height="80" width="100">
              <div class="media-body">
                <h5 class="mt-0 mb-1">Cannon 77D</h5>
              </div>
            </li>
          <p></p>
            <li class="media">
              <img src="car.jpg" class="mr-3" height="80" width="100">
              <div class="media-body">
                <h5 class="mt-0 mb-1">Iphone 11pro</h5>
              </div>
            </li>
          </ul>
              </div>
            </div>
           </div>

         <br></br><br></br>

      <div class="container">
        <div class="row">
          <div class="col-1">
            </div>

        <div class="col-10">
          <div class=" bg-dark text-white">
          <h2>
            ABOUT ME
          </h2>
          </div>
          <br></br>
          <div class="row">
          <div class="col-sm">
            <div class="box">
              <img src="download.jpg" alt="" class="box-img">
              <h1>Harish Bharadwaj</h1>
            <h5>Web Devloper - Web Designer</h5>
            <ul>
            <li><a href="#"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br></br>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</footer>
</body>
</html>';

				}
				else{
					echo"<br>";
					echo'<p class="login-status">Log in first!</p>';
				}
?>