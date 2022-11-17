<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_m extends CI_Model {

    public function get()
    {
        $this->db->select('t_penjualan.*, p_item.name as nama_barang, p_item.price as harga_jual , t_penjualan.penjualan_id as id');
        $this->db->from('t_penjualan');
        $this->db->join('p_item', 'p_item.barcode = t_penjualan.kode_barang', 'left');
        $this->db->where('t_penjualan.kode_penjualan', $this->uri->segment(3));
        $query = $this->db->get();
        
        return $query;
    }

    public function UpdateJumlahPenjualan($price, $id)
    {
        $this->db->set('jumlah', 'jumlah + 1', FALSE);
        $this->db->set('total', "total + $price", FALSE);
        $this->db->where('penjualan_id', $id);
        $this->db->update('t_penjualan');
    }

    public function UpdateStockBarang($kode_barang)
    {
        $this->db->set('stock', "stock - 1", FALSE);
        $this->db->where('barcode', $kode_barang);
        $this->db->update('p_item');
    }

    public function UpdateJumlahPenjualan1($price, $id)
    {
        $this->db->set('jumlah', 'jumlah - 1', FALSE);
        $this->db->set('total', "total - $price", FALSE);
        $this->db->where('penjualan_id', $id);
        $this->db->update('t_penjualan');
    }

    public function UpdateStockBarang1($kode_barang)
    {
        $this->db->set('stock', "stock + 1", FALSE);
        $this->db->where('barcode', $kode_barang);
        $this->db->update('p_item');
    }

    public function UpdateJumlahPenjualan2($jumlah, $kode_barang)
    {
        $this->db->set('stock', "stock + $jumlah", FALSE);
        $this->db->where('barcode', $kode_barang);
        $this->db->update('p_item');
    }

    public function SimpanDetailPenjualan() 
    {
        $data = [
            'kode_penjualan' => $this->input->post('kode_penjualan'),
            'total_bayar' => $this->input->post('total_bayar'),
            'bayar' => $this->input->post('bayar'),
            'kembalian' => $this->input->post('kembalian')
        ];
        $this->db->insert('detail_penjualan', $data);

    }
}