<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('penjualan_m');
		$this->load->library('cart');
    }

	public function index()
	{
		$data['row'] = $this->penjualan_m->get();
		$this->template->load('template', 'transaction/sale/penjualan_form', $data);
	}

	public function SimpanBarang()
	{
		$CekBarang = $this->db->get_where('p_item', ['barcode' => $this->input->post('kode_barang', true)])->row();
		if ($this->db->affected_rows() > 0) { // jika data ada
			if ($CekBarang->stock == 0 ) { // jika stock nya habis atau 0
				$this->session->set_flashdata('error', 'Stock Barang Habis, Silakan Isi');
				redirect('penjualan/index/'. $this->input->post('kode_penjualan', true));
				die;
			}
			// $this->penjualan_m->add_penjualan($post);

			$jumlah = 1;
			$total = $jumlah * $CekBarang->price;
			
			$data = [
				'kode_penjualan' => $this->input->post('kode_penjualan', true),
				'kode_barang' => $this->input->post('kode_barang', true),
				'jumlah' => 1,
				'total' => $total,
				'tanggal' => $this->input->post('date', true),
				'user_id' => $this->session->userdata('userid'),
			];	
			$this->db->insert('t_penjualan', $data);
			redirect('penjualan/index/'. $this->input->post('kode_penjualan', true));

		} else {
			$this->session->set_flashdata('error', 'Kode Barang Tidak Ditemukan!');
			redirect('penjualan/index/'. $this->input->post('kode_penjualan', true));
		}
	}

	public function TambahJumlah($id)
	{
		$penjualan = $this->db->get_where('t_penjualan', ['penjualan_id' => $id])->row();
		$barang = $this->db->get_where('p_item', ['barcode' => $penjualan->kode_barang])->row();
		$cekBarang = $barang->stock -1;
        // var_dump($barang->stock);
		// var_dump($penjualan->jumlah);
		// var_dump(0 <= 0);
		// var_dump($cekBarang <0 ) ; 
		if((int)$cekBarang < 0){
			$this->session->set_flashdata('error', 'stok barang tidak cukup');
            redirect('penjualan/index/'. $penjualan->kode_penjualan);
			exit;
		}else{
		$this->penjualan_m->UpdateJumlahPenjualan($barang->price, $id);
		$this->penjualan_m->UpdateStockBarang($penjualan->kode_barang);

		redirect('penjualan/index/'. $penjualan->kode_penjualan);
		exit;
		}	
		// if($barang->stock >=$penjualan->jumlah){
		// 	$this->penjualan_m->UpdateJumlahPenjualan($barang->price, $id);
		// 	$this->penjualan_m->UpdateStockBarang($penjualan->kode_barang);
	
		// 	redirect('penjualan/index/'. $penjualan->kode_penjualan);
		// } else {
		// 	$this->session->set_flashdata('error', 'Jumlah Barang tidak cuukup');
		// 	redirect('penjualan/index/'. $penjualan->kode_penjualan);
		// }
	}

	public function KurangiJumlah($id)
	{
		$penjualan = $this->db->get_where('t_penjualan', ['penjualan_id' => $id])->row();
		$barang = $this->db->get_where('p_item', ['barcode' => $penjualan->kode_barang])->row();

		if($penjualan->jumlah == 1){
			$this->session->set_flashdata('error', 'Jumlah Barang Sudah 1');
			redirect('penjualan/index/'. $penjualan->kode_penjualan);
		} else {
			$this->penjualan_m->UpdateJumlahPenjualan1($barang->price, $id);
			$this->penjualan_m->UpdateStockBarang1($penjualan->kode_barang);
	
			redirect('penjualan/index/'. $penjualan->kode_penjualan);
		}
		
	}

	public function HapusBarang($id)
	{
		$penjualan = $this->db->get_where('t_penjualan', ['penjualan_id'])->row();
		$this->penjualan_m->UpdateJumlahPenjualan2($penjualan->jumlah, $penjualan->kode_barang);

		$this->db->delete('t_penjualan', ['penjualan_id' => $id]);
		redirect('penjualan/index/'. $penjualan->kode_penjualan);
	}

	public function SimpanDetailPenjualan()
	{
		$this->penjualan_m->SimpanDetailPenjualan();
		if($this->db->affected_rows() > 0) {
			$result = ['success' => true];
		} else {
			$result = ['success' => false];
		}
		echo json_encode($result);
	}

	public function struk()
	{
		$data['kode_penjualan'] = $this->uri->segment(3);
		$data['penjualan'] = $this->penjualan_m->get()->result();
		$data['tanggal_beli'] = $this->db->get_where('t_penjualan', ['kode_penjualan' => $this->uri->segment(3)])->row();
		$data['detail_penjualan'] = $this->db->get_where('detail_penjualan', ['kode_penjualan' => $this->uri->segment(3)])->row();
		$this->load->view('transaction/sale/struk', $data);
	}
}