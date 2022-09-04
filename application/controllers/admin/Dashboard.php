<?php 

defined('BASEPATH') OR exit('Acceso denegado');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$data['subview'] = 'admin/index';
		$this->load->view('admin/_main_layout', $data);
	}
}
