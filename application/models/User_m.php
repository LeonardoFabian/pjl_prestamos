<?php 

defined('BASEPATH') OR exit('Acceso Denegado!');

class User_m extends MY_Model {

	protected $_table_name = 'users';

	public $rules = array(
		'email' => array(
			'field' => 'email',
			'label' => 'Correo Electrónico',
			'rules' => 'trim|required'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Contraseña',
			'rules' => 'trim|required'
		)
	);

	/**
	 * User Login
	 *
	 * @return void
	 */
	public function login()
	{
		$user = $this->get_by([
			'email' => $this->input->post('email'),
			'password' => $this->hash( $this->input->post('password') )
		], TRUE );

		if ( null !== $user ) {

			$data = [
				'user_id' => $user->id,
				'first_name' => $user->first_name,
				'last_name' => $user->last_name,
				'loggedin' => TRUE
			];

			$this->session->set_userdata( $data );

			return TRUE;

		}
	}

	/**
	 * User logout 
	 *
	 * @return void
	 */
	public function logout() 
	{
		$this->session->sess_destroy();
	}

	/**
	 * Determine if a user is logged in
	 *
	 * @return void
	 */
	public function loggedin()
	{
		return (bool) $this->session->userdata( 'loggedin' );
	}

}
