<?php
session_start();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <?php


    include("../template/header.php");

    include_once('../config.php');

    if (isset($_SESSION['ID'])) {
    include ('../template/respond.php');
	}

    ?>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-dark">
    <?php
    include('../template/nav.php')
    ?>
</nav>

<div class="row mt-sm-4 ml-sm-2 mr-sm-2">
	<div class="col-lg-12">
		<h1>Vacatures</h1>
		<hr/>
	</div>
</div>


<div class="container-fluid">

	<div class="row mt-lg-4 ml-sm-2 mr-sm-2">
		<div class="col-lg-12">
			<h2>Filter</h2>
			<div class="row">
				<div class="col-lg-2">

					<label for="Labels">Selecteer een Label</label>
					<select class="form-control" id="Labels">
						<option>PHP ontwikkelaar</option>
						<option>CSS meester</option>
						<option>JS jester</option>
						<option>stage</option>
						<option>waarom zo veel</option>
					</select>
				</div>

				<div class="col-lg-2">
					<label for="Search">Zoek een Label</label>
					<input type="text" id="Search" class="form-control" placeholder="Zoeken..">
				</div>
			</div>
		</div>
	</div>


    <?php
    $haalJobQuery = "SELECT * FROM vacature";
    $haalJobs = mysqli_query($mysqli, $haalJobQuery);

    while ($rij = mysqli_fetch_assoc($haalJobs)) {  ?>

		<div class="card mt-2 mr-2 mb-2 ml-2" style="width:30vw; float:left;">
			<div class="card-body">
				<h5 class="card-title"><?php echo $rij['Titel']; ?></h5>
				<p class="card-text"><?php echo $rij['Beschrijving']; ?></p>
				<a href="#" class="btn btn-primary clickbutton" data-toggle="modal" data-target="#respondPopup"  ID="respondBtn" name="respondBtn" value="<?php echo $rij['Titel']; ?>">Reageer</a>
			</div>
		</div>

    <?php } ?>

</div>
</body>
</html>
