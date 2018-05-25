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
			// title di header
			'title' 	=> "CRUD ajax",
			// halaman untuk barang
			'page'		=> "barang/index"
		);
		$this->load->view("main", $data);
	}

	public function getbarang(){
		// disini kita buat json untuk barang
		if($this->uri->segment(3))
			$data = $this->barang->get($this->uri->segment(3));
		else
			$data = array("data" =>$this->barang->get());
		
		echo json_encode($data,true);
	}

}
