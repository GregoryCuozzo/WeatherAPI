<?php

class CountryDAO extends AbstractDAO
{
    public function __construct () {

        parent::__construct('country');
    }


    function create ($result) {
        return new Country(
            $result['id'],
            $result['ville'],
            $result['pays']



        );
    }
    public function fetchAll () {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $this->createAllDeep($result);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }


    function deepCreate ($result) {
        return new Country(
            $result['id'],
            $result['ville'],
            $result['pays'],
            $result['User_ID']
        );
    }
    public function createNew ($result) {
        return new Country(
            $result['id'],
            $result['ville'],
            $result['pays']
        );
    }

    function delete ($id) {
        var_dump($id);
        if(empty($id)){
            return false;
        }

        try {
            $statement = $this->connection->prepare("DELETE FROM {$this->table} WHERE id = ?");
            $statement->execute([
                $id
            ]);
        } catch(PDOException $e) {
            print $e->getMessage();
        }
    }

    function store ($result) {

        $country = $this->create(
            [
                'id'=> 0,
                'ville'=> $result['ville'],
                'pays' => $result['pays'],

            ]
        );
        if($country){
            try {
                $statement = $this->connection->prepare("INSERT INTO {$this->table} (ville, pays) VALUES (?,?)");
        $statement->execute([
            htmlspecialchars($country->ville),
            htmlspecialchars($country->pays)
        ]);
        return true;
    } catch(PDOException $e) {
        print $e->getMessage();
        return false;
    }
        }
    }






    public function update($id, $data){

        try {
            $statement = $this->connection->prepare(
                "UPDATE {$this->table} SET username = ?, email= ? WHERE id = ?");
            $statement->execute([
                htmlspecialchars($data['username']),
                htmlspecialchars($data['email']),
                htmlspecialchars($data['id'])

            ]);
        } catch (PDOException $e) {
            print $e->getMessage();
        }

    }




    public function getCountryById($id)
    {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE id = ?");
            $statement->execute([
                $id
            ]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->create($result);
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }

    public function getIdByCountry($username)
    {
        try {
            $statement = $this->connection->prepare("SELECT id FROM {$this->table} WHERE username = ?");
            $statement->execute([
                $username
            ]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }



}