<!DOCTYPE html>
<html lang="nl">
<head>
    <?php
    include("../template/header.php");

    include_once('../config.php');

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

    while ($rij = mysqli_fetch_array($haalJobs)) {
        $jobTitel = $rij['Titel'];
        $jobBeschrijving = $rij['Beschrijving'];

        ?>

		<div class="row mt-lg-4 ml-sm-2 mr-sm-2">
			<div class="col-lg-4">
				<div class="card card-green">
					<div class="card-heading">
						<div class="row px-sm-3 py-sm-3">
							<div class="col-lg-12">
                                <?php echo $jobTitel; ?>
							</div>
						</div>
					</div>

					<div class="card-footer">
                        <?php echo $jobBeschrijving; ?>
					</div>
				</div>
			</div>
		</div>
    <?php } ?>
</div>
