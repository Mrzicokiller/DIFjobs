<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 20-5-2018
 * Time: 13:46
 */
?>

<a class="navbar-brand" href="#">Briefjesboord</a>
<button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="col-sm-9 text-left">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../pages/home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/jobs.php">Vacatures</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/account.php">Account</a>
            </li>
        </ul>
    </div>
    <div class="col-sm-3">
        <ul class="navbar-nav" id="login-buttons">
            <li class="nav-item">
                <a class="nav-link" href="#" ID="loginBtn">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../pages/signup.php">Registreren</a>
            </li>
        </ul>
    </div>
</div>

<?php
include("login.php");
?>