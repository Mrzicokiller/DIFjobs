<?php
/**
 * Created by PhpStorm.
 * User: zico_
 * Date: 25-5-2018
 * Time: 17:51
 */

    include("../config.php");
    $email = $_POST['email'];

    $email = mysqli_real_escape_string($mysqli, $email);

    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $naam = $mysqli->query("SELECT Naam FROM gebruiker WHERE Email = '" .$email . "'");

        if($naam != NULL)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }
?>