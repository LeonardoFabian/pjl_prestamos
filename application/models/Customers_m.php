<?php 

defined('BASEPATH') OR exit('Acceso Denegado!');

class Customers_m extends MY_Model {

	protected $_table_name = 'customers';

	public $customer_rules = array(
		array(
			'field' => 'document_id',
			'label' => 'Documento de Identidad',
			'rules' => 'trim|required|min_length[11]|is_unique[customers.document_id]'
		),
		array(
			'field' => 'first_name',
			'label' => 'Nombre',
			'rules' => 'trim|required|min_length[2]'
		),
		array(
			'field' => 'last_name',
			'label' => 'Apellidos',
			'rules' => 'trim|required|min_length[2]'
		),
		array(
			'field' => 'birthday',
			'label' => 'Fecha de Nacimiento',
			'rules' => 'required'
		),
		array(
			'field' => 'floor',
			'label' => 'Piso',
			'rules' => 'is_natural'
		),
		array(
			'field' => 'mobile',
			'label' => 'Móvil',
			'rules' => 'min_length[10]'
		),
		array(
			'field' => 'phone',
			'label' => 'Télefono',
			'rules' => 'min_length[10]'
		),
		array(
			'field' => 'company_phone',
			'label' => 'Télefono de la empresa',
			'rules' => 'min_length[10]'
		),
		array(
			'field' => 'email',
			'label' => 'Correo Electrónico',
			'rules' => 'valid_email'
		),
		array(
			'field' => 'rnc',
			'label' => 'RNC',
			'rules' => 'min_length[9]'
		),
	);

	public function get_new()
	{
		$customer = new stdClass();
		$customer->document_id = '';
		$customer->first_name = '';
		$customer->last_name = '';
		$customer->gender = 'none';
		$customer->birthday = '';
		$customer->country_id = 0;
		$customer->state_id = 0;
		$customer->city_id = 0;
		$customer->address = '';
		$customer->apto = '';
		$customer->floor = 0;
		$customer->mobile = '';
		$customer->phone = '';
		$customer->email = '';
		$customer->business_name = '';
		$customer->rnc = '';
		$customer->company = '';
		$customer->company_phone = '';
		$customer->company_address = '';

		return $customer;

	}
}
