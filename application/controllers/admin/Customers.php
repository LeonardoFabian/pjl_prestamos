<?php 

defined('BASEPATH') OR exit('Acceso Denegado!');

class Customers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model( 'customers_m' );

		$this->load->library('form_validation');

		$this->load->library( 'session' );
	}

	/**
	 * List all customers
	 *
	 * @return void
	 */
	public function index() 
	{
		$data['customers'] = $this->customers_m->get();
		$data['subview'] = 'admin/customers/index';
		$this->load->view( 'admin/_main_layout', $data );
	}

	/**
	 * Edit customer data
	 *
	 * @return void
	 */
	public function edit( $id = NULL ) 
	{
		if ( $id ) {

			$data['customer'] = $this->customers_m->get( $id );

		} else {

			$data['customer'] = $this->customers_m->get_new();

		}

		$data['countries'] = $this->customers_m->get_countries();

		$rules = $this->customers_m->customer_rules;

		$this->form_validation->set_rules( $rules );

		if ( $this->form_validation->run() == TRUE ) {

			$customer_data = $this->customers_m->array_from_post(['document_id', 'first_name', 'last_name', 'gender', 'birthday', 'country_id', 'state_id', 'city_id', 'address', 'apto', 'floor', 'mobile', 'phone', 'email', 'business_name', 'rnc', 'company', 'company_phone', 'company_address']);

			$this->customers_m->save( $customer_data, $id );

			if ( $id ) {
				$this->session->set_flashdata('msg', 'Cliente editado correctamente');
			} else {
				$this->session->set_flashdata('msg', 'Cliente agregado correctamente');
			}

			redirect( 'admin/customers' );

		}

		$data['subview'] = 'admin/customers/edit';
		$this->load->view( 'admin/_main_layout', $data );
	}
}
