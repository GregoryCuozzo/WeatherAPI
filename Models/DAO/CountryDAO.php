<?php

class CountryDAO
{
    public function __construct () {

        parent::__construct('users');
    }


    function create ($result) {
        return new User(
            $result['id'],
            $result['country'],
            $result['city']

        );
    }


    function deepCreate ($result) {
        return new User(
            $result['id'],
            $result['country'],
            $result['city']
        );
    }
    public function createNew ($result) {
        return new User(
            $result['id'],
            $result['country'],
            $result['city']

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

    function store ($data) {
        $username = htmlspecialchars($_POST['username']);
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $email = htmlspecialchars($_POST['email']);

        $query= $this->connection ->query("INSERT INTO countries(country,city,)VALUES('$username','$password','$email')");


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