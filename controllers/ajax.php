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
    public function city()
    {
         $data = $this->model->city();
         return $data;
    }
    public function district()
    {
         $data = $this->model->district();
         return $data;
    }
}