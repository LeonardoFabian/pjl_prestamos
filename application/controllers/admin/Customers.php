<?php 

defined('BASEPATH') OR exit('Acceso Denegado!');

class Customers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// form library
		$this->load->library('form_validation');
	}

	/**
	 * List all customers
	 *
	 * @return void
	 */
	public function index() 
	{
		$data['subview'] = 'admin/customers/index';
		$this->load->view( 'admin/_main_layout', $data );
	}

	/**
	 * Edit customer data
	 *
	 * @return void
	 */
	public function edit() 
	{
		$data['subview'] = 'admin/customers/edit';
		$this->load->view( 'admin/_main_layout', $data );
	}
}