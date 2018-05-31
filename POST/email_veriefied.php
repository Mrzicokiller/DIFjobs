<?php
/**
 * Created by PhpStorm.
 * User: zico_
 * Date: 31-5-2018
 * Time: 13:04
 */

    include('../config.php');

    $email = $_GET['email'];
    $code = $_GET['code'];

    $result = $mysqli->query('SELECT ID FROM gebruiker WHERE Email = "' . $email . '" AND verifiedCode = "' . $code . '"');

    print_r($result->fetch_array());
?>

