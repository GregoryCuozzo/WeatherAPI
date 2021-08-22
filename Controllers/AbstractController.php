<?php



class AbstractController
{



    public function index () {
        var_dump('no index');
    }

    public function create () {
        var_dump('no create');
    }

    public function edit ($id) {
        var_dump('no edit');
    }

    public function delete ($id) {
        var_dump('no delete');
    }

    public function show ($id) {
        var_dump('no show');
    }

    public function update($id, $data) {
        var_dump('no update');
    }

    public function insert ($id, $data) {
        var_dump('no store');
    }


}