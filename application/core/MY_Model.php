<?php 

defined('BASEPATH') OR exit('Acceso denegado!');

class MY_Model extends CI_Model {

	protected $_table_name = '';
	protected $_primary_key = 'id';

	/**
	 * Get a single data by id or all data results
	 *
	 * @param [type] $id
	 * @param boolean $single
	 * @return void
	 */
	public function get( $id = NULL, $single = FALSE )
	{
		if ( $id != NULL ) {
			$this->db->where( $this->_primary_key, $id );
			$method = 'row';
		} else if ( $single == TRUE ) {
			$method = 'row';
		} else {
			$method = 'result';
		}

		$this->db->order_by( "id", "desc" );

		return $this->db->get( $this->_table_name )->$method();
	}

	/**
	 * Get a single data or all data results using a condition
	 *
	 * @param [type] $where
	 * @param boolean $single
	 * @return void
	 */
	public function get_by( $where, $single = FALSE ) 
	{
		$this->db->where( $where );

		return $this->get( NULL, $single );
	}

	/**
	 * Insert or Update the data
	 *
	 * @param [type] $data
	 * @param [type] $id
	 * @return void
	 */
	public function save($data, $id = NULL )
	{
		// Insert
		if ( $id === NULL ) {
			$this->db->insert( $this->_table_name, $data );
			$id = $this->db->insert_id();
		}

		// Update
		else {
			$this->db->where( $this->_primary_key, $id );
			$this->db->update( $this->_table_name, $data );
		}

		return $id;

	}

	/**
	 * Delete a single data
	 *
	 * @param [type] $id
	 * @return void
	 */
	public function delete( $id ) 
	{
		if ( ! $id ) {
			return FALSE;
		}

		$this->db->where( $this->_primary_key, $id );
		$this->db->delete( $this->_table_name );
	}

	/**
	 * Get an array of values from $_POST 
	 *
	 * @param [type] $fields
	 * @return void
	 */
	public function array_from_post( $fields )
	{
		$data = [];
		foreach ( $fields as $value ) {
			$data[$value] = $this->input->post($value);
		}

		return $data;
	}

	/**
	 * Encrypt an string
	 *
	 * @param [type] $string
	 * @return void
	 */
	public function hash( $string ) 
	{
		return hash( 'sha512', $string );
		// return hash( 'sha512', $string . config_item('encryption_key') );
	}

}
