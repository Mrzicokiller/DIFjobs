<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 24-5-2018
 * Time: 11:48
 */
session_start();

if (isset($_SESSION['ID'])) {
    include_once('../config.php');

    //haal ID op uit session
    $ID = $_SESSION['ID'];

    //query's om te checken wat voor soort gebruiker de account pagina wil bereiken
    $bedrijfQuery = $mysqli->query("SELECT count(b.ID) AS 'count' FROM gebruiker g
                              JOIN bedrijf b ON g.ID = b.ID
                              WHERE b.ID = " . $ID);

    $particulierQuery = $mysqli->query("SELECT count(p.ID) AS 'count' FROM gebruiker g
                              JOIN particulier p ON g.ID = p.ID
                              WHERE p.ID = " . $ID);

    $studentQuery = $mysqli->query("SELECT count(s.ID) AS 'count' FROM gebruiker g
                              JOIN student s ON g.ID = s.ID
                              WHERE s.ID = " . $ID);




    //maak booleans en check of het een bedrijf is
    $is_bedrijf = false;
    $is_particulier = false;
    $is_student = false;

    if ($bedrijfQuery->fetch_object()->count > 0) {
        $is_bedrijf = true;

        $bedrijfGegevensQuery = $mysqli->query("SELECT * FROM bedrijf WHERE ID = " . $ID);

        $bedrijfsgegevens = $bedrijfGegevensQuery->fetch_array();


        $bedrijfsnaam;
        $bedrijfURL;
        $bedrijfTel;

        while ($rij = $bedrijfsgegevens){
            $bedrijfsnaam = $rij['naamBedrijf'];
            $bedrijfURL = $rij['webstieUrl'];
            $bedrijfTel= $rij['tel_nummer'];
        }
    }

    //check of het een particulier is
    if ($particulierQuery->fetch_object()->count > 0) {
        $is_particulier = true;

        $particulierGegevensQuery = $mysqli->query("SELECT * FROM particulier WHERE ID = " . $ID);

        $particulierTel = $particulierGegevensQuery->fetch_object()->tel_nummer;


    }

    //check of het een student is
    if ($studentQuery->fetch_object()->count > 0) {
        $is_student = true;

        $studentGegevensQuery = $mysqli->query("SELECT * FROM student WHERE ID = " . $ID);


        $specialisatie = $studentGegevensQuery->fetch_object()->Specialisatie;

    }

    ?>
    <html>
    <head>
        <?php
        include("../template/header.php");
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

                                <?php
                                if ($is_bedrijf || $is_particulier) { ?>

                                    <li class='nav-item'>
                                        <a class='nav-link' id='jobsTab' href='#'>Vacatures</a>
                                    </li>

                                <?php }

                                if ($is_student) { ?>

                                    <li class='nav-item'>
                                        <a class='nav-link' id='responseTab' href='#'>Reacties</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body" id="dataBody">
                        <h1 class="card-title">Gegevens</h1>

                        <h3>persoonlijke gegevens:</h3>
                        <form name="changeName" action="../POST/updateUserData.php" method="post">

                            <div class="form-group">
                                <label for="naam">Naam:</label>
                                <input type="text" class="form-control" id="naam" placeholder="John Doe" value="<?php echo $_SESSION['name']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $_SESSION['email']; ?>"
                                       required>
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <hr/>

                        <h3>wachtwoord veranderen:</h3>
                        <form name="changePassword" action="../POST/updateUserData.php" method="post">

                            <div class="form-group">
                                <label for="password">Wachtwoord*</label>
                                <input type="password" class="form-control" id="password" placeholder="Wachtwoord"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="confirmPassword">Herhaal Wachtwoord*</label>
                                <input type="password" class="form-control" id="confirmPassword"
                                       placeholder="Wachtwoord" required>
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <?php if ($is_student) { ?>
                            <!-- forms als gebruiker student is -->
                            <h3>Specialisatie:</h3>
                            <form name="specialisatie" action="../POST/updateUserData.php?T=student" method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="specialisatie" value="<?php echo $specialisatie; ?>"
                                           placeholder="C# developer">
                                </div>
                                <br/>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        <?php }

                        if ($is_bedrijf) {
                            ?>

                            <!-- form als gebruiker bedrijf is -->
                            <h3>Bedrijfsgegevens:</h3>
                            <form name="bedrijfsgegevens" action="../POST/updateUserData.php?T=bedrijf" method="post">
                                <div class="form-group">
                                    <label for="Bedrijfsnaam">Bedrijfsnaam:</label>
                                    <input type="text" class="form-control" id="Bedrijfsnaam"
                                           placeholder="Dif jobs developer">
                                </div>

                                <div class="form-group">
                                    <label for="webURL">Website:</label>
                                    <input type="url" class="form-control" id="webURL" placeholder="www.difjobs.nl">
                                </div>

                                <div class="form-group">
                                    <label for="phoneNumber">Telefoonnummer:</label>
                                    <input type="url" class="form-control" id="phoneNumber" placeholder="0612345678">
                                </div>

                                <br/>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        <?php }
                        if ($is_particulier) {
                            ?>
                            <!-- form als gebruiker particulier is -->
                            <h3>Telefoonnummer:</h3>
                            <form name="telefoonnummer" action="../POST/updateUserData.php?T=particulier" method="post">

                                <div class="form-group">
                                    <label for="phoneNumber">Telefoonnummer:</label>
                                    <input type="url" class="form-control" id="phoneNumber" placeholder="0612345678">
                                </div>

                                <br/>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        <?php } ?>

                    </div>

                    <?php if ($is_bedrijf || $is_particulier) { ?>
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
                    <?php } ?>

                    <?php if ($is_student) { ?>
                        <div class="card-body" id="responseBody" hidden>

                            <!-- alleen studenten-->
                            <h1 class="card-title">Reactie</h1>

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
                    <?php } ?>
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
            if (!$('#responseBody').attr('hidden') || !$('#jobsBody').attr('hidden')) {
                $('#jobsBody').attr('hidden', true);
                $('#responseBody').attr('hidden', true);
            }
        });

        $('#jobsTab').click(function () {
            $('#jobsTab').addClass('active');
            $('#responseTab').removeClass('active');
            $('#dataTab').removeClass('active');

            $('#jobsBody').removeAttr('hidden');

            if (!$('#dataBody').attr('hidden') || !$('#responseBody').attr('hidden')) {
                $('#responseBody').attr('hidden', true);
                $('#dataBody').attr('hidden', true);
            }
        });

        $('#responseTab').click(function () {
            $('#responseTab').addClass('active');
            $('#jobsTab').removeClass('active');
            $('#dataTab').removeClass('active');

            $('#responseBody').removeAttr('hidden');

            if (!$('#dataBody').attr('hidden') || !$('#jobsBody').attr('hidden')) {
                $('#jobsBody').attr('hidden', true);
                $('#dataBody').attr('hidden', true);
            }
        });
    </script>
    </body>
    </html>
    <?php
} else {

    header("location: home.php?er=true");
}
?>


