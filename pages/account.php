<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 24-5-2018
 * Time: 11:48
 */

include_once('../config.php');

$mysqli->query('SELECT');

?>

<html>
<head>
    <?php
    include('../template/header.php')
    ?>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-dark">
    <?php
    include('../template/nav.php')
    ?>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mt-sm-4 ml-sm-2 mr-sm-2">
            <h1>Account<!--replace with username later--></h1>
            <hr/>
        </div>
    </div>
    <div class="row ml-sm-2 mr-sm-2">
        <div class="col-lg-12">
            <div class="card card-grey">
                <div class="card-heading">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                                <a class="nav-link" id="dataTab" href="#">Gegevens</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="jobsTab" href="#">Vacatures</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="responseTab" href="#">Reacties</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body" id="dataBody" hidden>
                    <h1 class="card-title">Gegevens</h1>

                </div>

                <div class="card-body" id="jobsBody">
                    <h1 class="card-title">Vacature</h1>
                </div>

                <div class="card-body" id="responseBody" hidden>
                    <h1 class="card-title">reactie</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    //detecteer click
    $('#dataTab').click(function () {

        //verander classes
       $('#dataTab').addClass('active');
       $('#jobsTab').removeClass('active');
       $('#responseTab').removeClass('active');

        //laat de body zien van de geklikte tab
        $('#dataBody').removeAttr('hidden');

        //als 1 van de ander body's nog niet hidden is, maak ze dan hidden
       if(!$('#responseBody').attr('hidden') || !$('#jobsBody').attr('hidden'))
       {
           $('#jobsBody').attr('hidden', true);
           $('#responseBody').attr('hidden', true);
       }
    });

    $('#jobsTab').click(function () {
        $('#jobsTab').addClass('active');
        $('#responseTab').removeClass('active');
        $('#dataTab').removeClass('active');

        $('#jobsBody').removeAttr('hidden');

        if(!$('#dataBody').attr('hidden') || !$('#responseBody').attr('hidden'))
        {
            $('#responseBody').attr('hidden', true);
            $('#dataBody').attr('hidden', true);
        }
    });

    $('#responseTab').click(function () {
        $('#responseTab').addClass('active');
        $('#jobsTab').removeClass('active');
        $('#dataTab').removeClass('active');

        $('#responseBody').removeAttr('hidden');

        if(!$('#dataBody').attr('hidden') || !$('#jobsBody').attr('hidden'))
        {
            $('#jobsBody').attr('hidden', true);
            $('#dataBody').attr('hidden', true);
        }
    });
</script>
</body>
</html>
