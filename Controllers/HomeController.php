<?php
session_start();
include("../Controllers/functions.php");

class HomeController extends AbstractController
{


    public function index(){

        include('../Views/Login.php');
    }

    public function __construct()
    {
        $this->dao = new UserDAO();
    }





    // ------------------------------  Users' board display ------------------------------------------------------------

    public function board(){
        $user = $this->dao->fetchAll();
        $_SESSION['expire'] = time() + (1 * 60);
        $now=time();

        if(!empty($_SESSION['username'])){
            include('../Views/UsersBoard.php');
        }elseif( $now > $_SESSION['expire']) {
            session_destroy();
            include('../Views/Login.php');
        }else{
            include('../Views/Login.php');
        }

        }

    public function boarda(){
        $user = $this->dao->fetchAll();
        $_SESSION['expire'] = time() + (1 * 60);
        $now=time();

        if(!empty($_SESSION['username'])){

            include('../Views/AdminBoard.php');
        }elseif( $now > $_SESSION['expire']) {
            session_destroy();
            include('../Views/Login.php');
        }else{
            include('../Views/Login.php');
        }

    }


    public function members(){
        $user = $this->dao->fetchAll();
        $_SESSION['expire'] = time() + (1 * 60);
        $now = time();
        if(!empty($_SESSION['username'])){
            if($_SESSION['username']== 'Admin2021'){
                include('../Views/MembersAdmin.php');
            }else{
                include('../Views/Members.php');
            }

        }elseif( $now > $_SESSION['expire']){
            session_destroy();
            include('../Views/Login.php');
        }else{
            include('../Views/Login.php');
        }

    }

    // ----------------------------- getting the registration page ----------------------------------------------------

    public function create(){

        include('../Views/Registration.php');
    }

    // ----------------------------------- error management ------------------------------------------------------------

    function throwError($error_number)
    {
        header("Location: /Login.php?error=" .$error_number);

    }

    function registerpass($pass_reg){

        header("Location:/Login.php?pass=" .$pass_reg);
    }
    function throwErrorreg($error_number)
    {
        header("Location: /registration.php/create?errorreg=" .$error_number);

    }


    // ----------------------------------- login management ------------------------------------------------------------


    public function login($id,$data){
        if (empty($_POST['username']) || empty($_POST['password']) or (empty($_POST['username'])
                and empty($_POST['password']))){
            $this->throwError("error1");
        }elseif(isset($_POST['username']) and isset($_POST['password'])) {
            $user = $this->dao->verify($data);
            if($user and $_POST['username'] != 'Admin2021'){
                session_start();
                $_SESSION['username']= $_POST['username'];
                $_SESSION['start']= time();
                $_SESSION['expire']=  $_SESSION['start'] + (1 * 60);
                header("Location:/user/board");
            }elseif ($user and $_POST['username'] == 'Admin2021'){
                $_SESSION['username']= $_POST['username'];
                $_SESSION['start']= time();
                $_SESSION['expire']=  $_SESSION['start'] + (1 * 60);
                header("Location:/user/boarda");
            }


        }
    }

    public function store ($id, $data) {
        $this->dao->store($data);
    }

    public function register($data){

        if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])
            or
            (empty($_POST['username']) and empty($_POST['password']) and empty($_POST['email']))){
            $this -> throwErrorreg("error1");
        }elseif(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email'])){
            if(!checkFormatMail($_POST['email'])){
                $this->throwErrorreg("error3");
            }elseif(!checkUserName($_POST['username'])){
                $this->throwErrorreg("error4");
            }else{
                $this-> store(false,$data);
                $this->registerpass("your profil has been registered");
            }

        }
    }

    public function fetch ($data){

        $this->dao ->getIdByUsername();
    }

    public function delete($id)
    {
        $this->dao->delete($id);
        header('Location:/user/members');
    }

    public function edit($id)
    {
        $UserDao = new UserDAO();
        $User = $UserDao->getUserById($id);
        include('../Views/MemberEdition.php');

    }

    public function update($id,$data){


        if(empty($_POST['username']) ||  empty($_POST['email'])
            or
            (empty($_POST['username'])  and empty($_POST['email']))){
            $this -> throwErrorup("error1");
        }elseif(isset($_POST['username']) and  isset($_POST['email'])){
            if(!checkFormatMail($_POST['email'])){
                $this->throwErrorup("error3");
            }elseif(!checkUserName($_POST['username'])){
                $this->throwErrorup("error4");
            }else{
                $UserDAO = new UserDAO();
                $User = $UserDAO->update($id,$data);
                include('../Views/MemberEdition.php');
            }

        }
    }

    function throwErrorup($error_number)
    {
        header("Location: /MemberEdition.php/edit?errorup=" .$error_number);

    }





}