<?php

require_once __DIR__ . "/../db_connect.php";
require_once "../Input.php";
require_once "../park_logins.php";
require_once "../Park.php";


function newPark($dbc)
{
	$name = Input::escape(Input::get("newname"));
	$location = Input::escape(Input::get("newlocation"));
	$dateEstablished = Input::escape(Input::get("newdate_established"));
	$areaInAcres = Input::escape(Input::get("newarea_in_acres"));
	$description = Input::escape(Input::get("newdescription"));

	$dateEstablished - date("Y-m-d", strtotime($dateEstablished));

	if(!is_numeric($area_in_acres)) {
		echo "Area in acres must be numeric!";
		return;
	}

	$newPark = new Park();
	$newPark->name = $name;
	$newPark->location = $location;
	$newPark->dateEstablished = $dateEstablished;
	$newPark->areaInAcres = $areaInAcres;
	$newPark->description = $description;
	$newPark->insert();

}


function pageController()
{
	$data = [];

	if (!empty($_POST)) {
		newPark($dbc);
	}
	
	$page=Input::escape(Input::get("page", 1));
	$recordsPerPage = Input::escape(Input::get("recordsPerPage", 4));

	$parks = Park::paginate($page, $recordsPerPage);
	$navigate=Input::escape(Input::get("navigate"));


	$data["page"] = $page;
    $data["parks"] = $parks;
    $data["recordsPerPage"] = $recordsPerPage;
    $data['parksCount'] = Park::count();



	return $data;
}


extract(pageController());

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
		<section class="col-md-8">
			<div class="row text-center">
	            
	            <a class="col-lg-4 btn btn-secondary" href="?page=<?=$page?>&recordsPerPage=4">4 Per Page</a>
	            <a class="col-lg-4 btn btn-secondary" href="?page=1&recordsPerPage=10">10 Per Page</a>
	            <a class="col-lg-4 btn btn-secondary" href="?page=1&recordsPerPage=12">12 Per Page</a>
	            
	        </div>
			<section class="row text-center">
						<?php foreach ($parks as $park): ?>
							<div class="col-md-12 panel panel-default">
				                <h4><?= Input::escape($park->name) ?></h4>
				                <p>Location: <?= Input::escape($park->location) ?></p>
				                <p>Date Established: <?= Input::escape($park->date_established) ?></p>
				                <p>Area in acres: <?= Input::escape($park->area_in_acres) ?></p>
				                <p>Description: <?= Input::escape($park->description) ?></p>
				            </div>
						<?php endforeach ?>
				</section>
				<section>
					<form method="GET" action="national_parks.php" class="pagination">
						<button class="btn" <?php if ($page == 1) {?> style="display:none;" <?php }else {?> style="display:initial;" <?php } ?> name="page" value=<?= $page - 1 ?> >previous</button>
						<button class="btn" <?php if ($page == 15) {?> style="display:none;" <?php }else {?> style="display:initial;" <?php } ?> name="page" value=<?= $page + 1 ?> >next</button>
					</form>
				</section>
		</section>
			<section class= "col-sm-4">
			<h3>add your own park!</h3>
				<form method="POST" action="national_parks.php">
					<div class="form-group">
						<label>Name:</label>
						<br>
						<input type="text" name="newname">
					</div>
					<div class="form-group">
						<label>Location:</label>
						<br>
						<input type="text"  name="newlocation">
					</div>
					<div class="form-group">
						<label>Date Established:</label>
						<br>
						<input type="text" name="newdate_established">
					</div>
					<div class="form-group">
						<label>Area in Acres:</label>
						<br>
						<input type="text" name="newarea_in_acres">
					</div>
					<div class="form-group">
						<label>Description</label>
						<br>
						<input type="text" name="newdescription">	
					</div>
					<button class="btn">Submit!</button>
				</form>
			</section>
	<!-- JQuery CDN -->
	<script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
	<!-- Custom JS -->
	<script type="text/javascript" src="/js/national_parks_js.js"></script>
</body>
</html>