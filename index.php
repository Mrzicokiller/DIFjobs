<?php
/**
 * Created by PhpStorm.
 * User: zico_
 * Date: 20-5-2018
 * Time: 12:41
 */

$request_uri = explode("/", $_SERVER["REQUEST_URI"]);

switch ($request_uri[0]) {
    // Home page
    case '/':
        require 'pages/home.php';
        break;
    // Everything else
    default:
        header('HTTP/1.0 404 Not Found');
        require 'pages/404.php';
        break;
}
?>


