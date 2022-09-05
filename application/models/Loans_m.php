<?php 

defined('BASEPATH') OR exit('Acceso Denegado');

class Loans_m extends MY_Model {

	protected $_table_name = 'loans';

	public $loan_rules = array(
		array(
			'field' => 'customer_id',
			'rules' => 'trim|required',
			'errors' => array(
				'required' => 'Debe seleccionar un cliente registrado',
			)
		)
	);

	public function get_loans() 
	{
		$this->db->select(
			"l.id, 
			CONCAT(c.first_name, ' ', c.last_name) AS customer,
			l.credit_amount, 
			l.interest_amount, 
			co.short_name,
			l.status"
		);
		$this->db->from( 'loans l' );
		$this->db->join( 'customers c', 'c.id = l.customer_id', 'left' );
		$this->db->join( 'coins co', 'co.id = l.coin_id', 'left' );
		$this->db->order_by( 'l.id', 'desc' );

		return $this->db->get()->result();

	}

	public function get_coins()
	{
		return $this->db->get( 'coins' )->result();
	}
}
