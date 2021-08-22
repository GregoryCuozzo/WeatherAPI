<?php

class CountryController extends AbstractController
{

    public function __construct()
    {
        $this->dao = new CountryDAO();

    }

    public function store ($result) {

        $this->dao->store($result);




    }






}