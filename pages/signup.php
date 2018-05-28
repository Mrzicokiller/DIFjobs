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
    <nav class="navbar navbar-expand-lg bg-dark">
        <?php
        include('../template/nav.php');
        ?>
    </nav>
    <div class="row pt-3 pl-3">
        <div class="col-lg-12">
            <h1>Registreren</h1>
            <hr/>
        </div>
    </div>
    <div class="row pt-2 pl-3">
        <div class="col-sm-6 " style="border-right: 1px solid; border-color: darkgray;">
            <form name="signupForm" action="../POST/signup.php" method="post">
                <div class="form-group">
                    <label for="email">Email Addres*</label>
                    <input type="email" class="form-control" id="email" placeholder="Voorbeeld@info.nl" required>
                </div>

                <div class="form-group">
                    <label for="password">Wachtwoord*</label>
                    <input type="password" class="form-control" id="password" placeholder="Wachtwoord" required>
                </div>

                <div class="form-group">
                    <label for="confirmPassword">Herhaal Wachtwoord*</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Wachtwoord" required>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="avgCheck" required>
                    <label class="form-check-label" for="avgCheck">Accepteerd u dat wij uw gegevens mogen opslaan. <br/>
                        (Deze zullen wij niet delen met een derde.)*</label>

                </div>
                <br/>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
<footer>
    <?php
    include("../template/footer.php");
    ?>
</footer>
</html>
