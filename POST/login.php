<?php
/**
 * Created by PhpStorm.
 * User: mmoer
 * Date: 5/24/2018
 * Time: 3:25 PM
 */
//include de config file die connect met de database
include_once('../config.php');

//var met ingevulde email
$loginemail = $_POST['loginEmail'];
//var met ingevulde wachtwoord
$loginwachtwoord = $_POST['loginWachtwoord'];

//email checken of het een echt email is en geen SQL injectie
$loginemail = $mysqli->real_escape_string($loginemail);

//wachtwoord checken of het een echt email is en geen SQL injectie
$loginwachtwoord = $mysqli->real_escape_string($loginwachtwoord);

//var met query die controleert of email bestaat
$checkEmailExist = $mysqli->query("SELECT * FROM gebruiker WHERE email = '$loginemail'");

if ($checkEmailExist) {

    //var met query die het wachtwoord ophaalt
    $getPassword = $mysqli->query("SELECT ID, Naam, wachtwoord, Is_admin FROM gebruiker WHERE email = '$loginemail'");

    //while loop die value uit  de row haalt en in var checkPassword zet
    while($rij = $getPassword->fetch_array()){
        $checkPassword = $rij['wachtwoord'];
        $ID = $rij['ID'];
        $name = $rij['Naam'];
        $admin = $rij['Is_admin'];
    }

    if(password_verify($loginwachtwoord, $checkPassword)) {
        session_start();

        $_SESSION["email"] = $loginemail;
        $_SESSION["ID"] = $ID;
        $_SESSION["name"] = $name;
        $_SESSION["admin"] = $admin;

        header("location: ../pages/home.php");
    } else {
        echo "$checkPassword</br>";
        echo "$loginwachtwoord</br>";
    }


} else {
    echo "dit emailadres is niet geregistreerd";
}

?>


