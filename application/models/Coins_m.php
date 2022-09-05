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
}
