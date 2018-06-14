<?php
/**
 * Created by PhpStorm.
 * User: lucsers
 * Date: 29-5-2018
 * Time: 09:59
 */
//haal config op voor connectie met de database
require('../config.php');

//start sessie
session_start();

//kijk wat er in de GET wordt meegegeven
if($_GET['type'] == 'name')
{

    $name = mysqli_real_escape_string($mysqli, $_POST['name']);

    $nameUpdate = $mysqli->query("UPDATE `gebruiker` SET `Naam`= '".$name."'WHERE ID = " . $_SESSION['ID']);

    $_SESSION['name'] = $name;

    $mysqli->close();
}
elseif ($_GET['type'] == 'email')
{

    $email = mysqli_real_escape_string($mysqli, $_POST['email']);

    $emailUpdate = $mysqli->query("UPDATE `gebruiker` SET `Email`= '".$email."'WHERE ID = " . $_SESSION['ID']);

    $_SESSION['email'] = $email;

    if($emailUpdate->num_rows > 0)
    {
        echo 0;
    }
    else
    {
        echo 1;
    }

    $mysqli->close();
}
elseif ($_GET['type'] == 'password')
{

    $pass = mysqli_real_escape_string($mysqli, $_POST['pass']);

    $pass = password_hash($pass, PASSWORD_BCRYPT);

    $passUpdate = $mysqli->query("UPDATE `gebruiker` SET `Wachtwoord`= '".$pass."'WHERE ID = " . $_SESSION['ID']);

    if($passUpdate->num_rows > 0)
    {
        echo 0;
    }
    else
    {
        echo 1;
    }

    $mysqli->close();
}

elseif ($_GET['type'] == 'skill')
{

    $skill = mysqli_real_escape_string($mysqli, $_POST['skill']);

    $skillUpdate = $mysqli->query("UPDATE `Student` SET `Specialisatie`= '".$pass."'WHERE ID = " . $_SESSION['ID']);

    $mysqli->close();
}