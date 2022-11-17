<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('laporan_m');
    }

	public function index()
	{
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required', [
			'required' => 'Tanggal Awal Masih Kosong'
		]);
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required', [
			'required' => 'Tanggal Akhir Masih Kosong'
		]);
		if($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'report/penjualan/laporan_penjualan');
		} else {
			$data['rows'] = $this->laporan_m->GetBerdasarkanTanggal()->result();
			$data['tgl_awal'] = $this->input->post('tgl_awal');
			$data['tgl_akhir'] = $this->input->post('tgl_akhir');
			$this->load->view('report/penjualan/laporan1', $data);
		}
		
	}

	public function laporan_stock_in()
	{
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required', [
			'required' => 'Tanggal Awal Masih Kosong'
		]);
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required', [
			'required' => 'Tanggal Akhir Masih Kosong'
		]);
		if($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'report/stock_in/laporan_stock_in');
		} else {
			$data['rows'] = $this->laporan_m->GetStockIn()->result();
			$data['tgl_awal'] = $this->input->post('tgl_awal');
			$data['tgl_akhir'] = $this->input->post('tgl_akhir');

			// var_dump($data['rows']);
			$this->load->view('report/stock_in/laporan1', $data);
		}
	}

	public function laporan_stock_out()
	{
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required', [
			'required' => 'Tanggal Awal Masih Kosong'
		]);
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required', [
			'required' => 'Tanggal Akhir Masih Kosong'
		]);
		if($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'report/stock_out/laporan_stock_out');
		} else {
			$data['rows'] = $this->laporan_m->GetStockOut()->result();
			$data['tgl_awal'] = $this->input->post('tgl_awal');
			$data['tgl_akhir'] = $this->input->post('tgl_akhir');

			// var_dump($data['rows']);
			$this->load->view('report/stock_out/laporan1', $data);
		}
	}

	public function laporan_stock_return()
	{
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required', [
			'required' => 'Tanggal Awal Masih Kosong'
		]);
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required', [
			'required' => 'Tanggal Akhir Masih Kosong'
		]);
		if($this->form_validation->run() == FALSE) {
			$this->template->load('template', 'report/stock_return/laporan_stock_return');
		} else {
			$data['rows'] = $this->laporan_m->GetStockReturn()->result();
			$data['tgl_awal'] = $this->input->post('tgl_awal');
			$data['tgl_akhir'] = $this->input->post('tgl_akhir');

			// var_dump($data['rows']);
			$this->load->view('report/stock_return/laporan1', $data);
		}
	}
	
}