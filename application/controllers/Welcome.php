<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Default method
	 */

	public function __construct()
	{
	    parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('allmodels');
		$this->load->library('session');
	}
	
	public function index()
	{	
		if ($this->session->has_userdata('token')) {
			redirect('menu', 'refresh');
		}

		$data = [
			'error' => $this->session->flashdata('error')
		];
		return view('welcome_message', $data);
	}

	public function checkIn()
	{
		$token = $this->input->post('token');
		$meja = $this->allmodels->getData('meja', ['token' => $token])->row();
		if (empty($meja)) {
			show_404();
		}

		if (!$meja->status) {
			$this->session->set_flashdata('error', 'Sorry! meja sudah dipesan');
			redirect('/', 'refresh');
		}
		$transaksi = [
			'meja_id' => $meja->id,
			'tgl_trans' => time()
		];

		$this->allmodels->storeData('transaksi', $transaksi);

		$data = [
			'status' => 0
		];
		
		$this->session->set_userdata('token', $token);
		$this->allmodels->updateData('meja', ['id' => $meja->id],$data);
		
		redirect('menu', 'refresh');
	}

	public function getMenu()
	{
		if (!$this->session->has_userdata('token')) {
			redirect('/', 'refresh');
		}

		$token = $this->session->userdata('token');
		$meja = $this->allmodels->getData('meja', ['token' => $token])->row();

		if ($meja->status){
			$this->session->sess_destroy();
			redirect('/', 'refresh');
		}
		
		$data = [
			'makanan' => $this->allmodels->getData('menu', ['status' => 1, 'kategori' => 'MKAN'])->result(),
			'minuman' => $this->allmodels->getData('menu', ['status' => 1, 'kategori' => 'MNUM'])->result(),
			'camilan' => $this->allmodels->getData('menu', ['status' => 1, 'kategori' => 'CMIL'])->result(),
			'error' => $this->session->flashdata('error'),
			'success' => $this->session->flashdata('success')
		];

		return view('menu', $data);
	}

	public function postAddCart()
	{
		$data = array(
            'id' => $this->input->post('id'), 
            'name' => $this->input->post('name'), 
            'price' => $this->input->post('harga'), 
            'qty' => $this->input->post('jumlah'), 
        );
		$this->cart->insert($data);

		$data = [
			'cart' => $this->show_cart(),
			'item' => $this->cart->total_items(),
			'total' => number_format($this->cart->total())
		];

		echo json_encode($data);

		// $this->cart->destroy();
	}

	function show_cart(){ //Fungsi untuk menampilkan Cart
        $output = '';
        $no = 0;
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .='
				<div class="row px-2">
                    <div class="col-2 px-1 text-left">
                        <small><b>'.$items['name'].'</b></small>
                    </div>
                    <div class="col-2 px-1 text-center align-self-center">
                        <small>'.$items['qty'].'</small>
                    </div>
                    <div class="col-3 px-1 text-right align-self-center">
                        <small>'.number_format($items['price']).'</small>
                    </div>
                    <div class="col-4 px-1 text-right align-self-center">
                        <small>'.number_format($items['subtotal']).'</small>
                    </div>
                    <div class="col-1 px-1 text-center align-self-center">
                        <button id="'.$items['rowid'].'" type="button" class="close del" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            ';
        }
        $output .= '			
			<div class="row px-2">
                <div class="col-7 px-1 text-right">
                    <small><b>Total</b></small>
				</div>
				<div class="col-4 px-1 text-right">
                    <small><b>'.'Rp '.number_format($this->cart->total()).'</b></small>
				</div>
			</div>
        ';
        return $output;
    }
 
    public function load_cart(){ //load data cart
        echo $this->show_cart();
	}
	
	function hapus_cart(){ //fungsi untuk menghapus item cart
        $this->cart->remove($this->input->post('row_id'));
        echo $this->show_cart();
	}
	
	public function order()
	{	
		$token = $this->session->userdata('token');
		
		if (!$this->session->has_userdata('token')) {
			redirect('/', 'refresh');
		}

		if ($this->cart->total() == 0) {
			$this->session->set_flashdata('error', 'Anda Belum Memilih Menu');
			redirect('menu', 'refresh');
		}

		$meja = $this->allmodels->getData('meja', ['token' => $token])->row();
		$transaksi = $this->allmodels->getData('transaksi', ['meja_id' => $meja->id, 'status_pembayaran' => 0])->row();
		
		foreach ($this->cart->contents() as $items) {
			$data = [
				'trans_id' => $transaksi->id,
				'menu_id' => $items['id'],
				'jumlah_pesanan' => $items['qty'],
				'total' => $items['subtotal']
			];
			$this->allmodels->storeData('detailtransaksi', $data);
		}

		$this->allmodels->updateData('transaksi', ['id' => $transaksi->id], ['total_harga' => $transaksi->total_harga + $this->cart->total()]);

		$this->cart->destroy();

		$this->session->set_flashdata('success', 'Pesanan Anda Sedang diproses. Silahkan menunggu!! Jika ada tambahan silahkan pesan seperti sebelumnya');
		redirect('menu', 'refresh');
	}

	public function getSelesai()
	{
		$token = $this->session->userdata('token');
		$meja = $this->allmodels->getData('meja', ['token' => $token])->row();
		$transaksi = $this->allmodels->getData('transaksi', ['meja_id' => $meja->id, 'status_pembayaran' => 0])->row();
		
		$data = [
			'transID' => $transaksi->id
		];
		$this->session->sess_destroy();
		return view('greetings', $data);
	}

	public function printPDF($id)
	{
		$trans = $this->allmodels->fulltrans($id)->result();
        $data = [
            'trans' => $trans,
		];
		return view('print', $data);
	}
}
