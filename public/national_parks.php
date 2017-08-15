<?php

require_once __DIR__ . "/../db_connect.php";
require_once "../Input.php";
require_once "../park_logins.php";


function newPark($dbc)
{
	$name = Input::escape(Input::get("newname"));
	$location = Input::escape(Input::get("newlocation"));
	$dateEstablished = Input::escape(Input::get("newdate_established"));
	$areaInAcres = Input::escape(Input::get("newarea_in_acres"));
	$description = Input::escape(Input::get("newdescription"));

	$query = "INSERT INTO national_parks (name, location, date_established, area_in_acres, description) VALUES (:name, :location, :dateEstablished, :areaInAcres, :description)";
	$newParkStmt= $dbc->prepare($query);

	$newParkStmt->bindValue(":name", $name, PDO::PARAM_STR);
	$newParkStmt->bindValue(":location", $location, PDO::PARAM_STR);
	$newParkStmt->bindValue(":dateEstablished", $dateEstablished, PDO::PARAM_STR);
	$newParkStmt->bindValue(":areaInAcres", $areaInAcres, PDO::PARAM_STR);
	$newParkStmt->bindValue(":description", $description, PDO::PARAM_STR);
		
	$newParkStmt->execute();
}

function countParks($dbc) 
{
	$countQuery = "SELECT COUNT(*) FROM national_parks";
	$stmt = $dbc->prepare($countQuery);
	$count = (int) $stmt->fetchColumn();

	return $count; 
}

function retrieveParks($dbc, $limit = 2, $offset = 0)
{
	$query = "SELECT *  FROM national_parks LIMIT :limit OFFSET :offset";
	$stmt = $dbc->prepare($query);

	$stmt->bindValue(":limit", (int) $limit, PDO::PARAM_INT);
	$stmt->bindValue(":offset", (int) $offset, PDO::PARAM_INT);

	$stmt->execute();

	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	return $rows;

}

function pageController($dbc)
{
	$message = "";
	$page=Input::escape(Input::get("page", 1));
	$recordsPerPage = Input::escape(Input::get("recordsPerPage", 4));
	$offset = (($page - 1)*4);
	$query = "SELECT *  FROM national_parks LIMIT 4 OFFSET " . $offset;
	$stmt = $dbc->query($query);

	$parks = retrieveParks($dbc, $recordsPerPage, (($page - 1) * $recordsPerPage));
	$navigate=Input::get("navigate");


	$data = array(
			"navigate" => $navigate,
			"parks" => $parks,
			"page" => $page,
			"message" => $message
	);

	if (!empty($_POST)) {
		newPark($dbc);
	}

	return $data;
}


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
		    <div class="row text-center">
            
            <a class="col-lg-4" href="?page=<?=$page?>&recordsPerPage=4">4 Per Page</a>
            <a class="col-lg-4" href="?page=1&recordsPerPage=10">10 Per Page</a>
            <a class="col-lg-4" href="?page=1&recordsPerPage=100">100 Per Page</a>
            
        </div>
			<section class= "container col-md-12">
					<?php foreach ($parks as $park): ?>
						<div class="col-md-3 panel panel-default">
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
				<form method="POST" action="national_parks.php" class="form-group">
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