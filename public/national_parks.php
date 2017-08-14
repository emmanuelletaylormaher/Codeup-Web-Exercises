<?php

require_once __DIR__ . "/../db_connect.php";
require_once "../Input.php";
require_once "../park_logins.php";




function pageController($dbc){
	$message = "";
	$page=Input::getNumeric("page", 1);
	$offset = (($page - 1)*4);
	$query = "SELECT *  FROM national_parks LIMIT 4 OFFSET " . $offset;
	$stmt = $dbc->query($query);

	$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
	$navigate=Input::get("navigate");


	$data = array(
			"navigate" => $navigate,
			"parks" => $parks,
			"page" => $page,
			"message" => $message
	);

	if (!empty($_POST)) {
		$name = Input::get("newname");
		$location = Input::get("newlocation");
		$dateEstablished = strtotime(Input::get("newdate_established"));
		$areaInAcres = Input::get("newarea_in_acres");
		$description = Input::get("newdescription");

		$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :dateEstablished, :areaInAcres, :description)";
		$newParkStmt= $dbc->prepare($query);

		$newParkStmt->bindValue(":name", $name, PDO::PARAM_STR);
		$newParkStmt->bindValue(":location", $location, PDO::PARAM_STR);
		$newParkStmt->bindValue(":dateEstablished", $dateEstablished, PDO::PARAM_STR);
		$newParkStmt->bindValue(":areaInAcres", $areaInAcres, PDO::PARAM_STR);
		$newParkStmt->bindValue(":description", $description, PDO::PARAM_STR);
		
		$newParkStmt->execute();

		if (empty($name)|| empty($location) || empty($location) || empty($dateEstablished) || empty($areaInAcres) || empty($description)) {
			$message = "please enter valid information into the form!";
		}

	}


	return $data;

}

// offset = (n-1)*4

extract(pageController($dbc));

?>

<!DOCTYPE html>
<html>
<head>
	<title>National Parks</title>

	<!-- Bootstrap CDN -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="css/national_parks_css.css">

</head>
<body>
	<main class="container">
		<h1> check out some national parks!! </h1>
		<!-- <div>
			<img id="parkimage" class="img-fluid" src="img/nationalpark.png" alt="national park image">
		</div> -->
			<section class= "container col-md-12">
					<?php foreach ($parks as $park): ?>
						<div class="col-md-3">
			                <h4><?= $park['name'] ?></h4>
			                <p>Location: <?= $park['location'] ?></p>
			                <p>Date Established: <?= $park['date_established'] ?></p>
			                <p>Area in acres: <?= $park['area_in_acres'] ?></p>
			                <p>Description: <?=$park["description"] ?></p>
			            </div>
					<?php endforeach ?>
			</section>
			<section>
				<form method="GET" action="national_parks.php" class="pagination">
					<button class="btn" <?php if ($page == 1) {?> style="display:none;" <?php }else {?> style="display:initial;" <?php } ?> name="page" value=<?= $page - 1 ?> >previous</button>
					<button class="btn" <?php if ($page == 15) {?> style="display:none;" <?php }else {?> style="display:initial;" <?php } ?> name="page" value=<?= $page + 1 ?> >next</button>
				</form>
			</section>
			<section>
				<h3>add your own park!</h3>
				<h4 style="color:red; "><?= $message ?></h4>
				<form method="POST" action="national_parks.php">
					<label>Name:</label>
					<input type="text" name="newname">
					<label>Location:</label>
					<input type="text"  name="newlocation">
					<label>Date Established:</label>
					<input type="text" name="newdate_established">
					<label>Area in Acres:</label>
					<input type="text" name="newarea_in_acres">
					<label>Description</label>
					<input type="text" name="newdescription">
					<button class="btn">Submit!</button>
				</form>
			</section>
	<!-- JQuery CDN -->
	<script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<!-- Custom JS -->
	<script type="text/javascript" src="/js/national_parks_js.js"></script>
</body>
</html>