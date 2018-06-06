<?php
/**
 * Created by PhpStorm.
 * User: zico_
 * Date: 6-6-2018
 * Time: 11:39
 */
session_start();
?>
<html>
    <head>
        <title>Admin Home</title>
        <?php include("../template/header.php")?>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <?php
        include('../template/nav.php')
        ?>
    </nav>

    <div class="container-fluid">
        <div class="row mt-sm-4 ml-sm-2 mr-sm-2">
            <div class="col-lg-12">
                <h1>Admin Home</h1>
                <hr/>
            </div>
        </div>
        <div class="row ml-sm-2 mr-sm-2">
        <?php
            if($_SESSION["admin"] == 1)
            {

            }
            else
            {
                echo "Je hebt geen toegang tot deze pagina!";
            }
            ?>
        </div>
    </div>
    </body>
</html>
