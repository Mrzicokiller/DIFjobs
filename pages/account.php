<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 24-5-2018
 * Time: 11:48
 */

include_once('../config.php');

//$mysqli->query('SELECT');

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
                                <a class="nav-link active" id="dataTab" href="#">Gegevens</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="jobsTab" href="#">Vacatures</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="responseTab" href="#">Reacties</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body" id="dataBody">
                    <h1 class="card-title">Gegevens</h1>

                    <h3>Naam:</h3>
                    <form name="changeName" action="../POST/updateUserData.php" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control" id="naam" placeholder="Naam">
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <hr/>

                    <h3>wachtwoord veranderen:</h3>
                    <form name="changePassword" action="../POST/updateUserData.php" method="post">

                        <div class="form-group">
                            <label for="password">Wachtwoord*</label>
                            <input type="password" class="form-control" id="password" placeholder="Wachtwoord" required>
                        </div>

                        <div class="form-group">
                            <label for="confirmPassword">Herhaal Wachtwoord*</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="Wachtwoord" required>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <!-- forms als gebruiker student is -->
                    <h3>Specialisatie:</h3>
                    <form name="specialisatie" action="../POST/updateUserData.php?F=student" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="specialisatie" placeholder="C# developer">
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <!-- form als gebruiker bedrijf is -->
                    <!-- form als gebruiker particulier is -->

                </div>

                <div class="card-body" id="jobsBody" hidden>

                    <!-- alleen bedrijf-->
                    <h1 class="card-title">Vacature</h1>

                    <table class="table table-striped table-dark">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titel</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Functie</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>php man</td>
                            <td>12-01-2017</td>
                            <td>php</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>php man</td>
                            <td>12-01-2017</td>
                            <td>php</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>php man</td>
                            <td>12-01-2017</td>
                            <td>php</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-body" id="responseBody" hidden>

                    <!-- alleen studenten-->
                    <h1 class="card-title">reactie</h1>

                    <table class="table table-striped table-dark">
                        <thead>
                        <tr>
                            <th scope="col">VacatureID</th>
                            <th scope="col">datum</th>
                            <th scope="col">bericht</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>12-01-2017</td>
                            <td>php</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>12-01-2017</td>
                            <td>php</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>12-01-2017</td>
                            <td>php</td>
                        </tr>
                        </tbody>
                    </table>
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
