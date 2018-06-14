<?php
/**
 * Created by PhpStorm.
 * User: lucsers
 * Date: 8-6-2018
 * Time: 12:32
 */
session_start();

if (isset($_SESSION['ID'])) {
    //haal config.php op
    require_once("../config.php");

    //escape alle data die we gaan gebruiken in de query
    $job = mysqli_real_escape_string($mysqli, $_POST['job']);
    $location = mysqli_real_escape_string($mysqli, $_POST['location']);
    $description = mysqli_real_escape_string($mysqli, $_POST['description']);
    $date = mysqli_real_escape_string($mysqli, $_POST['date']);
    $date = date_format(new DateTime($date), "Y-m-d h:i:s");
    $title = mysqli_real_escape_string($mysqli, $_POST['title']);

    //maak en doe query
    $vacatureQuery = $mysqli->query("UPDATE `vacature` SET `Beschrijving`= '" . $description . "',`Functie`= '" . $job . "',`Locatie`= '" . $location . "'
                            WHERE Titel = '" . $title . "' AND Datum = '" . $date . "' AND gebruikerID = " . $_SESSION['ID']);

    //sluit connectie


    if ($vacatureQuery == 1) {
        //stuur terug naar account pagina
        header('Location: ../pages/account.php');
    } else {
        echo "oops! something went wrong.";
    }
    $mysqli->close();
} else {
    header('Location: ../pages/home.php');
}