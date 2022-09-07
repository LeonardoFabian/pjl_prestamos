<?php 

defined('BASEPATH') OR exit('Acceso Denegado!');

class Coins_m extends MY_Model {

	protected $_table_name = 'coins';

	public $coin_rules = array(
		array(
			'field' => 'name',
			'label' => 'Nombre (plural)',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'singular_name',
			'label' => 'Nombre (singular)',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'short_name',
			'label' => 'Abreviatura',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'symbol',
			'label' => 'Símbolo',
			'rules' => 'trim|required'
		)
	);

	public function get_new()
	{
		$coin = new stdClass();
		$coin->name = '';
		$coin->singular_name = '';
		$coin->short_name = '';
		$coin->symbol = '';
		$coin->description = '';

		return $coin;
	}

	public function get_countLoansByMoneyType()
	{
		$this->db->select(
			"
			co.name,
			co.short_name,
			count(l.id) as total
			"
		);
		$this->db->from( 'loans l' );
		$this->db->join( 'coins co', 'co.id = l.coin_id', 'left' );
		$this->db->group_by( 'l.coin_id' );

		return $this->db->get()->result();
	}
}
