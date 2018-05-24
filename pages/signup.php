<html>
<head>
    <?php
    /**
     * Created by PhpStorm.
     * User: mmoer
     * Date: 5/23/2018
     * Time: 11:45 AM
     */
    include("../template/header.php");
    ?>
</head>

<body>
<div class="container-fluid pl-0 pr-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <?php
            include('../template/nav.php');
            ?>
        </nav>
    <div class="row mx-auto">
        <div class="col-sm-6">
            <form name="signupForm" id="signUpForm" action="../POST/signup.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Voorbeeld@info.nl" required>
                </div>

                <div class="form-group">
                    <label for="signUpPassword">Wachtwoord</label>
                    <input type="password" class="form-control" id="signUpPassword" placeholder="Wachtwoord" required>
                </div>

                <div class="form-group">
                    <label for="signUpconfirmPassword">Herhaal Wachtwoord</label>
                    <input type="password" class="form-control" id="signUpconfirmPassword" placeholder="Wachtwoord" required>
                    <small id="passwordError" class="redLetters">Het wachtwoord is niet hetzelfde.</small>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="avgCheck" required>
                    <label class="form-check-label" for="avgCheck">Accepteerd u dat wij uw gegevens mogen opslaan.(Deze zullen wij niet delen met een derde.)</label>

                </div>
                <button type="submit" class="btn btn-primary">Registreren</button>
            </form>
        </div>
    </div>
</div>
<script>
    //alles uitvoeren als het document geladen is
    $(document).ready(function(){
        $("#passwordError").hide();
    });

    //wachtwoord vergelijken
    $("#signUpForm").submit(function(e)
    {
        if($("#signUpPassword").val() !== $("#signUpconfirmPassword").val())
        {
            e.preventDefault();
            $("#passwordError").show();
        }
    });
</script>
</body>
<footer>
    <?php
    include("../template/footer.php");
    ?>
</footer>
</html>
