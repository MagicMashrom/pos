<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {

	public function index()
	{
		check_not_login();
		$this->template->load('template', 'transaction/sale/sale_form');
	}
}