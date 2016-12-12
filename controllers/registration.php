<?php

class Registration extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data = $this->model->signUp();
        $this->view->render('registration/index', $data);
    }
}