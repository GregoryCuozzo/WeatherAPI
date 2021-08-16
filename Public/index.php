<?php
spl_autoload_register ( function ($class) {
    if ($class === "Router") {
        include '../Router.php';
    } else if ( strpos( $class, "Controller")) {
        include "../Controllers/{$class}.php";
    } else if ( strpos ( $class, "DAO")) {
        include "../Models/DAO/{$class}.php";
    } else {
        include "../Models/Entities/{$class}.php";
    }
});

$router = new Router();
