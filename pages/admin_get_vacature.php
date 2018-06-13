<?php
    include('../config.php');

    $titel = $_POST['titel'];
    $datum = $_POST['datum'];
    $ID = $_POST['gebruikerID'];

    $vacature = $mysqli->query("SELECT * FROM vacature WHERE Titel = '$titel' AND Datum = '$datum' AND gebruikerID = '$ID'")->fetch_object();

    print_r(json_encode($vacature));

    $mysqli->close();
?>