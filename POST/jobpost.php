<?php
/**
 * Created by PhpStorm.
 * User: mmoer
 * Date: 6/1/2018
 * Time: 2:37 PM
 */
include_once('../config.php');

session_start();

//var met ingevulde titel
$jobTitle = $_POST['jobNaam'];

//var met locatie
$jobLocatie = $_POST['locatie'];

//var met omschrijving
$jobBeschrijving = $_POST["jobOmschrijving"];

//var met datum
$postDatum = date("Y-m-d h-i-s");

//var wordt gechecked en vervangen als nodig
$jobTitle = mysqli_real_escape_string($mysqli, $jobTitle);

//zelfde als hierboven maar dan voor locatie
$jobTitle = mysqli_real_escape_string($mysqli, $jobLocatie);

//zelfde als hierboven maar dan met omschrijving
$jobTitle = mysqli_real_escape_string($mysqli, $jobBeschrijving);

if($mysqli->query('INSERT INTO vacature VALUES("'. $jobTitle .'", "'.$postDatum .'", "' .  $jobBeschrijving  . '", "'.$jobTitle. '", "'.$jobLocatie. '", "'.$_SESSION["ID"].'")'))
{
    echo "succesfully posted";
} else{
    echo "failed to post";
}