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
			'field' => 'apto',
			'label' => 'Número de Apartamento o Casa',
			'rules' => 'required'
		),
		array(
			'field' => 'floor',
			'label' => 'Piso',
			'rules' => 'numeric'
		),
		array(
			'field' => 'mobile',
			'label' => 'Móvil',
			'rules' => 'required|min_length[10]'
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
		array(
			'field' => 'country_id',
			'label' => 'País',
			'rules' => 'required'
		),
		array(
			'field' => 'state_id',
			'label' => 'Provincia o Estado',
			'rules' => 'required'
		),
		array(
			'field' => 'city_id',
			'label' => 'Ciudad o Municipio',
			'rules' => 'required'
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

	public function get_countries()
	{
		return $this->db->get( 'countries' )->result();
	}

	public function get_editStates( $country_id )
	{
		$this->db->where( 'country_id', $country_id );
		return $this->db->get( 'states' )->result();
	}

	public function get_editCities( $state_id )
	{
		$this->db->where( 'state_id', $state_id );
		return $this->db->get( 'cities' )->result(); 
	}

	public function get_states( $country_id ) 
	{
		$this->db->where( 'country_id', $country_id );

		$query = $this->db->get( 'states' );
		$outputStates = '<option value="0">Selecciona...</option>';

		foreach( $query->result() as $state ) {
			$outputStates .= '<option value="' . $state->id . '">' . $state->name . '</option>';
		}

		return $outputStates;
	}

	public function get_cities( $state_id )
	{
		$this->db->where( 'state_id', $state_id );

		$query = $this->db->get( 'cities');
		$outputCities = '<option value="0">Selecciona...</option>';

		foreach( $query->result() as $city ) {
			$outputCities .= '<option value="' . $city->id . '">' . $city->name . '</option>';
		}

		return $outputCities;

	}

	public function get_countCustomers() 
	{
		$this->db->select( "count(*) as qty");
		$this->db->from( 'customers' );

		return $this->db->get()->row();
	}

	
}
