<?php
/**
 * Created by PhpStorm.
 * User: zico_
 * Date: 11-6-2018
 * Time: 14:18
 */
    session_start();
    include('../config.php');

    if($_POST['type'] == 'newLabel')
    {
        $trefwoord = $_POST['trefwoord'];
        $mysqli->query("INSERT INTO v_label VALUES(NULL,'$trefwoord')");
        echo 1;
        $mysqli->close();

    }

?>

