<?php 

defined('BASEPATH') OR exit('Acceso Denegado');

class Loans extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model( 'loans_m' );
		$this->load->library( 'session' );
		$this->load->library( 'form_validation' );
	}

	public function index()
	{
		$data['loans'] = $this->loans_m->get_loans();
		$data['subview'] = 'admin/loans/index';

		$this->load->view( 'admin/_main_layout', $data );
	}

	public function edit()
	{
		$data['coins'] = $this->loans_m->get_coins();

		$rules = $this->loans_m->loan_rules;

		$this->form_validation->set_rules( $rules );

		if ( $this->form_validation->run() == TRUE ) {



		}

		$data['subview'] = 'admin/loans/edit';

		$this->load->view( 'admin/_main_layout', $data );
	}

	function ajax_searchCustomer()
	{
		
		$documentId = $this->input->post('document_id');
		$customer = $this->loans_m->get_searchCustomer( $documentId );

		echo json_encode( $customer );

	}
}
