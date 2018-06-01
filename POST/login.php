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
$loginemail = mysqli_real_escape_string($mysqli, $loginemail);

//wachtwoord checken of het een echt email is en geen SQL injectie
$loginwachtwoord = mysqli_real_escape_string($mysqli, $loginwachtwoord);

//var met query die controleert of email bestaat
$checkEmailExistQuery = "SELECT * FROM gebruiker WHERE email = '$loginemail'";

//var met uitkomst query
$checkEmailExist = mysqli_query($mysqli, $checkEmailExistQuery);

if (mysqli_num_rows($checkEmailExist) > 0) {
    //var met query die het wachtwoord ophaalt
    $getPasswordQuery = "SELECT ID, Naam, wachtwoord FROM gebruiker WHERE email = '$loginemail'";

    //uitkomst van de query
    $getPassword = mysqli_query($mysqli, $getPasswordQuery);

    //while loop die value uit  de row haalt en in var checkPassword zet
    while($rij = mysqli_fetch_array($getPassword)){
        $checkPassword = $rij['wachtwoord'];
        $ID = $rij['ID'];
        $name = $rij['Naam'];
    }

    if(password_verify($loginwachtwoord, $checkPassword)) {
        session_start();
        $_SESSION["email"] = $loginemail;
        $_SESSION["ID"] = $ID;
        $_SESSION["name"] = $name;

        header("location: ../pages/home.php");
    } else {
        echo "$checkPassword</br>";
        echo "$loginwachtwoord</br>";
    }


} else {
    echo "dit emailadres is niet geregistreerd";
}


?>


