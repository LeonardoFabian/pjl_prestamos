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

			if ( $this->input->post('payment_m') == 'diario' )
				$p = 'P1D';
			if ( $this->input->post('payment_m') == 'semanal' )
				$p = 'P7D';
			if ( $this->input->post('payment_m') == 'quincenal' )
				$p = 'P15D';
			if ( $this->input->post('payment_m') == 'mensual' )
				$p = 'P1M';

			$period = new DatePeriod(
				new DateTime( $this->input->post('date') ),
				new DateInterval( $p ),
				$this->input->post('num_fee'),
				DatePeriod::EXCLUDE_START_DATE
			);

			$fee_number = 1;

			foreach ( $period as $date ) {

				$items[] = array(
					'date' => $date->format('Y-m-d'),
					'num_quota' => $fee_number++,
					'fee_amount' => $this->input->post('fee_amount')
				);
			}

			$loan_data = $this->loans_m->array_from_post(['customer_id', 'credit_amount', 'interest_amount', 'num_fee', 'fee_amount', 'payment_m', 'coin_id', 'date']);

			if ( $this->loans_m->add_loan( $loan_data, $items ) ) {

				$this->session->set_flashdata( 'msg', 'Prestamo registrado correctamente' );

			}

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

	public function view( $id ) 
	{
		$data['loan'] = $this->loans_m->get_loan( $id );
		$data['items'] = $this->loans_m->get_loanItems( $id );

		$this->load->view( 'admin/loans/view', $data );
	}	
}
