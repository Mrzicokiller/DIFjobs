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
        <h1>Registreren</h1>
            <form>
                <label for="emailinput">Email</label>
                <input type="text" name="email" id="emailinput">
                <br>
                <label for="passwordinput">Password</label>
                <input type="text" name="password" id="passwordinput">
            </form>
    </body>
    <footer>
        <?php
        include("../template/footer.php");
        ?>
    </footer>
</html>
