<?php
/**
 * Created by PhpStorm.
 * User: mmoer
 * Date: 5/24/2018
 * Time: 3:25 PM
 */
//include de config file die connect met de database
include_once('../config.php');

$loginemail = $_POST['email'];
$loginwachtwoord = $_POST['wachtwoord'];

$loginemail = mysqli_real_escape_string($mysqli, $loginemail);
$loginpassword = mysqli_real_escape_string($mysqli, $loginwachtwoord);

$loginpassword = password_hash($loginpassword, PASSWORD_BCRYPT);

$checkEmailExist = mysqli_query("SELECT * FROM gebruiker WHERE email = '$loginemail'");

if (mysqli_num_rows($checkEmailExist) > 0) {
    $checkPassword = mysqli_query("SELECT wachtwoord FROM gebruiker WHERE email = '$loginemail'");
    if($loginpassword === $checkPassword){
        //start sessie etc?
    }
}else {
    echo "dit emailadres is niet geregistreerd";
}
?>


