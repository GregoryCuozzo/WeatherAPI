<?php


class LogoutController extends AbstractController
{
    public function index(){
        session_start();
        session_destroy();
        include('../Views/Login.php');
    }

}