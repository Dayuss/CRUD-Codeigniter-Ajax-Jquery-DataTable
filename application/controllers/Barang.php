<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array("M_barang"=>"barang"));
	}

	public function index()
	{
		$data = array(
			'title' 	=> "CRUD ajax",
			'page'		=> "barang/index"
		);
		
		$this->load->view("main", $data);
	}

	public function getbarang(){
		// disini kita buat json untuk barang
		$data = $this->barang->get();

		echo json_encode($data, true);
	}
}
