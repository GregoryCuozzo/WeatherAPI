<?php

class FavoriteController extends AbstractController
{
    public function __construct(){
        $this->dao = new CountryDAO();
    }

    public function index(){
        $country = $this->dao->fetchAll();


        include('../Views/favorites.php');


}

}