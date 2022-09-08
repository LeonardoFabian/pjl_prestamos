<?php 

defined('BASEPATH') OR exit('Acceso Denegado');

class Reports_m extends CI_Model {

	public function get_reportLoan( $coin_id )
	{
		// sum credits by coin
		$this->db->select("co.short_name, sum(l.credit_amount) AS credits_sum");
		$this->db->join('coins co', 'co.id = l.coin_id', 'left' );
		$this->db->where('l.coin_id', $coin_id );
		$credits_sum = $this->db->get('loans l')->row();

		// credit + interest by coin
		$this->db->select("co.short_name, sum(TRUNCATE(l.credit_amount*(l.interest_amount/100) + l.credit_amount,2)) AS credits_interest");
		$this->db->join('coins co', 'co.id = l.coin_id', 'left' );
		$this->db->where('l.coin_id', $coin_id );
		$creditsWithInterest = $this->db->get('loans l')->row();

		$this->db->select("co.short_name, sum(TRUNCATE(l.credit_amount*(l.interest_amount/100) + l.credit_amount,2)) AS credits_interest_paid");
		$this->db->join('coins co', 'co.id = l.coin_id', 'left' );
		$this->db->where(['l.coin_id' => $coin_id, 'l.status' => 0]);
		$creditsWithInterestPaid = $this->db->get('loans l')->row();

		$this->db->select("co.short_name, sum(TRUNCATE(l.credit_amount*(l.interest_amount/100) + l.credit_amount,2)) AS credits_interest_collect");
		$this->db->join('coins co', 'co.id = l.coin_id', 'left' );
		$this->db->where(['l.coin_id' => $coin_id, 'l.status' => 1]);
		$creditsWithInterestToCollect = $this->db->get('loans l')->row();

		$credits = [$credits_sum, $creditsWithInterest, $creditsWithInterestPaid, $creditsWithInterestToCollect];

		return $credits;
	}

	public function get_reportCoin( $coin_id ) 
	{
		$this->db->where( 'id', $coin_id );

		return $this->db->get('coins')->row();
	}

	public function get_reportDates( $coin_id, $start_date, $end_date ) 
	{
		$this->db->select("id, date, credit_amount, interest_amount, num_fee, payment_m, (num_fee*fee_amount) AS total_int, status");
		$this->db->from('loans');
		$this->db->where('coin_id', $coin_id);
		$this->db->where("date BETWEEN '{$start_date}' AND '{$end_date}'");

		return $this->db->get()->result();
	}

	public function get_reportsByCustomers()
	{
		$this->db->select("id, document_id, CONCAT(first_name, ' ', last_name) AS customer");
		$this->db->from('customers');
		$this->db->where('loan_status', 1 );

		return $this->db->get()->result();
	}

	public function get_reportLC($customer_id)
	{
	  $this->db->select("l.*, CONCAT(c.first_name, ' ', c.last_name) AS customer_name, co.short_name, co.name");
	  $this->db->from('loans l');
	  $this->db->join('customers c', 'c.id = l.customer_id', 'left');
	  $this->db->join('coins co', 'co.id = l.coin_id', 'left');
	  $this->db->where('l.customer_id', $customer_id);
  
	  return $this->db->get()->result(); 
	}
  
	public function get_reportLI($loan_id)
	{
	  $this->db->where('loan_id', $loan_id);
  
	  return $this->db->get('loan_items')->result(); 
	}


}
