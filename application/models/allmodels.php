<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllModels extends CI_Model {

	//ambil semua data (select *)
	public function getAll($table){
		return $this->db->get($table);
	}

	//ambil data bersyarat (edit, delete, show detail)
	public function getData($table, $where){
		return $this->db->get_where($table, $where);
	}

	public function detailTrans(){
		$this->db->select('d.*, m.nama_menu');
		$this->db->from('detailtransaksi d'); 
		$this->db->join('menu m', 'm.id = d.menu_id', 'left');
		$this->db->where('d.status', '=', 0);
		return $this->db->get();
	}

	//simpan data (store)
	public function storeData($table, $data){
		$this->db->insert($table, $data);
	}

	//simpan data edit (update)
	public function updateData($table, $where, $data){
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	//hapus data
	public function deleteData($table, $where){
		$this->db->where($where);
		$this->db->delete($table);
	}

	// join tabel berdasarkan transaksi
	public function fulltrans($id){
		$this->db->select('t.id as transID, t.total_harga, t.tgl_trans, t.status_pembayaran, d.id as detailID, d.status, d.jumlah_pesanan, d.total, m.id as menuID, m.nama_menu, m.harga, j.id as mejaID, j.no_meja');
		$this->db->from('menu m'); 
		$this->db->join('detailtransaksi d', 'm.id = d.menu_id', 'left');
		$this->db->join('transaksi t', 't.id = d.trans_id', 'left');
		$this->db->join('meja j', 'j.id = t.meja_id', 'left');
		$this->db->where('t.id', $id);
		return $this->db->get();
	}

	public function transaksi($status = false){
		$this->db->select('t.id, m.no_meja, t.total_harga, t.tgl_trans, t.status_pembayaran');
	   	$this->db->from('transaksi t');
		$this->db->join('meja m', 'm.id = t.meja_id', 'left');

		if ($status) {
			$this->db->where('t.status_pembayaran', '=', 0);
		}

		$this->db->order_by('tgl_trans', 'desc');
	   	return $this->db->get();
   	}

}
?>