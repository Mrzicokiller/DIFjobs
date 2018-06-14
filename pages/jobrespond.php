<?php
/**
 * Created by PhpStorm.
 * User: mmoer
 * Date: 5/23/2018
 * Time: 11:47 AM
 */

session_start();

if (isset($_SESSION['ID'])) {

    require_once("../config.php");


//haal gegevens op uit GET en SESSION
    $title = $_GET['titel'];

    $Vdate = str_replace("_", " ", $_GET['datum']);
    $Vdate = date_format(new DateTime($Vdate), "Y-m-d h:i:s");
    $userID = $_SESSION['ID'];

    //maak query om gegevens uit reactie te halen
        $reactieQuery = $mysqli->query("SELECT g.Naam, r.SgebruikerID, r.bericht, r.datum FROM reactie r
                                        JOIN gebruiker g ON r.SgebruikerID = g.ID
                                        WHERE Vtitel = '" . $title . "' AND Vdatum = '" . $Vdate . "' AND VgebruikerID = " . $userID);


    while ($rij = $reactieQuery->fetch_array()) {
        $stu = $rij['SgebruikerID'];
        $bericht = $rij['bericht'];
        $Sdate = $rij['datum'];
    }

    $Sdate = date_format(new DateTime($Sdate), "d-m-Y");


    $gebruikerNaamQuery = $mysqli->query("SELECT Naam FROM `gebruiker` WHERE ID = ". $studentID);

}

?>
<html>
<head>
    <?php include("../template/header.php"); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
    <?php
    include('../template/nav.php')
    ?>
</nav>

<div class="container-fluid">
    <div class="row mt-lg-2">
        <div class="col-lg-12">
            <h1>Vacature van: <?php echo $studentNaam; ?></h1>
            <hr/>
        </div>
    </div>


    <?php while ($rij = $reactieQuery->fetch_array()) {

        ?>
    <div class="row mt-lg-4 ml-auto mr-auto">
        <div class="col-lg-4">
            <div class="card card-green">
                <div class="card-heading">
                    <div class="row px-sm-3 py-sm-3">
                        <div class="col-lg-12">
                            <?php echo $title; ?>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <?php echo $bericht; ?>
                    <hr/>
                    <small class="pull-right"><?php echo $Sdate; ?></small>
                </div>

        </div>
    </div>
    </div>
</div>
</body>
</html>
