<!DOCTYPE html>
<html lang="nl">
<head>
    <?php
    /**
     * Created by PhpStorm.
     * User: mmoer
     * Date: 5/23/2018
     * Time: 11:47 AM
     */
    include("../template/header.php");
    ?>
</head>

<body>

<div class="container-fluid pl-0 pr-0">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <?php
        include('../template/nav.php');
        ?>
	</nav>
	<div class="row mx-auto">
		<div class="col-sm-6">
			<form name="postJobForm" id="signUpForm" action="../POST/postJob.php" method="post">
				<div class="form-group">
					<label for="jobNaam">Job naam</label>
					<input type="text" name="jobNaam" class="form-control" id="jobNaam" placeholder="PHP-wizzard" required>
				</div>

				<div class="form-group">
					<label for="exampleFormControlTextarea1">Example textarea</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>

				<button onclick="submitForm()" type="button" class="btn btn-primary">Registreren</button>
			</form>
		</div>
	</div>
</div>