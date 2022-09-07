<?php 

defined('BASEPATH') OR exit('Acceso denegado');

class Config_m extends MY_Model {

	protected $_table_name = 'users';

	public $config_rules = array(
		array(
			'field' => 'first_name',
			'label' => 'Nombre',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'last_name',
			'label' => 'Apellidos',
			'rules' => 'trim|required'
		),
		array(
			'field' => 'email',
			'label' => 'Correo Electrónico',
			'rules' => 'trim|required'
		)
	);

	public $password_rules = array(
		array(
			'field' => 'old_password',
			'label' => 'Contraseña anterior',
			'rules' => 'trim|required|callback__password_verify'
		),
		array(
			'field' => 'new_password',
			'label' => 'Nueva contraseña',
			'rules' => 'trim|matches[confirm_password]'
		),
		array(
			'field' => 'confirm_password',
			'label' => 'Confirmar contraseña',
			'rules' => 'trim|required'
		)
	);

}
