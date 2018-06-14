<?php
/**
 * Created by PhpStorm.
 * User: zico_
 * Date: 13-6-2018
 * Time: 12:08
 */

include_once('../config.php');
include_once ('../assets/php/code_generator.php');

if(!isset($_GET['email']))
{
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($mysqli, $email);


    $verifiedCode = code_generator(10);

//variable voor de email
    $subject = "Wachtwoord resetten";
    $message =
        '<html>
        <head>
            <title>Email bevestigen</title>
        </head>
        <body>
            <p>Druk op de onderstaande link om je email de te rifiëren.</p><br/>
            <a href="localhost/password_reset.php?email=' . $email . '&code=' . $verifiedCode . '">Email verifiëren</a>       
        </body>
     </html>
    ';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <briefjesboord@test.nl>' . "\r\n";

    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        if($mysqli->query("UPDATE gebruiker SET verifiedCode = '$verifiedCode' WHERE email = '$email'"))
        {
            echo "Er is een email gestuurd met een link";
        }
        else
        {
            echo "Er is iets fout gegaan. Neem contact op met de beheerder";
        }
    }
}
else
{
    ?>

    <!DOCTYPE html>
<html lang="nl">
<head>
    <?php
    session_start();
    include("../template/header.php")
    ?>
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
            <h1>Wachtwoord Resetten</h1>
            <hr/>
        </div>
    </div>

    <div class="row ml-sm-2 mr-sm-2">
        <div class="col-lg-12">
            <h3 id="errorReset" class="redLetters" hidden>Er is iets fout gegaan. Neem contact op met de beheerder.</h3>
            <h3 id="succesReset" class="greenLetters" hidden>Het is gelukt om je wachtwoord te veranderen.</h3>
            <form name="newPasswordForm" onsubmit="resetPassword();">
                <div class="form-group">
                    <label for="passwordReset">Vul hier je nieuwe wachtwoord adres in.</label>
                    <input id="passwordReset" type="password" class="form-control" placeholder="Wachtwoord" required>
                </div>

                <div class="form-group">
                    <label for="passwordReset2">Herhaal Wachtwoord</label>
                    <input type="password" class="form-control" id="passwordReset2" placeholder="Wachtwoord" required>
                    <small id="passwordError" class="redLetters">Het wachtwoord is niet hetzelfde.</small>
                </div>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            <h3 id="reactie"></h3>
        </div>
    </div>

</div>
<script>

    function resetPassword()
    {
        //wachtwoorden vergelijken
        if ($("#passwordReset").val() !== $("#passwordReset2").val())
        {
            $("#passwordError").show();
        }
        else
        {
            $.post("../POST/updateUserData.php?type=password", {
                    pass: $("#passwordReset").val()
                },
                function (result) {
                    if (result == 1) {
                        $('#succesReset').show();
                    }
                    else {

                        $('#errorReset').show();
                    }

                });
        }
    }
</script>
</body>
</html>

<?php
}
?>

