<?php

class Country
{
    private $id;
    private $country;
    private $city;


    public function __construct($id,$country,$city){

        $this->id = $id;
        $this->country = $country;
        $this->city = $city;


    }

    public function __get($prop){
        if (property_exists($this,$prop)){
            return $this->$prop;
        }
    }

    public function __set($prop,$value){
        if(property_exists($this,$prop)){
            $this->$prop = $value;
        }
    }


}