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
		$this->load->model('all_model');
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
		$trans = $this->all_model->transaksi()->result();

		$data = [
			'trans' => $trans
		];
		return view('admin.transaksi.index', $data);
	}
	
	public function getTransaksiNow()
	{
		$trans = $this->all_model->transaksi(true)->result();

		$data = [
			'trans' => $trans
		];
		return view('admin.transaksi.transCurrent', $data);
    }
    
    public function getDetail($id)
    {
        $trans = $this->all_model->fulltrans($id)->result();

        $data = [
            'trans' => $trans,
		];
		
		// echo '<pre>';
		// var_dump($data);
        return view('admin.transaksi.detail', $data);
	}

	public function getSelesai($id)
	{
		$trans = $this->all_model->getData('transaksi', ['id'=>$id])->row();
		if($trans == null){
			show_404();
		}

		$data = [
			'status_pembayaran' => 1
		];

		$this->all_model->updateData('transaksi', ['id'=>$id], $data);

		$meja = [
			'status' => 1
		];

		$this->all_model->updateData('meja', ['id'=>$trans->meja_id], $meja);

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
		$menu = $this->all_model->detailTrans()->result();
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
								<button type="submit" class="btn btn-success">Done</button>
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

		$this->all_model->updateData('detailtransaksi', [ 'id' => $item], $data);

		redirect('current', 'refresh');
	}
}
