<!--Modal voor de login-->
<div class="modal fade" id="loginPopup" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <form role="loginform" method="POST" action="../POST/login.php">
                    <div class="form-group">
                        <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="loginEmail"
                               placeholder="voer email in" required>
                        <small id="loginEmailError" class="redLetters" hidden>Dit emailadres is niet bekend.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Wachtwoord</label>
                        <input type="password" class="form-control" id="loginWachtwoord" name="loginWachtwoord"
                               placeholder="voer wachtwoord in" autocomplete="off" required>
                        <small id="loginPasswordError" class="redLetters" hidden>Dit wachtwoord is incorrect</small>
                    </div>
                    <button onclick="submitForm();" type="button" class="btn btn-primary">Inloggen</button>
                </form>
            </div>
            <div class="modal-footer">
                Wachtwoord vergeten? <a class="btn btn-link" href="../pages/wachtwoord_reset.php">Klik dan hier.</a>
            </div>
        </div>
    </div>
</div>

<script>
    //variables
    var checkEmailDone = false;
    var checkPasswordDone = false;

    //alles uitvoeren als het document geladen is
    $("#loginEmailError").hide();
    $("#loginPasswordError").hide();


    //input velden checken
    function submitForm() {

        $("#loginEmailError").hide();
        $("#loginPasswordError").hide();


        if (checkEmailDone !== true || checkPasswordDone !== true) {

            //bestaat de email al
            if ($("#loginEmail").val().length > 0) {
                $.post("../POST/email_check.php", {
                        email: $("#loginEmail").val()
                    },
                    function (result) {
                        if (result == 1) {
                            checkEmailDone = true;
                            $("#loginEmailError").hide();
                        }
                        else {
                            $("#loginEmailError").show();
                            checkEmailDone = false;
                        }

                    });
            }else{
                $("#loginEmailError").show();
            }


            //wachtwoorden vergelijken
            if ($("#loginWachtwoord").val().length > 0) {
                checkPasswordDone = true;
            }
            else {
                $("#loginPasswordError").show();
                checkPasswordDone = false;
            }

        }

        if (checkEmailDone === true && checkPasswordDone === true) {
            $("#loginform").submit();
        }
    }
</script>