<?php

class CountryDAO
{
    public function __construct () {

        parent::__construct('country');
    }


    function create ($result) {
        return new User(
            $result['id'],
            $result['country'],
            $result['city'],
            $result['user']

        );
    }


    function deepCreate ($result) {
        return new User(
            $result['id'],
            $result['country'],
            $result['city'],
            $result['user']
        );
    }
    public function createNew ($result) {
        return new User(
            $result['id'],
            $result['country'],
            $result['city'],
            $result['user']
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

        if(empty($data['country']) || empty($data['city']) || empty($data['user'])) {
            return false;
        }

        $country = $this->create(
            [
                'id'=> 0,
                'country'=> $data['name'],
                'city' => $data['image'],
                'user_id'=> $data['pokemon_id']

            ]
        );

        if ($country) {
            try {
                $statement = $this->connection->prepare(
                    "INSERT INTO {$this->table} (country, city, user) VALUES (?, ?, ?, ?)"
                );
                $statement->execute([
                    htmlspecialchars($country->name),
                    htmlspecialchars($country->image),
                    htmlspecialchars($pokemon->pokemon_id),
                    htmlspecialchars($pokemon->user),
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