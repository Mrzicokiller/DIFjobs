<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 7-6-2018
 * Time: 13:55
 */
session_start();

if (isset($_SESSION['ID'])) {

    require_once("../config.php");


//haal gegevens op uit GET en SESSION
    $title = $_GET['titel'];

    $date = str_replace("_", " ", $_GET['datum']);
    $date = date_format(new DateTime($date), "Y-m-d h:i:s");
    $userID = $_SESSION['ID'];

//maak query om gegevens uit vacature te halen
    $vacatureQuery = $mysqli->query("SELECT * FROM vacature WHERE Titel = " . $title . "AND Datum = " . $date . " AND gebruikerID = " . $userID);


    while ($rij = $vacatureQuery->fetch_array()) {
        $beschrijving = $rij['Beschrijving'];
        $locatie = $rij['Locatie'];
        $functie = $rij['Functie'];
    }

    $mysqli->close();

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
            <div class="col-lg-6">
                <div class="form-group col-lg-2">
                    <label for="title">Titel:</label>
                    <input type="text" class="form-control" id="title" placeholder="stage plek C#"
                           value="<?php echo $title; ?>" required>
                </div>

                <div class="form-group col-lg-2">
                    <label for="job">Functie:</label>
                    <input type="text" class="form-control" id="job" placeholder="php programeur"
                           value="<?php echo $functie; ?>" required>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group col-lg-2">
                    <label for="location">Locatie:</label>
                    <input type="text" class="form-control" id="location" placeholder="Zoetermeer"
                           value="<?php echo $locatie; ?>" required>
                </div>

                <div class="form-group col-lg-4">
                    <label for="discription">Beschrijving:</label>
                    <textarea class="form-control" id="discription" maxlength="750"
                              required><?php echo $beschrijving; ?></textarea>
                </div>
            </div>
    </body>
    </html>
    <?php
} else {
    header("Location: home.php");
}
?>
