<?php
defined('BASEPATH') OR exil('No direct script access allowed');

class Reports extendes CI_Controller{
public function __construct()
{
parent::__construct();
$this->load->model('coins_m');
$this->load->model('reports_m');
$this->load->model('session');
}
public function index()
{
$data['coins'] = $this->coins_m->get();
$data['credits'] = $this->reports_m->get_reportLoan();
$data['subview'] = 'admin/reports/index';

$this->load->view('admin/_main_layout',$data);

}

}
