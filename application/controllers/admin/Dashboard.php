<?php 

defined('BASEPATH') OR exit('Acceso denegado');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model( 'customers_m' );
		$this->load->model( 'loans_m' );
		$this->load->model( 'coins_m' );
	}

	public function index()
	{
		$data['qtyCustomers'] = $this->customers_m->get_countCustomers();
		$data['qtyLoans'] = $this->loans_m->get_countLoans();
		$data['qtyPaidLoans'] = $this->loans_m->get_countPaidLoans();

		$loansByMoneyType = $this->coins_m->get_countLoansByMoneyType();

		$dataLoansByMoneyType = [];

		foreach( $loansByMoneyType as $row ) {
			$dataLoansByMoneyType['label'][] = $row->name;
			$dataLoansByMoneyType['data'][] = (int) $row->total;
		}

		$data['loansByMoney'] = json_encode( $dataLoansByMoneyType );

		$data['subview'] = 'admin/index';
		$this->load->view('admin/_main_layout', $data);
	}
}
