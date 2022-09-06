<?php 

defined('BASEPATH') OR exit('Acceso Denegado');

class Payments extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->model( 'payments_m' );
		$this->load->library( 'session' );
		$this->load->library( 'form_validation' );
	}

	public function index()
	{
		$data['payments'] = $this->payments_m->get_payments();
		$data['subview'] = 'admin/payments/index';
		$this->load->view( 'admin/_main_layout', $data );
	}

	public function edit() 
	{
		$data['subview'] = 'admin/payments/edit';
		$this->load->view( 'admin/_main_layout', $data );
	}

	public function ajax_searchCustomer()
	{
		$dni = $this->input->post('dni');
		$customer = $this->payments_m->get_searchCustomer( $dni );

		// var_dump($customer);

		$quota_data = '';

		if( $customer != null ) {
			$quota_data = $this->payments_m->get_customerQuotas( $customer->loan_id );
		}

		$search_data = ['customer' => $customer, $quota_data ];

		echo json_encode( $search_data );
	}

	function checkout()
	{
		$data['customer_name'] = $this->input->post('customer_name');  
		$data['coin'] = $this->input->post('coin');  
		$data['loan_id'] = $this->input->post('loan_id');  

		foreach ( $this->input->post('quota_id') as $quota ) {
			$this->payments_m->update_quota(['status' => 0], $quota );
		}

		if ( ! $this->payments_m->check_customerLoan( $this->input->post('loan_id') ) ) {
			$this->payments_m->update_customerLoan( $this->input->post( 'loan_id'), $this->input->post( 'customer_id' ) );
		}

		$data['quotasPaid'] = $this->payments_m->get_quotasPaid( $this->input->post('quota_id') );

		$this->load->view( 'admin/payments/checkout', $data );
		
	}

}
