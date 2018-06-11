<?php
/**
 * Created by PhpStorm.
 * User: zico_
 * Date: 11-6-2018
 * Time: 14:18
 */
    session_start();
    include('../config.php');

    if($_POST['type'] == "vacature")
    {
        $titel = $_POST['titel'];
        $datum  =$_POST['datum'];
        $gebruikerID = $_POST['ID'];
        $vacature = $mysqli->query("SELECT * FROM vacature WHERE Titel = '$titel' AND Datum = '$datum' AND gebruikerID = '$gebruikerID'");
    }
?>
<html>
    <head>
        <?php include('../template/header.php') ?>
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
                <h1>Vacature wijzigen</h1>
                <hr/>
            </div>
        </div>

        <?php
        if($_SESSION["admin"] == 1) {
            ?>
            <div class="row ml-sm-2 mr-sm-2">
                <div class="col-lg-12">
                    <?php
                    if ($_POST['type'] == "vacature") {
                        ?>
                        <form name="postJobForm" id="signUpForm" action="../POST/jobpost.php" method="post">
                            <div class="form-group">
                                <label for="jobNaam">Titel</label>
                                <input type="text" name="jobNaam" class="form-control" id="jobNaam"
                                       value="<?php $vacature['titel'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="locatie">Locatie</label>
                                <input type="text" name="locatie" class="form-control" id="locatie"
                                       value="<?php $vacature['locatie'] ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="jobOmschrijving">Omschrijving</label>
                                <textarea class="form-control" id="jobOmschrijving" rows="3" maxlength="750"
                                          name="jobOmschrijving" value="<?php $vacature['beschrijving'] ?>"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default btn-block buttoncolorgray"><span
                                    class="glyphicon glyphicon-off"></span> Update
                            </button>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        else
        {
            echo "<h3>Je hebt geen toegang tot deze pagina.</h3>";
        }
        ?>
        ?>
    </body>
</html>
