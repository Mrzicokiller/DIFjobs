<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 24-5-2018
 * Time: 12:18
 */

include_once('../config.php');


$email = $_POST['email'];
$password = $_POST['password'];
$confPassword = $_POST['confirmPassword'];
$avgCheck = $_POST['avgCheck'];

$email = mysqli_real_escape_string($mysqli, $email);
$password = mysqli_real_escape_string($mysqli, $password);
$confPassword = mysqli_real_escape_string($mysqli, $confPassword);

if($password != $confPassword)
{
    header("location: ../pages/signup.php?er=true");
}
elseif ($password == NULL)
{
    header("location: ../pages/signup.php?er=true");
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("location: ../pages/signup.php?er=true");
}
else
{
    $password = password_hash($password, PASSWORD_BCRYPT);

    $mysqli->query("INSERT INTO `Gebruiker`");

}