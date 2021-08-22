<?php

class UserDAO extends AbstractDAO
{
    public function __construct () {

        parent::__construct('users');
    }



    function create ($result) {
        return new User(
            $result['id'],
            $result['username'],
            $result['pwd'],
            $result['email'],
            $result['session_token'],
            $result['session_time']


        );
    }


    function deepCreate ($result) {
        return new User(
            $result['id'],
            $result['username'],
            $result['pwd'],
            $result['email'],
            $result['session_token'],
            $result['session_time']


        );
    }
    public function createNew ($result) {
        return new User(
            $result['id'],
            $result['username'],
            $result['pwd'],
            $result['email'],
            $result['session_token'],
            $result['session_time']
        );
    }

    function delete($id) {
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

        $query= $this->connection ->query("INSERT INTO users(username,pwd,email)VALUES('$username','$password','$email')");


    }

    function throwError($error_number)
    {
        header("Location: /Login.php?error=" .$error_number);

    }


    public function verify ($data) {

        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE username = ?");
            $statement->execute([
                $data['username']
            ]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            $user = $this->createNew($result);
            if($user) {

                if(password_verify($data['password'], $user->password)) {
                    var_dump('user is ok');
                    $user = $this->setToken($user);
                    return $user;
                }
            }
            var_dump('incorrect password ');
            $this->throwError("error3");

            return false;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function update($id, $data){
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

        try {
            $statement = $this->connection->prepare(
                "UPDATE {$this->table} SET username = ?,pwd = ?, email= ?,  WHERE id = ?");
            $statement->execute([
                htmlspecialchars($data['username']),
                $password,
                htmlspecialchars($data['email']),
                htmlspecialchars($data['id']),


            ]);
        } catch (PDOException $e) {
            print $e->getMessage();
        }

    }

    public function setToken($user) {

        $token = bin2hex(random_bytes(8)) . "." . time();
        $user->session_token = $token;
        setcookie('session_token', $token, time()+60*60*24, "/");
        $this->updateToken($user);
        return $user;
    }

    public function updateToken ($user) {
        try {
            $statement = $this->connection->prepare("UPDATE {$this->table} SET session_token = ? WHERE id = ?");
            $statement->execute([
                $user->session_token,
                $user->id
            ]);
            return true;
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function fetchBySession($session_token) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE session_token = ?");
            $statement->execute([$session_token]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $this->deepCreate($result);
        } catch (PDOException $e) {
            print $e->getMessage();
            return false;
        }
    }

    public function getUserById($id)
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

    public function getIdByUsername($username)
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