<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 24-5-2018
 * Time: 12:18
 */

include_once('../config.php');

$naam = $_POST['naam'];
$email = $_POST['email'];
$password = $_POST['password'];
$confPassword = $_POST['confirmPassword'];
$avgCheck = $_POST['avgCheck'];

$naam = mysqli_real_escape_string($mysqli, $naam);
$email = mysqli_real_escape_string($mysqli, $email);
$password = mysqli_real_escape_string($mysqli, $password);
$confPassword = mysqli_real_escape_string($mysqli, $confPassword);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

}
else
{
    $password = password_hash($password, PASSWORD_BCRYPT);

    if($avgCheck == "on")
    {
        $avgCheck = true;
    }
    else
    {
        $avgCheck = false;
    }

    if($mysqli->query('INSERT INTO Gebruiker VALUES(NULL, "'. $naam .'", "'.$password .'", "' .  $email  . '", "'.$avgCheck. '", false)'))
    {
    }
    else
    {
        print_r($mysqli->error);
        echo "Neem contact op met de beheerder";
    }
}
?>
<html>
    <head>
        <?php
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

            <h1>Gelukt</h1>
        </div>
    </body>
</html>
