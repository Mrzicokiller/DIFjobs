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
            <form name="passwordResetForm" onsubmit="resetPassword();">
                <label for="emailInput">Vul hier je email adres in.</label>
                <input id="emailInput" type="email" class="form-control" required>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            <h3 id="reactie"></h3>
        </div>
    </div>

</div>
<script>
    function resetPassword()
    {
        var email = $('#emailInput').val();

        $.post("../POST/email_check.php", {
                email: $("#email").val()
            },
            function (result)
            {
                if (result == 1) {
                    $('#reactie').val('Deze email bestaat niet in onze database.');
                }
                else {
                    $.post('../POST/password_reset',{
                            email: email
                        },
                        function (result2) {
                            $('#reactie').val(result2);
                        });
                }

            });
    }
</script>
</body>
</html>

