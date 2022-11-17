<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'unit_m']);
    }

    // function get_ajax() {
    //     $list = $this->item_m->get_datatables();
    //     $data = array();
    //     $no = @$_POST['start'];
    //     foreach ($list as $item) {
    //         $no++;
    //         $row = array();
    //         $row[] = $no.".";
    //         $row[] = $item->barcode.'<br><a href="'.site_url('item/barcode_qrcode/'.$item->item_id).'" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
    //         $row[] = $item->name;
    //         $row[] = $item->unit_name;
    //         $row[] = indoCurrency($item->price);
    //         $row[] = $item->stock;
    //         $row[] = $item->image != null ? '<img src="'.base_url('uploads/product/'.$item->image).'" class="img" style="width:100px">' : null;
    //         // add html for action
    //         if($this->session->userdata('level') == 1 || $this->session->userdata('level') == 3) {
    //         $row[] = '<a href="'.site_url('item/edit/'.$item->item_id).'" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Update</a>
    //                 <a href="'.site_url('item/del/'.$item->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
    //         }
    //         $data[] = $row;
    //     }
    //     $output = array(
    //                 "draw" => @$_POST['draw'],
    //                 "recordsTotal" => $this->item_m->count_all(),
    //                 "recordsFiltered" => $this->item_m->count_filtered(),
    //                 "data" => $data,
    //             );
    //     // output to json format
    //     echo json_encode($output);
    // }

	public function index()
	{
		$data['row'] = $this->item_m->get();
		$this->template->load('template', 'product/item/barang_data', $data);
	}

    function barcode_qrcode($id) {
        $data['row'] = $this->item_m->get($id)->row();
		$this->template->load('template', 'product/item/barcode_qrcode', $data);
    }

    // function code_qrcode() {
    //     $qrCode = new Endroid\QrCode\QrCode('Life is too short to be generating QR codes');

    //     header('Content-Type: '.$qrCode->getContentType());
    //     echo $qrCode->writeString();
    // }
    function barcode_print($id) {
        $data['row'] = $this->item_m->get($id)->row();
        $html = $this->load->view('product/item/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode-'.$data['row']->barcode, 'A4', 'landscape');
    }

    
}