<?php

    include('../config.php');

    if($_POST['type'] == 'vacature')
    {
        $titel = $_POST['titel'];
        $datum = $_POST['datum'];
        $gebruikerID = $_POST['gebruikerID'];

        if($mysqli->query("DELETE FROM vacature WHERE Titel = '$titel' AND Datum = '$datum' AND gebruikerID = $gebruikerID"))
        {
            echo 1;
        }
        else
        {
            print_r($mysqli->error);
        }


    }
?>