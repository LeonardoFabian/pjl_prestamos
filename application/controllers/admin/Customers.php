<?php 

defined('BASEPATH') OR exit('Acceso Denegado!');

class Customers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index() 
	{
		$data['subview'] = 'admin/customers/index';
		$this->load->view( 'admin/_main_layout', $data );
	}
}
