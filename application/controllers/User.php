<?php 

defined('BASEPATH') OR exit('Acceso denegado');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function login() 
	{
		$this->load->view('_login_layout');
	}
}
