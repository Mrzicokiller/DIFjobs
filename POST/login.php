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
    $getPasswordQuery = "SELECT wachtwoord FROM gebruiker WHERE email = '$loginemail'";

    //uitkomst van de query
    $getPassword = mysqli_query($mysqli, $getPasswordQuery);

    //while loop die value uit  de row haalt en in var checkPassword zet
    while($rij = mysqli_fetch_array($getPassword)){
        $checkPassword = $rij['wachtwoord'];
    }

    if(password_verify($loginwachtwoord, $checkPassword)) {
        echo "ingelogd";
        //session_start();
        //$_SESSION["name"] = loginemail;
        //$_SESSION["ingelogd"] = true;
        //echo "You logged in!";
    } else {
        echo "$checkPassword</br>";
        echo "$loginwachtwoord</br>";
    }


} else {
    echo "dit emailadres is niet geregistreerd";
}


?>


