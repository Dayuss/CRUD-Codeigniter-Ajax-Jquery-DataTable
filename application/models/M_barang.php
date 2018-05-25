<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {
	// ini dasar model untuk CRUD kita nanti.
	public function get($id = null){
		// $id di definisikan null karena tidak selalu dipakai
		if($id)
			$this->db->where('id_barang', $id);

		$res = $this->db->get('tbl_barang')->result();
		if($res)
			return $res;
		else
			return false;
	}

	public function insert($data=array()){
		$this->db->set($data);
		$this->db->insert('tbl_barang');
		return $this->db->insert_id();
	}

	public function update($data=array(),$id){
		$this->db->set($data);
    $this->db->where('id_barang', $id);
    return $this->db->update('tbl_barang');
	}

	public function delete($id){
		if (!$id) {
          return FALSE;
    }
    $this->db->where('id_barang', $id);
    $this->db->limit(1);
    return $this->db->delete('tbl_barang');
	}
}
