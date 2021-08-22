<?php

class Country
{
    private $id;
    private $ville;
    private $pays ;
    private $user_id ;




    public function __construct($id,$ville,$pays, $user_id= false){

        $this->id = $id;
        $this->ville = $ville;
        $this->pays =$pays;
        $this->user_id =$user_id;



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