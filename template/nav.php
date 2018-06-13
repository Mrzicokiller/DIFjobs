<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 20-5-2018
 * Time: 13:46
 */

include("login.php");

?>

    <a class="navbar-brand navigation-brand navigation-link" href="../pages/home.php">Dif Jobs</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link navigation-link" href="../pages/home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navigation-link" href="../pages/jobs.php">Vacatures</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navigation-link" href="../pages/account.php">Account</a>
            </li>

        </ul>

        <ul class="navbar-nav my-2 my-lg-0">
            <?php if(!isset($_SESSION['ID'])){?>
            <li class="nav-item">
                <a class="nav-link navigation-link" href="#" data-toggle="modal" data-target="#loginPopup">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navigation-link" href="../pages/signup.php">Registreren</a>
            </li>
            <?php }
            else{?>
                <li class="nav-item">
                <a class="nav-link navigation-link" href="../pages/logout.php" ID="logUitBtn">Uitloggen</a>
            </li>
            <?php }
            ?>
        </ul>
    </div>


