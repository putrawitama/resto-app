<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	/**
	 * Default method
	 */

	protected $role;

	public function __construct()
	{
	    parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('allmodels');
		$this->load->library('session');

		if(!$this->session->userdata('logged_in')){
			redirect(base_url("login"));
		}

		if($this->session->userdata('admin')){
			$this->role = $this->session->userdata('admin');
		} 
	}

	public function getTransaksi()
	{
		$trans = $this->allmodels->transaksi()->result();

		$data = [
			'trans' => $trans
		];
		return view('admin.transaksi.index', $data);
	}
	
	public function getTransaksiNow()
	{
		$trans = $this->allmodels->transaksi(true)->result();

		$data = [
			'trans' => $trans
		];
		return view('admin.transaksi.transCurrent', $data);
    }
    
    public function getDetail($id)
    {
        $trans = $this->allmodels->fulltrans($id)->result();

        $data = [
            'trans' => $trans,
		];
		
		// echo '<pre>';
		// var_dump($data);
        return view('admin.transaksi.detail', $data);
	}

	public function getSelesai($id)
	{
		$trans = $this->allmodels->getData('transaksi', ['id'=>$id])->row();
		if($trans == null){
			show_404();
		}

		$data = [
			'status_pembayaran' => 1
		];

		$this->allmodels->updateData('transaksi', ['id'=>$id], $data);

		$meja = [
			'status' => 1
		];

		$this->allmodels->updateData('meja', ['id'=>$trans->meja_id], $meja);

		redirect('transaksi/now', 'refresh');
	}

	public function getCurrent()
	{
		return view('admin.transaksi.current');
	}

	public function getCurrentApi()
	{
		$output = '';
		$no = 0;
		$menu = $this->allmodels->detailTrans()->result();
        foreach ($menu as $items) {
            $no++;
            $output .='
			<div class="card mb-3">
				<div class="card-body">
					<div class="row">
						<div class="col-md-5">
							<h3>'.$items->nama_menu.'</h3>
						</div>
						<div class="col-md-2 text-center">
							<h2>'.$items->jumlah_pesanan.' Porsi</h2>
						</div>
						<div class="col-md-5 text-right">
							<form action="/change-status" method="post">
								<input type="hidden" name="item" value="'.$items->id.'">
								<button type="submit" class="btn btn-success">Selesai</button>
							</form>
						</div>
					</div>
				</div>
			</div>
            ';
		}
		// echo $output;
        echo $output;
	}

	public function postChange()
	{
		$item = $this->input->post('item');

		$data = [
			'status' => 1,
		];

		$this->allmodels->updateData('detailtransaksi', [ 'id' => $item], $data);

		redirect('current', 'refresh');
	}
}
