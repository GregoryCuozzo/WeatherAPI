<?php

class Country
{
    private $id;
    private $data;




    public function __construct($id,$data){

        $this->id = $id;
        $this->data = $data;



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