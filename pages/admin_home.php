<?php
/**
 * Created by PhpStorm.
 * User: zico_
 * Date: 6-6-2018
 * Time: 11:39
 */
session_start();
include('../config.php');
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
                ?>
                <div class="col-lg-12">
                    <div class="card card-grey">
                        <div class="card-heading">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="vacatureTab" href="#">Vacatures</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="studentTab" href="#">Studenten</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="bedrijfTab" href="#">Bedrijven</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="particulierTab" href="#">Particulieren</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body" id="vacatureBody">
                            <?php
                            $vacatureCount = $mysqli->query("SELECT Titel FROM vacature")->num_rows;
                            echo "Er zijn op dit moment " . $vacatureCount . " vacatures op de website.";
                            ?>
                        </div>

                        <div class="card-body" id="studentBody" hidden>
                            <?php
                            $studentCount = $mysqli->query("SELECT ID FROM student")->num_rows;
                            echo "Er zijn op dit moment " . $studentCount . " studenten geregistreerd.";
                            ?>
                        </div>

                        <div class="card-body" id="bedrijfBody" hidden>
                            <?php
                            $bedrijfCount = $mysqli->query("SELECT ID FROM bedrijf")->num_rows;
                            echo "Er zijn op dit moment " . $bedrijfCount . " bedrijven geregistreerd.";
                            ?>
                        </div>

                        <div class="card-body" id="particulierBody" hidden>
                            <?php
                            $particulierCount = $mysqli->query("SELECT ID FROM particulier")->num_rows;
                            echo "Er zijn op dit moment " . $particulierCount . " particulieren geregistreerd.";
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            else
            {
                echo "Je hebt geen toegang tot deze pagina!";
            }
            ?>

        </div>
    </div>
    <script>
        //detecteer click
        $('#vacatureTab').click(function () {
            //verander classes
            $('#vacatureTab').addClass('active');
            $('#studentTab').removeClass('active');
            $('#bedrijfTab').removeClass('active');
            $('#particulierTab').removeClass('active');
            //laat de body zien van de geklikte tab
            $('#vacatureBody').removeAttr('hidden');
            //als 1 van de ander body's nog niet hidden is, maak ze dan hidden
            if(!$('#bedrijfBody').attr('hidden') || !$('#studentBody').attr('hidden') || !$('#particulierBody').attr('hidden'))
            {
                $('#studentBody').attr('hidden', true);
                $('#bedrijfBody').attr('hidden', true);
                $('#particulierBody').attr('hidden', true);
            }
        });
        $('#studentTab').click(function () {
            $('#studentTab').addClass('active');
            $('#bedrijfTab').removeClass('active');
            $('#vacatureTab').removeClass('active');
            $('#studentBody').removeAttr('hidden');
            $('#particulierTab').removeClass('active');
            if(!$('#vacatureBody').attr('hidden') || !$('#bedrijfBody').attr('hidden') || !$('#particulierBody').attr('hidden'))
            {
                $('#bedrijfBody').attr('hidden', true);
                $('#vacatureBody').attr('hidden', true);
                $('#particulierBody').attr('hidden', true);
            }
        });
        $('#bedrijfTab').click(function () {
            $('#bedrijfTab').addClass('active');
            $('#studentTab').removeClass('active');
            $('#vacatureTab').removeClass('active');
            $('#bedrijfBody').removeAttr('hidden');
            $('#particulierTab').removeClass('active');
            if(!$('#vacatureBody').attr('hidden') || !$('#studentBody').attr('hidden') || !$('#particulierBody').attr('hidden'))
            {
                $('#studentBody').attr('hidden', true);
                $('#vacatureBody').attr('hidden', true);
                $('#particulierBody').attr('hidden', true);
            }
        });

        $('#particulierTab').click(function () {
            $('#particulierTab').addClass('active');
            $('#studentTab').removeClass('active');
            $('#vacatureTab').removeClass('active');
            $('#particulierBody').removeAttr('hidden');
            $('#bedrijfTab').removeClass('active');
            if(!$('#vacatureBody').attr('hidden') || !$('#studentBody').attr('hidden') || !$('#bedrijfBody').attr('hidden'))
            {
                $('#studentBody').attr('hidden', true);
                $('#vacatureBody').attr('hidden', true);
                $('#bedrijfBody').attr('hidden', true);
            }
        });
    </script>
    </body>
</html>
