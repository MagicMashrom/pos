<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'supplier_m', 'stock_m']);
    }

    public function stock_in_data()
    {
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
    }

    public function stock_in_add()
    {
        $supplier = $this->supplier_m->get()->result();
        $data['supplier'] = $supplier;

        if (!empty($_POST)) {
            $item = $this->item_m->get(null, $this->input->post('barcode'))->result();

            if (empty($item[0])) {
                $item = (object)[
                    "item_id" => null,
                    "barcode" => null,
                    "name" => null,
                    "category_id" => null,
                    "unit_id" => null,
                    "price" => null,
                    "stock" => null,
                    "image" => null,
                    "created" => null,
                    "updated" => null,
                    "unit_name" => null
                ];

                $this->session->set_flashdata('error', 'Kode Barang Tidak Ditemukan!');
            } else {
                $item = $item[0];

                unset($_SESSION['error']);
            }

            $data['item'] = $item;
        } else {
            $data['item'] = (object)['item_id' => null, 'name' => null, 'unit_name' => null, 'stock' => null];

            $_POST['barcode'] = null;
        }

        $inputan['inputan'] = $_POST;

        $data = array_merge($data, $inputan);
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }

    public function stock_in_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_out($data);
        $this->stock_m->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-In berhasil dihapus');
        }
        redirect('stock/in');
    }

    public function stock_out_data()
    {
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
    }

    public function stock_out_add()
    {
        $supplier = $this->supplier_m->get()->result();
        $data['supplier'] = $supplier;

        if (!empty($_POST)) {
            $item = $this->item_m->get(null, $this->input->post('barcode'))->result();

            if (empty($item[0])) {
                $item = (object)[
                    "item_id" => null,
                    "barcode" => null,
                    "name" => null,
                    "category_id" => null,
                    "unit_id" => null,
                    "price" => null,
                    "stock" => null,
                    "image" => null,
                    "created" => null,
                    "updated" => null,
                    "unit_name" => null
                ];

                $this->session->set_flashdata('error', 'Kode Barang Tidak Ditemukan!');
            } else {
                $item = $item[0];

                unset($_SESSION['error']);
            }

            $data['item'] = $item;
        } else {
            $data['item'] = (object)['item_id' => null, 'name' => null, 'unit_name' => null, 'stock' => null];

            $_POST['barcode'] = null;
        }

        $inputan['inputan'] = $_POST;

        $data = array_merge($data, $inputan);
        $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
    }

    public function stock_out_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_in($data);
        $this->stock_m->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-Out berhasil dihapus');
        }
        redirect('stock/out');
    }

    public function stock_return_data()
    {
        $data['row'] = $this->stock_m->get_stock_return()->result();
        $this->template->load('template', 'transaction/return/return_data', $data);
    }

    public function stock_return_add()
    {
        $supplier = $this->supplier_m->get()->result();
        $data['supplier'] = $supplier;

        if (!empty($_POST)) {
            $item = $this->item_m->get(null, $this->input->post('barcode'))->result();

            if (empty($item[0])) {
                $item = (object)[
                    "item_id" => null,
                    "barcode" => null,
                    "name" => null,
                    "category_id" => null,
                    "unit_id" => null,
                    "price" => null,
                    "stock" => null,
                    "image" => null,
                    "created" => null,
                    "updated" => null,
                    "unit_name" => null
                ];

                $this->session->set_flashdata('error', 'Kode Barang Tidak Ditemukan!');
            } else {
                $item = $item[0];

                unset($_SESSION['error']);
            }
            $data['item'] = $item;
        } else {
            $data['item'] = (object)['item_id' => null, 'name' => null, 'unit_name' => null, 'stock' => null];

            $_POST['barcode'] = null;
        }

        $inputan['inputan'] = $_POST;

        $data = array_merge($data, $inputan);
        $this->template->load('template', 'transaction/return/return_form', $data);
    }

    public function stock_return_del()
    {
        $stock_id = $this->uri->segment(4);
        $item_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'item_id' => $item_id];
        $this->item_m->update_stock_in($data);
        $this->stock_m->del($stock_id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-Return berhasil dihapus');
        }
        redirect('stock/return');
    }

    public function process()
    {
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->item_m->update_stock_in($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-In berhasil disimpan');
            }
            redirect('stock/in');
        } else if (isset($_POST['out_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_out($post);
            $this->item_m->update_stock_out($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-Out berhasil disimpan');
            }
            redirect('stock/out');
        } else if (isset($_POST['return_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_return($post);
            $this->item_m->update_stock_out($post);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-Return berhasil disimpan');
            }
            redirect('stock/return');
        }
    }
}
