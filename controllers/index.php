<?php

class Index extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data = $this->model->index();
        $this->view->render('index/index', $data);
    }
}