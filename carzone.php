<?php
function navbar()
{
	if (isset($_SESSION["user"])) {
		$but = <<<EOT
			<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			{$_SESSION["user"]}
			</a>
			<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				<li><a class="dropdown-item" href="./account.php">Account</a></li>
				<li><a class="dropdown-item" href="./myCars.php">My Cars</a></li>
				<li><a class="dropdown-item" href="./address.php">My Addresses</a></li>
				<li><a class="dropdown-item" href="./services.php">Orders</a></li>
				<li><a class="dropdown-item" href="./cards.php">Payment Methods</a></li>
				<li><hr class="dropdown-divider"></li>
				<li><a class="dropdown-item" href="./logout.php">Logout</a></li>
			</ul>
			</li>
		EOT;
	} else {
		$but = <<<EOT
		<a class="btn
			btn-outline-primary mx-1"
			href="./login.php">
			Login
			</a>
		EOT;
	}
	$header = <<<EOT
	<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="./index.php">
				Carzone
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
				</span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="./index.php">
							Home
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="./brands.php">
							Brands
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="./cars.php">
							Cars
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="./parts.php">
							Services
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="./cart.php">
							Cart	
						</a>
					</li>
		</ul>
				{$but}
				<form class="d-flex" method="post" action="./cars.php">
					<input class="
													form-control
													me-2" type="search" placeholder="Search" aria-label="Search" name="name">
					<button class="btn
											btn-outline-success" type="submit">
						Search
					</button>
				</form>
			</div>
		</div>
	</nav>
	</header>
	EOT;
	echo $header;
}
function correctTime($str)
{
	$tmp = explode("/", $str, 2);
	$tmp = $tmp[1] . "-" . $tmp[0];
	return strtotime($tmp);
}
function displayDeals()
{
	echo <<< EOT
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

        <div class="container">
          <div class="carousel-caption text-start">
            <h1>Cars</h1>
            <p>Pick from our amazing selection of cars</p>
            <p><a class="btn btn-lg btn-primary" href="./cars.php">View More</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

        <div class="container">
          <div class="carousel-caption">
            <h1>Services</h1>
            <p>Premium service at a fair price</p>
            <p><a class="btn btn-lg btn-primary" href="./parts.php">Learn more</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#777"/></svg>

        <div class="container">
          <div class="carousel-caption text-end">
            <h1>Partner Brands</h1>
            <p>Checkout our partners</p>
            <p><a class="btn btn-lg btn-primary" href="./brands.php">Browse brands</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
					<img  src="./res/images/logos/Audi.svg"
							class="card-img-top bg-light"
							width="286"
							height="286"
							class="bd-placeholder-img rounded-circle">

        <h2>Audi</h2>
        <p>Checkout the new 2021 Audi Lineup</p>
        <p>
					<form action = "./cars.php" method="post">
					<button class="btn btn-secondary"
							type="submit"
							name="make"
							value="Audi"
					>
							Show all cars of Audi
					</button>
					</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
					<img  src="./res/images/logos/Honda.svg"
							class="card-img-top bg-light"
							width="286"
							height="286"
							class="bd-placeholder-img rounded-circle">

        <h2>Honda</h2>
        <p>Introducing the new Civic</p>
        <p>
					<form action = "./cars.php" method="post">
					<button class="btn btn-secondary"
							type="submit"
							name="make"
							value="Honda"
					>
							Show all cars of Honda
					</button>
					</p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
					<img  src="./res/images/logos/Hyundai.svg"
							class="card-img-top bg-light"
							width="286"
							height="286"
							class="bd-placeholder-img rounded-circle">

        <h2>Hyundai</h2>
        <p>Main Partner</p>
        <p>
					<form action = "./cars.php" method="post">
					<button class="btn btn-secondary"
							type="submit"
							name="make"
							value="Hyundai"
					>
							Show all cars of Hyundai
					</button>
					</p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Worried about fake parts ?<span class="text-muted"> Worry no more</span></h2>
        <p class="lead">Here at Carzone everything is bought directly from the manufacturer.</p>
      </div>
      <div class="col-md-5">
					<img  src="./res/images/parts/Spark Plug.svg"
							class="card-img-top bg-light"
							width="500"
							height="500">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Get 10% discount on your first order</p>
      </div>
      <div class="col-md-5 order-md-1">
					<img  src="./res/images/parts/General Checkup.svg"
							class="card-img-top bg-light"
							width="500"
							height="500">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Loyalty</span></h2>
        <p class="lead">Become a member to get 15% off on every order with exclusive benifits</p>
      </div>
      <div class="col-md-5">
					<img  src="./res/images/logos/Loyalty.svg"
							class="card-img-top bg-light"
							width="500"
							height="500">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2021 Carzone, Inc. &middot;</p>
  </footer>
</main>
EOT;
}

function displayCarCards($rows)
{
	echo "<div class =\"container mt-5\"><div class = \"row row-col-1 row-col-md-3 g-4\">";
	foreach ($rows as $row) {
		$id = $row["car_id"];
		$name = $row["make"] . " " . $row["model"];
		$model = $row["model"];
		if (isset($_SESSION["cars"])) {
			if (in_array($id, $_SESSION["cars"])) {
				$secondButton = <<< EOT
				<div class="col"> <div class="row"> <div
				class="col"> <form action = "./myCars.php" method="post"> <input
				type="hidden" name="id" value="{$id}"></input> <input
				type="submit" name="action" class="btn btn-success" disabled
				value="✓"> </input > </form> </div> <div class="col"> <form
				action = "./myCars.php" method="post"> <input type="hidden"
				name="id" value="{$id}"></input> <input type="submit"
				name="action" class="btn btn-outline-danger" value="x"> </input>
				</form> </div> </div> </div>
				EOT;
			} else {
				$secondButton = <<< EOT
					<div class="col"> <form action = "./myCars.php"
					method="post"> <input type="hidden" name="id"
					value="{$id}"></input> <input class="btn
					btn-outline-success" type="submit" name="action" value="+" >
					</input> </form> </div>
				EOT;
			}
		} else {
			$secondButton = <<< EOT
					<div class="col">
					<a href="./login.php" class="btn btn-primary">Login</a>
					</div>
				EOT;
		}
		echo <<< EOT
			<div class = "col">
					<div class="card h-100" style="width: 18rem;">
						<img  src="./res/images/thumbnails/{$model}.gif" loading="lazy"
								class="card-img-top bg-light"
								style="max-width:286px;height:286px;
								width:auto;display:block;"
								>
						<div class="card-body">
							<h5 class="card-title">{$name}</h5>
							<div class="row mb-3">
								<div class="col">
									<form action = "./parts.php" method="post">
										<button class="btn btn-outline-primary"
												type="submit"
												name="id"
												value="{$id}"
										>
										Parts
										</button>
									</form>
								</div>
							{$secondButton}
							</div>
						</div>
					</div>
			</div>
	EOT;
	}
	echo "</div></div>";
}

function displayCarHeader($id)
{
	$pdo = new PDO("sqlite:./db/main.db");
	$qs = "SELECT make,model FROM car WHERE car_id = ?;";
	$results = $pdo->prepare($qs);
	$results->execute(array($id));
	$rows = $results->fetchAll(PDO::FETCH_ASSOC);
	$name = $rows[0]["make"] . " " . $rows[0]["model"];
	$model = $rows[0]["model"];
	echo "<div class=\"px-4 pt-5 mx-5 text-center border-bottom\">
		<h1 class=\"display-4 fw-bold\">
		{$name}
		</h1>
		<div class=\"overflow-hidden\">
				<div class=\"container px-5\">
						<img src=\"./res/images/cars/{$model}.jpg\"
								class=\"img-fluid
								mx-auto
								my-auto
								rounded-3
								mb-4\"
								style=\"max-width:50%;
								max-height:40%;
								display:block;
								height:auto;
								width:auto;\"
						alt=\"{$name}\">
		</div></div></div></div>";
}

function getCarsByBrand($brand)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$qs = "SELECT * FROM car WHERE make = ?;";
	$results = $pdo->prepare($qs);
	$results->execute(array($brand));
	$rows = $results->fetchAll(PDO::FETCH_ASSOC);
	displayCarCards($rows);
}

function getAllCars()
{
	$pdo = new PDO('sqlite:./db/main.db');

	$qs = "SELECT * FROM car WHERE car_id > 0 ;";
	$statement = $pdo->prepare($qs);
	$statement->execute(array());
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
	displayCarCards($rows);
}
function getCarByUser()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$car_ids = $_SESSION["cars"];
	$results = array();
	foreach ($car_ids as $id) {
		$statement = $pdo->prepare("SELECT * FROM car where car_id = :id;");
		$statement->execute(array($id));
		array_push($results, $statement->fetch(PDO::FETCH_ASSOC));
	}
	if (empty($results)) {
		echo '<div class="container"><div class="row alert alert-danger" role="alert">
		No Cars found
	  </div><a href="./cars.php" class="btn btn-primary ">Add cars</a>
	  </div>';
	} else {
		displayCarCards($results);
	}
}

function addCarToUser($id)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("INSERT OR IGNORE INTO cars_owned VALUES(:username,:id);");
	$statement->execute(array(
		"username" => $_SESSION["user"],
		"id" => $id
	));
	unset($_SESSION["cars"]);
	initStorage();
}

function deleteCarFromUser($id)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("DELETE FROM cars_owned WHERE username IS :username AND car_id IS :id;");
	$statement->execute(array(
		"username" => $_SESSION["user"],
		"id" => $id
	));
	unset($_SESSION["cars"]);
	initStorage();
}

function getCarsbyName($car_name)
{
	$pdo = new PDO('sqlite:./db/main.db');

	$car_name = "%" . $car_name . "%";
	$qs = "SELECT * FROM car WHERE make LIKE ? OR model like ?;";

	$statement = $pdo->prepare($qs);
	$statement->execute(array($car_name, $car_name));
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
	displayCarCards($rows);
}

function displayBrand($rows)
{
	echo "<div class =\"container mt-5\"><div class = \"row row-col-1 row-col-md-3 g-4\">";
	foreach ($rows as $row) {
		$make = $row["make"];
		echo "<div class = \"col\">
					<div class=\"card h-100\" style=\"width: 18rem;\">
					<img  src=\"./res/images/logos/{$make}.svg\"
							class=\"card-img-top bg-light\"
							width=\"286\"
							height=\"286\">
					<div class=\"card-body\">
					<h5 class=\"card-title\">{$make}</h5>
					<form action = \"./cars.php\" method=\"post\">
					<button class=\"btn btn-outline-primary\"
							type=\"submit\"
							name=\"make\"
							value=\"{$make}\"
					>
							Show all cars of {$make}
					</button>
					</form></div></div></div>";
	}
	echo "</div></div>";
}

function getBrands()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$qs = "SELECT DISTINCT make FROM car where car_id != 0;";
	$statement = $pdo->query($qs);
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
	displayBrand($rows);
}

function displayParts($rows)
{
	echo "<div class =\"container mt-5\"><div class = \"row row-col-1 row-col-md-3 g-4\">";
	foreach ($rows as $row) {

		$name = $row["name"];
		$price = $row["price"];
		$id = $row["part_id"];
		$car_id = $row["car_id"];
		if (isset($_SESSION["user"])) {
			$button = <<< EOT
					<input class="btn btn-outline-primary"
							type="submit"
							name="action"
							value="Add to Cart"
					>
					</input>
		EOT;
		} else {
			$button = <<< EOT
					<div class="col">
					<a href="./login.php" class="btn btn-primary">Login to add to cart</a>
					</div>
				EOT;
		}
		if (isset($_SESSION["cart"][$id])) {
			$quantity = $_SESSION["cart"][$id]["quantity"];
			$button = <<<EOT
			<div class="row">
				<div class="col">
					x{$quantity}
				</div>
				<div class="col">
					<input class="btn btn-outline-success" type="submit" name="action" value="+"></button>
				</div>
				<div class="col">
					<input class="btn btn-outline-danger" type="submit" name="action" value="-"></button>
				</div>
			</div>
			EOT;
		}


		if (!file_exists("./res/images/parts/" . $name . ".svg")) {
			$pic = explode(" ", $name, 2);
			$pic = end($pic);
		} else {
			$pic = $name;
		}
		echo <<<EOT
			<div class = "col">
					<div class="card h-100" style="width: 18rem;">
					<img  src="./res/images/parts/{$pic}.svg"
							class="card-img-top bg-light"
							width="286"
							height="286">
					<div class="card-body">
					<h5 class="card-title">{$name}</h5>
					<p class="card-text text-success">\${$price}</p>
					<form action = "./cart.php" method="post">
						<input type="hidden" name="part_id" value="{$id}">
						<input type="hidden" name="quantity" value="1">
						<input type="hidden" name="price" value="{$price}">
						<input type="hidden" name="name" value="{$name}">
						<input type="hidden" name="back" value="./parts.php?id={$car_id}">
						{$button}
					</form></div></div></div>
			EOT;
	}
	echo "</div>";
}

function getParts($id)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("select part.* from car inner join part on car.car_id = part.car_id where car.car_id is ? order by car.car_id;");
	$statement->execute(array($id));
	$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
	displayParts($rows);
}
function getPartName($id)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT name FROM part WHERE part_id=:part_id;");
	$statement->execute(array($id));
	$results = $statement->fetch(PDO::FETCH_ASSOC);
	return $results["name"];
}

function getPartPrice($id)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT price FROM part WHERE part_id=:part_id;");
	$statement->execute(array($id));
	$results = $statement->fetch(PDO::FETCH_ASSOC);
	return $results["price"];
}

function getPartArray($id)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT part_id,quantity FROM services_done WHERE service_id=:service_id;");
	$statement->execute(array($id));
	$tmp = $statement->fetchAll(PDO::FETCH_ASSOC);
	$results = array();
	foreach ($tmp as $i) {
		array_push($results, array(
			"name" => getPartName($i["part_id"]),
			"quantity" => $i["quantity"],
			"price" => getPartPrice($i["part_id"])
		));
	}
	return $results;
}
function loginForm()
{
	$form = <<<'EOT'
		<div class="container mt-5">
			<form  method="post">
				<h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

				<div class="mb-3">
				<label for="username" class="form-label">Username</label>
				<input required type="text" class="form-control" id="username" name="username">
				</div>

				<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input required type="password" class="form-control" id="password" name="password">
				</div>
				<div class="mb-3">
				<input class="btn btn-primary" type="submit" value="Sign in"></input>
				<div>
				<a href="./register.php" class="link-primary text-decoration-none">Don't have an account? Register here</a>
			</form>
		</div>
	EOT;
	echo $form;
}
function validCredentials($row)
{
	$username = $row["username"];
	$password = $row["password"];

	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT hash FROM customer WHERE username=:username ;");
	$statement->execute(array("username" => $username));
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);

	if (empty($results)) {
		return false;
	} else {
		$hash = $results[0]["hash"];
		if (password_verify($password, $hash)) {
			$_SESSION['user'] = $username;
			initStorage();
			return true;
		}
	}
}
function loginFailed()
{
	$val = <<< EOT
	<div class="container texr-center mt-5">
		<div class="card text-center">
		<h5 class="card-header">Login Failed</h5>
		<div class="card-body">
		<h5 class="card-title">Username or password wrong</h5>
		<p class="card-text">Please enter the correct credentials</p>
		<a href="./login.php" class="btn btn-primary">Login Again</a>
		</div>
	</div>
	</div>
	EOT;
	echo $val;
}
function initStorage()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT * FROM car where car_id in (SELECT car_id FROM cars_owned WHERE username=:username);");
	$statement->execute(array($_SESSION["user"]));
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	$_SESSION["cars"] = null;
	$tmp = array();
	foreach ($results as $row) {
		$id = $row["car_id"];
		array_push($tmp, $id);
	}
	$_SESSION["cars"] = $tmp;
	$_SESSION["cart"] = array();
}

function registerForm()
{
	$form = <<< 'EOT'
	<div class="container mt-5">
		<form method="post" class="needs-validation" novalidate>
			<div class="row">
				<label for="username" class="form-label">Username</label>
				<div class="input-group">
					<span class="input-group-text" id="inputGroupPrepend">@</span>
					<input type="text" name="username" class=" form-control" id="username" aria-describedby="inputGroupPrepend" required>
					<div class="invalid-feedback">
						Username should not be empty
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label class="form-label" for="fname">Firstname</label>
					<input required name="fname" type="text" class=" form-control" id="fname">
					<div class="invalid-feedback">
						Firstname should not be empty
					</div>
				</div>
				<div class="col">
					<label class="form-label" for="mname">Middlename</label>
					<input name="mname" type="text" class=" form-control" id="mname">
				</div>
				<div class="col">
					<label class="form-label" for="lname">Lastname</label>
					<input name="lname" required type="text" class=" form-control" id="lname">
					<div class="invalid-feedback">
						Middlename should not be empty
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label class="form-label" for="password">Password</label>
					<input required name="password" type="password" class=" form-control" id="password">
					<div class="invalid-feedback">
						Password should not be empty
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label class="form-label" for="email">Email</label>
					<input name="email" required type="email" class=" form-control" id="email">
					<div class="invalid-feedback">
						Enter a valid email-id
					</div>
				</div>
				<div class="col">
					<label class="form-label" for="phone">Phone</label>
					<input name="phone" required type="tel" class=" form-control" id="phone" pattern="[0-9]{10}">
					<div class="invalid-feedback">
						Enter a valid phone number
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col">
					<label class="form-label" for="door">Door Number</label>
					<input name="door" required type="text" class=" form-control" id="door_no" required>
					<div class="invalid-feedback">
						Enter a valid Door Number
					</div>
				</div>
				<div class="col">
					<label class="form-label" for="street">Street</label>
					<input name="street" required type="text" class=" form-control" id="street" required>
					<div class="invalid-feedback">
						Enter a valid street
					</div>
				</div>
				<div class="col">
					<label class="form-label" for="city">City</label>
					<input name="city" required type="text" class=" form-control" id="city" required>
					<div class="invalid-feedback">
						Enter a valid city
					</div>
				</div>
				<div class="col">
					<label class="form-label" for="pin">PIN</label>
					<input name="pin" pattern="[0-9]{6}" required type="text" class=" form-control" id="PIN" required>
					<div class="invalid-feedback">
						Enter a valid PIN. Format: 641103
					</div>
				</div>
            </div>
			<div class="row">
				<div class="col">
					<input class="btn btn-primary mt-3" type="submit" value="Register"></input>
				</div>
			</div>
		</form>
	</div>
EOT;
	echo $form;
}

function addUser($row)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$row["password"] = password_hash($row["password"], PASSWORD_DEFAULT);
	$statement = $pdo->prepare("INSERT INTO customer VALUES(
		:username,
		:fname,
		:mname,
		:lname,
		:password,
		:email,
		:phone
	);");
	$statement->execute(array(
		'username' => $row["username"],
		'fname' => $row["fname"],
		'mname' => $row["mname"],
		'lname' => $row["lname"],
		'password' => $row["password"],
		'email' => $row["email"],
		'phone' => $row["phone"]
	));
}

function updateUser($row)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("DELETE FROM customer WHERE username=:username");
	$statement->execute(array($row["username"]));
	addUser($row);
}
function displayAddresses()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT * FROM address WHERE username=:username ;");
	$statement->execute(array("username" => $_SESSION["user"]));
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);

	echo '<div class="container my-5">';

	if (empty($results)) {
		echo '<div class="row alert alert-danger" role="alert">
		No addresses found
	  </div>';
	} else {
		$i = 1;
		$_SESSION["addr"] = array();
		foreach ($results as $address) {
			array_push($_SESSION["addr"], array($address));
			$val = <<< EOT
			<div class="row">
				<div class="card"> <div class="card-body"> <h5
				class="card-title">Address {$i}</h5> 
					<div class="form-group">
					<form class="needs-validation" novalidate method="post">
					<input type="hidden" name="address_number" value="{$i}">
					<input type="hidden" name="username" value="{$_SESSION["user"]}">
					<div class="row">
						<div class="col">
							<label class="form-label" for="door">Door Number</label>
							<input value="{$address["door_no"]}" name="door_no" required type="text" class=" form-control" id="door" required>
							<div class="invalid-feedback">
								Enter a valid Door Number
							</div>
						</div>
						<div class="col">
							<label class="form-label" for="street">Street</label>
							<input value="{$address["street"]}" name="street" required type="text" class=" form-control" id="street" required>
							<div class="invalid-feedback">
								Enter a valid street
							</div>
						</div>
						<div class="col">
							<label class="form-label" for="city">City</label>
							<input value="{$address["city"]}" name="city" required type="text" class=" form-control" id="city" required>
							<div class="invalid-feedback">
								Enter a valid city
							</div>
						</div>
						<div class="col">
							<label class="form-label" for="pin">PIN</label>
							<input value="{$address["PIN"]}" name="PIN" pattern="[0-9]{6}" required type="text" class=" form-control" id="pin" required>
							<div class="invalid-feedback">
								Enter a valid PIN. Format: 641103
							</div>
						</div>
					</div>
						<div class="row my-2">
						<div class="col">
						<input type="submit" href="#" class="btn btn-success" value="Modify"></input>
						</div>
						<div class="col">
						<input type="submit" name="delete" href="#" class="btn btn-danger" value="Delete"></input>
						</div>
					</div>
					</form>
				</div>
			</div>
			EOT;
			$i += 1;
			echo $val;
		}
	}
	addAddressForm();
	echo "</div>";
}

function addAddressForm()
{
	$val = <<< EOT
			<div class="card">
				<div class="card-body">
				<h5 class="card-title">New Address</h5>
				<div class="card-text">
					<form method="post" class="needs-validation" novalidate>
            <div class="row">
				<div class="col">
					<label class="form-label" for="door_no">Door Number</label>
					<input name="door_no" required type="text" class=" form-control" id="door_no" required>
					<div class="invalid-feedback">
						Enter a valid Door Number
					</div>
				</div>
				<div class="col">
					<label class="form-label" for="street">Street</label>
					<input name="street" required type="text" class=" form-control" id="street" required>
					<div class="invalid-feedback">
						Enter a valid street
					</div>
				</div>
				<div class="col">
					<label class="form-label" for="city">City</label>
					<input name="city" required type="text" class=" form-control" id="city" required>
					<div class="invalid-feedback">
						Enter a valid city
					</div>
				</div>
				<div class="col">
					<label class="form-label" for="PIN">PIN</label>
					<input name="PIN" pattern="[0-9]{6}" required type="text" class=" form-control" id="PIN" required>
					<div class="invalid-feedback">
						Enter a valid PIN. Format: 641103
					</div>
				</div>
            </div>
						<div class="row">
							<div class="col">
								<input type="submit" name="add" class="btn btn-outline-primary mt-3" href="./address.php" value="Add Address">
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
EOT;
	echo $val;
}

function addAddress($row)
{
	if (empty($row["username"])) {
		$row["username"] = $_SESSION["user"];
	}
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("INSERT OR IGNORE INTO address VALUES(
		:username,
		:door_no,
		:street,
		:city,
		:PIN
	);");
	$statement->execute(array(
		'username' => $row["username"],
		'door_no' => $row["door_no"],
		'street' => $row["street"],
		'city' => $row["city"],
		'PIN' => $row["PIN"],
	));
}

function deleteAddress($row)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("DELETE FROM address WHERE door_no=:door AND street=:street AND city=:city AND PIN=:pin AND username=:username;");
	$statement->execute(array(
		"username" => $row["username"],
		"door" => $row["door_no"],
		"street" => $row["street"],
		"city" => $row["city"],
		"pin" => $row["PIN"]
	));
}

function updateAddress($row)
{
	$row["username"] = $_SESSION["user"];
	$ind = (int) $_POST["address_number"];
	$ind--;
	$og = $_SESSION["addr"][$ind][0];
	$new = $row;
	unset($new["address_number"]);
	deleteAddress($og);
	addAddress($new);
	unset($_SESSION["addr"]);
}


function displayProfile()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT * FROM customer WHERE username=:username ;");
	$statement->execute(array("username" => $_SESSION["user"]));
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);

	$username = $results[0]["username"];
	$fname = $results[0]["firstname"];
	$mname = $results[0]["middlename"];
	$lname = $results[0]["lastname"];
	$email = $results[0]["email"];
	$phone = $results[0]["phone_number"];

	if (empty($results)) {
		echo "Fail";
	} else {
		$val = <<< EOT
		<div class="container mt-5">
			<div class="card">
				<div class="card-body">
				<h5 class="card-title">Modify Profile</h5>
				<div class="card-text">
					<form method="post" class="needs-validation" novalidate>
						<div class="mb-3 row">
							<label for="username" class="col-sm-2 col-form-label">Username</label>
							<div class="col-sm-10">
								<input type="text" readonly class="form-control-plaintext" name="username" id="username" value="{$username}">
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="form-label" for="fname">Firstname</label>
								<input required name="fname" type="text" class="form-control" id="fname" value="{$fname}">
								<div class="invalid-feedback">
									Firstname should not be empty
								</div>
							</div>
							<div class="col">
								<label class="form-label" for="mname">Middlename</label>
								<input name="mname" type="text" class=" form-control" id="mname" value="{$mname}">
							</div>
							<div class="col">
								<label class="form-label" for="lname">Lastname</label>
								<input name="lname" required type="text" class="form-control" id="lname" value="{$lname}">
								<div class="invalid-feedback">
									Middlename should not be empty
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="form-label" for="password">Password</label>
								<input required name="password" type="password" class=" form-control" id="password">
								<div class="invalid-feedback">
									Password should not be empty
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<label class="form-label" for="email">Email</label>
								<input name="email" required type="email" class="form-control" id="email" value="{$email}">
								<div class="invalid-feedback">
									Enter a valid email-id
								</div>
							</div>
							<div class="col">
								<label class="form-label" for="phone">Phone</label>
								<input name="phone" required type="text" class="form-control" id="phone" pattern="[0-9]{10}" value="{$phone}">
								<div class="invalid-feedback">
									Enter a valid phone number
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<input class="btn btn-primary mt-3" type="submit" value="Modify"></input>
							</div>
							<div class="col">
								<a class="btn btn-success mt-3" href="./address.php">Modify Addresses</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		EOT;
		echo $val;
	}
}



function showCart()
{
	$body = "";
	$total = 0;
	if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
		foreach (array_keys($_SESSION["cart"]) as $tmp) {
			$name = $_SESSION["cart"][$tmp]["name"];
			$id = $tmp;
			$quantity = $_SESSION["cart"][$tmp]["quantity"];
			$price = $_SESSION["cart"][$tmp]["price"];
			$cost = (int)$quantity * $price;
			$total += $cost;
			$body = $body . <<<EOT
			<tr>
				<td>{$name}</td>
				<td>\${$price}</td>
				<td>{$quantity}</td>
				<td>
					\${$cost}
				</td>
				<td>
					<form method="post">
					<input type="hidden" name="part_id" value="{$tmp}">
					<input type="submit" name="action" class="btn btn-outline-success" value="+"></input>
					<input type="submit" name="action" class="btn btn-outline-danger" value="-"></input>
					</form>
				</td>
			</tr>
		EOT;
		}
		echo <<< EOT
	<div class="container mt-5">
	<table class="table table-bordered">
	<thead>
	<th>Name</th>
	<th>Price</th>
	<th>Quantity</th>
	<th colspan=2>Cost</th>
	</thead>
	<tbody>
	{$body}
	</tbody>
	<tfoot>
	<tr>
	<td colspan=3>Total</td>
	<td colspan=2>\${$total}<total>
	</tr>
	</tfoot>
	</table>
	</div>
	<div class="text-center">
	<a class="btn btn-success" href="buy.php">Buy Now</a>
	</div>
	EOT;
	} else {
		echo <<< EOT
		<div class="container mt-5">
			<div class="alert alert-primary" role="alert">
			Your Cart is empty
			</div>
		</div>
		EOT;
	}
}

function addToCart($row)
{
	$id = $row["part_id"];
	if (isset($_SESSION["cart"][$id])) {
		$_SESSION["cart"][$id]["quantity"]++;
	} else {
		$tmp = array();
		$tmp = [
			"quantity" => $row["quantity"],
			"price" => $row["price"],
			"name" => $row["name"]
		];
		$_SESSION["cart"][$id] = $tmp;
	}
}
function removeFromCart($row)
{
	$id = $row["part_id"];
	if ($_SESSION["cart"][$id]["quantity"] - 1 > 0) {
		$_SESSION["cart"][$id]["quantity"]--;
	} else {
		unset($_SESSION["cart"][$id]);
	}
	print_r($_SESSION["cart"]);
}

function displayCards()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT * FROM card WHERE card_no in (SELECT card_no FROM payment WHERE username=:username) ;");
	$statement->execute(array("username" => $_SESSION["user"]));
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);

	echo '<div class="container my-5">';

	if (empty($results)) {
		echo '<div class="row alert alert-danger" role="alert">
		No Payment methods available
	  </div>';
	} else {
		$i = 1;
		foreach ($results as $card) {
			$card["expiry"] = gmdate("m/Y", $card["expiry"]);
			$val = <<< EOT
			<div class="row">
				<div class="card"> <div class="card-body"> <h5
				class="card-title">Card {$i}</h5> 
					<div class="form-group">
					<form class="needs-validation" novalidate method="post">
					<div class="row">
						<div class="col">
							<label class="form-label" for="card_no">Card Number</label>
							<input value="{$card["card_no"]}" name="card_no" required type="text" class="form-control-plaintext" id="card_no" readonly>
							<div class="invalid-feedback">
								Enter a valid Card Number
							</div>
						</div>
						<div class="col">
							<label class="form-label" for="name">Name on Card</label>
							<input value="{$card["name"]}" name="name" required type="text" class=" form-control" id="name" required>
							<div class="invalid-feedback">
								Enter a valid Name
							</div>
						</div>
						<div class="col">
							<label class="form-label" for="expiry">Expiry Date</label>
							<input  name="expiry" required type="text" class=" form-control" id="expiry" required
							pattern="[0-2][0-9]\/[2][0-9][0-9][0-9]" 
							value="{$card["expiry"]}"
							>
							<div class="invalid-feedback">
								Enter a valid date. Format MM/YYYY
							</div>
						</div>
					</div>
						<div class="row my-2">
						<div class="col">
						<input type="submit" href="#" class="btn btn-success" value="Modify"></input>
						</div>
						<div class="col">
						<input type="submit" name="action" href="#" class="btn btn-danger" value="Delete"></input>
						</div>
					</div>
					</form>
				</div>
			</div>
			EOT;
			$i += 1;
			echo $val;
		}
	}
	addCardForm();
	echo "</div>";
}

function addCardForm()
{
	$val = <<< EOT
			<div class="card">
				<div class="card-body">
				<h5 class="card-title">New Address</h5>
				<div class="card-text">
					<form method="post" class="needs-validation" novalidate>
					<div class="row">
						<div class="col">
							<label class="form-label" for="card_no">Card Number</label>
							<input  name="card_no" required type="text" class=" form-control" id="card_no" required
							pattern="[0-9]{16}">
							<div class="invalid-feedback">
								Enter a valid Card Number
							</div>
						</div>
						<div class="col">
							<label class="form-label" for="name">Name on Card</label>
							<input  name="name" required type="text" class=" form-control" id="name" required>
							<div class="invalid-feedback">
								Enter a valid Name
							</div>
						</div>
						<div class="col">
							<label class="form-label" for="expiry">Expiry Date</label>
							<input  name="expiry" required type="text" class=" form-control" id="expiry" required
							pattern="[0-2][0-9]\/[2][0-9][0-9][0-9]">
							<div class="invalid-feedback">
								Enter a valid date. Format MM/YYYY
							</div>
						</div>
					</div>
						<div class="row">
							<div class="col">
								<input type="submit" name="action" class="btn btn-outline-primary mt-3" href="./card.php" value="Add Card">
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
EOT;
	echo $val;
}
function addCard($row)
{
	print_r($_POST);
	$username = $_SESSION["user"];
	$expiry = correctTime($_POST["expiry"]);
	$name = $_POST["name"];
	$card_no = $_POST["card_no"];
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("INSERT OR IGNORE INTO card VALUES(
		:card_no,
		:name,
		:expiry
	);");
	$statement->execute(array(
		'card_no' => $card_no,
		'name' => $name,
		'expiry' => $expiry
	));
	$statement = $pdo->prepare("INSERT OR IGNORE INTO payment VALUES(
		:username,
		:card_no
	)");
	$statement->execute(array(
		"username" => $username,
		"card_no" => $card_no
	));
}

function updateCard($row)
{
	$card_no = $row["card_no"];
	$expiry = correctTime($_POST["expiry"]);
	$name = $_POST["name"];

	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("UPDATE card set 
		name=:name,
		expiry=:expiry 
		WHERE
		card_no = :card_no
	;");
	$statement->execute(array(
		'card_no' => $card_no,
		'name' => $name,
		'expiry' => $expiry
	));
}

function deleteCard($row)
{
	$card_no = $row["card_no"];
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("DELETE FROM card WHERE card_no = :card_no ;");
	$statement->execute(array('card_no' => $card_no,));
	$statement = $pdo->prepare("DELETE FROM card WHERE card_no NOT in (SELECT DISTINCT card_no FROM payment);");
}

function getAddress()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT * FROM address WHERE username = :username;");
	$statement->execute(array($_SESSION["user"]));
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}

function getCards()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT * FROM card WHERE card_no in (SELECT card_no FROM payment WHERE username=:username);");
	$statement->execute(array($_SESSION["user"]));
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}


function orderDates()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT date FROM service WHERE username=:username;");
	$statement->execute(array($_SESSION["user"]));
	$tmp = $statement->fetchAll(PDO::FETCH_ASSOC);
	$results = array();
	foreach ($tmp as $row) {
		array_push($results, $row["date"]);
	}
	return $results;
}

function discount()
{
	$dates = orderDates();
	$discount = 0;
	if (count($dates) > 3) {
		$discount = 25;
	}
	return $discount;
}

function showInvoice()
{
	$totalItems = count($_SESSION["cart"]);
	$cart = <<< EOT
			<ul class="list-group mb-3">
	EOT;
	$total = 0;
	foreach ($_SESSION["cart"] as $item) {
		$cost = (int) $item["price"] * $item["quantity"];
		$total += $cost;
		$cart = $cart . <<<EOF
				<li class="list-group-item d-flex justify-content-between lh-condensed">
				<div>
					<h6 class="my-0">{$item["name"]}</h6>
					<small class="text-muted">\${$item["price"]} x {$item["quantity"]}</small>
				</div>
				<span class="text-muted">\${$cost}</span>
				</li>
	EOF;
	}
	if (discount() != 0) {
		$discount = discount();
		$total = $total - $discount;
		$promo = <<< EOF
		<li class="list-group-item d-flex justify-content-between bg-light">
				<div class="text-success">
				<h6 class="my-0">Promo code</h6>
				<small>EXAMPLECODE</small>
				</div>
				<span class="text-success">-\${$discount}</span>
	EOF;
	} else {
		$promo = "";
	}
	$cart = $cart . <<< EOF
		{$promo}
			<li class="list-group-item d-flex justify-content-between">
              <span>Total</span>
              <strong>\${$total}</strong>
            </li>
          </ul>
EOF;
	$address = "";
	$i = 0;
	foreach (getAddress() as $addr) {
		$addr = array_splice($addr, 1);
		$tmp = implode(", ", $addr);
		$address = $address . <<< EOF
		<div class="form-check">
		<input class="form-check-input" type="radio" name="address" id="address{$i}" value="{$tmp}" required>
		<input type="hidden" name="total" value={$total}></input>
		<label class="form-check-label" for="address{$i}">{$tmp}</label>
		</div>
		EOF;
		$i++;
	}
	$cards = "";
	$i = 0;
	foreach (getCards() as $card) {
		$card["expiry"] = gmdate("m/Y", $card["expiry"]);
		$cards = $cards . <<< EOF
		<div class="form-check">
		<input class="form-check-input" type="radio" name="card" id="card{$i}" value="{$card["card_no"]}" required>
		<label class="form-check-label" for="card{$i}">{$card["card_no"]}<br \>
		{$card["name"]}<br \>{$card["expiry"]}
		</label>
		</div>
		EOF;
		$i++;
	}

	$today = date("Y-m-d");
	if (hasService() === true) {
		$date = <<<EOT
		<input type="date" id="date" name="date" min="{$today}" required></input>
		EOT;
	} else {
		$date = <<<EOT
			<input type="date" id="date" name="date" value="{$today}" readonly></input>
		EOT;
	}

	echo <<< EOT
	<div class="container mt-5">
      	<div class="py-5 text-center">
        <h2>Checkout form</h2>
      	</div>
		<div class="row">
			<div class="col-md-4 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-primary">Your cart</span>
					<span class="badge bg-primary rounded-pill">{$totalItems}</span>
				</h4>
				{$cart}
			</div>
			<div class="col-md-8 order-md-1">
				<form method="post" action="./checkout.php">
				<h4 class="mb-3">Billing address</h4>
				<div class="d-block my-3">
				{$address}
				</div>
				<h4 class="mb-3">Payment</h4>
				<div class="d-block my-3">
					{$cards}
				</div>
				<h4 class="mb-3">Time</h4>
				<div class="d-block my-3">
					${date}
				</div>
			<div class="d-block">
				<hr class="mb-4">
				<input type="submit" class="btn btn-primary btn-lg btn-block"  value="Continue to checkout"></submit>
				</form>
			</div>
		</div>
	</div>
EOT;
}
function confirmBuy()
{
	$address = $_POST["address"];
	$payment = $_POST["card"];
	$date = $_POST["date"];
	$total = $_POST["total"];
	$timestamp = strtotime($_POST["date"]);
	$service_id = hash("md5", time() . $_SESSION["user"]);
	$parts = '<table class="mt-3"><thead><th>Name</th><th>Price</th><th>Quantity</th><th>Gross</th></thead>';
	foreach ($_SESSION["cart"] as $item) {
		$cost = (int) $item["price"] * $item["quantity"];
		$parts = $parts . <<< EOT
		<tr>
			<td>{$item["name"]}</td>
			<td>{$item["price"]}</td>
			<td>{$item["quantity"]}</td>
			<td>{$cost}</td>
		</tr>
		EOT;
	}
	$parts = $parts . "<tfoot><tr><td colspan=3>Total(After discounts)</td><td>\${$total}</td></tr></tfoot></table>";
	echo <<< EOT
	<div class="container mt-5">
		<code>
		<table>
		<tr>
		<td>Username</td>
		<td>{$_SESSION["user"]}</td>
		</tr>
		<tr>
		<td>Address</td>
		<td>{$address}</td>
		</tr>
		<tr>
		<td>Payment Method</td>
		<td>{$payment}</td>
		</tr>
		<tr>
		<td>Date</td>
		<td>{$date}</td>
		</tr>
		</table>
		{$parts}
		</code>
	<form method="post">
	<input type="hidden" name="service_id" value="{$service_id}"></input>
	<input type="hidden" name="date" value="{$timestamp}"></input>
	<input type="submit" name="buy" class="mt-5 btn btn-outline-success" value="Buy"></input>
	</form>
	</div>
	EOT;
}

function hasService()
{
	$pdo = new PDO('sqlite:./db/main.db');
	foreach (array_keys($_SESSION["cart"]) as $key) {
		$statement = $pdo->prepare("SELECT car_id FROM part WHERE part_id = :part_id");
		$statement->execute(array($key));
		$results = $statement->fetch(PDO::FETCH_ASSOC);
		if ($results["car_id"] == 0) {
			return true;
		}
	}
}


function addService($row)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("INSERT INTO service VALUES (
		:service_id,
		:username,
		:date,
		:rating,
		:comment
	);");
	$statement->execute(array(
		"service_id" => $row["service_id"],
		"username" => $_SESSION["user"],
		"date" => $row["date"],
		"rating" => null,
		"comment" => null
	));
	foreach (array_keys($_SESSION["cart"]) as $item) {
		$statement = $pdo->prepare("INSERT INTO services_done VALUES(
			:service_id,
			:part_id,
			:quantity
		);");
		$statement->execute(array(
			"service_id" => $row["service_id"],
			"part_id" => $item,
			"quantity" => $_SESSION["cart"][$item]["quantity"]
		));
	}
}


function displayServices()
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("SELECT * FROM service WHERE username=:username;");
	$statement->execute(array($_SESSION["user"]));
	$tmp = $statement->fetchAll(PDO::FETCH_ASSOC);
	echo <<< EOT
	<div class="container mt-5">
	EOT;
	foreach ($tmp as $result) {
		$date = gmdate("Y-m-d", $result["date"]);
		$partArr = getPartArray($result["service_id"]);
		$parts = '<ul class="list-group">';
		foreach ($partArr as $part) {
			$parts = $parts . <<< EOT
			<li class="list-group-item">{$part["name"]}
			<span class="badge bg-primary rounded-pill">{$part["quantity"]}</span>
			<span class="badge bg-success rounded-pill">\${$part["price"]}</span>
			</li>
		EOT;
		}
		$parts = $parts . <<< EOT
		</ul><div>
			<form method="post" action="./feedback.php" class="needs-validation" novalidate>
				<div class="row my-2">
					<div class="col-auto">
						<label for="rating" class="form-label">Rating</label>
					</div>
					<div class="col-auto">
						<input type="text" name="rating" id="rating" pattern="[1-5]{1}" value="{$result["rating"]}" class="form-control"></input>
						<div class="invalid-feedback">
							Rating 1-5
						</div>
					</div>
					<div class="col-auto">
						<label for="comment" class="form-label">Comment</label>
					</div>
					<div class="col-auto">
						<input type="text"name="comment" id="comment" value="{$result["comment"]}" class="form-control"></input>
					</div>
				</div>
				<div class="row y-2">
					<div class="col">
						<input type="hidden" value="{$result["service_id"]}" name="service_id"></input>
						<input type="submit" value="Submit" class="btn btn-outline-primary"></input>
					</div>
				</div>
			</form>
		</div>
		EOT;
		echo <<<EOT
		<div class="card">
			<div class="card-body">
				<h3 class="card-title">{$date}</h3>
				<h3 class="card-subtitle mb-2 text-muted">Parts/Services Bought</h3>
					<div class="card-text">
						{$parts}
					</div>
			</div>
		</div>
	EOT;
	}
	echo "</div>";
}

function updateFeedback($row)
{
	$pdo = new PDO('sqlite:./db/main.db');
	$statement = $pdo->prepare("UPDATE service SET rating=:rating, comment=:comment WHERE service_id=:service_id;");
	$statement->execute($row);
}

?>