<?php

class Ajax extends Controller
{
	public function __construct()
	{
        parent::__construct();
	}
    public function index($data)
    {
        $da = json_encode($data);
        echo $da;
    }
    public function getCity()
    {
         $data = $this->model->getCity();
         return $data;
    }
    public function getDistrict()
    {
         $data = $this->model->getDistrict();
         return $data;
    }
}