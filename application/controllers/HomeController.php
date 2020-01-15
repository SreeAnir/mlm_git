<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class HomeController extends CI_Controller {

 	public function __construct()

        {

                parent::__construct();

				$this->load->model(['ProductModel','CategoryModel']);


        }


	public function index() 

	{

		// $this->SessionModel->is_logged_in();
		$this->load->view('home/product');

	}
	public function product_grid(){
		$products=$this->ProductModel->DropDownProducts();
		$data=array();
		$data['products']=$products;
		// $this->SessionModel->is_logged_in();

		$this->load->view('home/product_grid',$data);

	}

}

