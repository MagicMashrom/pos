<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_m extends CI_Model {

    public function GetBerdasarkanTanggal()
    {
        $this->db->select('*, p_item.name as nama_barang, p_item.price as harga');
        $this->db->from('t_penjualan');
        $this->db->join('p_item', 'p_item.barcode = t_penjualan.kode_barang', 'left');
        $this->db->where('tanggal >=', $this->input->post('tgl_awal'));
        $this->db->where('tanggal <=', $this->input->post('tgl_akhir'));
        return $this->db->get();
        
    }
    
    public function GetStockIn() 
    {
       $this->db->select('t_stock.stock_id, p_item.barcode, p_item.name as item_name, 
       qty, date, detail, supplier.name_perusahaan as supplier_name, p_item.item_id');
       $this->db->from('t_stock');
       $this->db->join('p_item', 't_stock.item_id = p_item.item_id');
       $this->db->join('supplier', 't_stock.supplier_id = supplier.supplier_id', 'left');
       $this->db->where('type', 'in');
       $this->db->where('t_stock.date >=', $this->input->post('tgl_awal'));
       $this->db->where('t_stock.date <=', $this->input->post('tgl_akhir'));
       $query = $this->db->get();
       return $query;
    }

    public function GetStockOut() 
    {
       $this->db->select('t_stock.stock_id, p_item.barcode, p_item.name as item_name, 
       qty, date, detail, supplier.name_perusahaan as supplier_name, p_item.item_id');
       $this->db->from('t_stock');
       $this->db->join('p_item', 't_stock.item_id = p_item.item_id');
       $this->db->join('supplier', 't_stock.supplier_id = supplier.supplier_id', 'left');
       $this->db->where('type', 'out');
       $this->db->where('t_stock.date >=', $this->input->post('tgl_awal'));
       $this->db->where('t_stock.date <=', $this->input->post('tgl_akhir'));
       $query = $this->db->get();
       return $query;
    }

    public function GetStockReturn() 
    {
       $this->db->select('t_stock.stock_id, p_item.barcode, p_item.name as item_name, 
       qty, date, detail, supplier.name_perusahaan as supplier_name, p_item.item_id');
       $this->db->from('t_stock');
       $this->db->join('p_item', 't_stock.item_id = p_item.item_id');
       $this->db->join('supplier', 't_stock.supplier_id = supplier.supplier_id', 'left');
       $this->db->where('type', 'return');
       $this->db->where('t_stock.date >=', $this->input->post('tgl_awal'));
       $this->db->where('t_stock.date <=', $this->input->post('tgl_akhir'));
       $query = $this->db->get();
       return $query;
    }
}
    