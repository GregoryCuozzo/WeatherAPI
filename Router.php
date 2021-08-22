<?php

class Router {

    private $get;
    private $post;
    private $controllers;
    private $data;
    private $request;
    private $actions;

    public function __construct() {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->actions = ['index','login','board','create','register','members','delete','update','edit','store'];
        $this->controllers = ['index'=>'HomeController','login'=>'UserController','create'=>'HomeController',
                                'user'=>'HomeController','logout'=>'LogoutController','country'=>'CountryController'];
        $this->request = array();
        $this->data = $this->parseURI($_SERVER['REQUEST_URI']);
        $this->dispatch();
        $this->run();
    }

    private function parseURI ($server_uri) {

        if (strpos( $server_uri, "?")) {
            $server_uri = strstr($server_uri, '?', true);
        }

        $server_uri = explode("/", substr($server_uri, 1));
        return $server_uri;
    }

    private function dispatch () {

        if (!array_key_exists($this->data[0], $this->controllers)) {
            $this->data[0] = 'index';
        }
        $this->request['controller'] = $this->controllers[$this->data[0]];


        if (count($this->data) >= 2 && $this->data[1]) {
            if(!in_array($this->data[1], $this->actions)) {
                echo "ERR : ACTION NOT FOUND";
                die;
            }

            $this->request['action'] = $this->data[1];
        } else {
            $this->request['action'] = "index";
        }


        if (count($this->data) >= 3 && $this->data[2]) {
            $this->request['id'] = $this->data[2];

        } else {
            $this->request['id'] = false;
        }


        if ($this->post && count($this->post)) {
            $this->request['method'] = 'post';
        } else {
            $this->request['method'] = 'get';
        }

    }

    private function run () {

        $this->controller_instance = new $this->request['controller'];

        $data = $this->get;
        if($this->request['method'] == 'post')  {
            $data = $this->post;
        }

        $this->controller_instance->{$this->request['action']}($this->request['id'], $data);

    }
}