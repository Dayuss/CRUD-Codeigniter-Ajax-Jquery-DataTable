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

	public function store(){
		$data = $this->input->post();

		$res = $this->barang->insert($data);
		if($res)
			$msg = array("status" => "success", "msg" => "berhasil menambah barang.");
		else
			$msg = array("status" => "success", "msg" => "gagal menambah barang.");
			
		echo json_encode($msg, true);
	}

	public function update(){
		$data = $this->input->post();
		$id = $data['id'];
		unset($data['id']);

		$res = $this->barang->update($data, $id);
		if($res)
			$msg = array("status" => "success", "msg" => "berhasil mengubah barang.");
		else
			$msg = array("status" => "success", "msg" => "gagal mengubah barang.");
			
		echo json_encode($msg, true);
	}

	public function destroy(){
		$id = $this->input->post('id');

		$res = $this->barang->delete($id);
		if($res)
			$msg = array("status" => "success", "msg" => "berhasil menghapus barang.");
		else
			$msg = array("status" => "success", "msg" => "gagal menghapus barang.");
			
		echo json_encode($msg, true);
	}
}
