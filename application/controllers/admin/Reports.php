<?php 

defined('BASEPATH') OR exit('Acceso Denegado');

class Reports extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model( 'coins_m' );
		$this->load->model( 'reports_m' );
		$this->load->library( 'session' );
	}

	public function index()
	{
		$data['coins'] = $this->coins_m->get();
		$data['subview'] = 'admin/reports/index';

		$this->load->view('admin/_main_layout', $data );
	}

	public function ajax_getCreditsByCoin( $coin_id )
	{
		$data['credits'] = $this->reports_m->get_reportLoan( $coin_id );

		echo json_encode( $data );
	}

	public function dates() {
		$data['coins'] = $this->coins_m->get();
		$data['subview'] = 'admin/reports/dates';

		$this->load->view( 'admin/_main_layout', $data );
	}

	public function dates_pdf( $coin_id, $start_date, $end_date ) 
	{
		require_once APPPATH . 'third_party/fpdf184/html_table.php';

		$reportCoin = $this->reports_m->get_reportCoin( $coin_id );

		$pdf = new PDF();
		$pdf->AddPage('P', 'A4', 0);
		$pdf->SetFont('Arial', 'B', 13);
		$pdf->Ln(7);
		$pdf->Cell(0,0,'Reporte de prestamos por rango de fecha',0,1,'C');

		$pdf->Ln(8);

		$pdf->SetFont('Arial','',10);
		$html = '<table border="0">
		<tr>
			<td width="110" height="30"><b>Fecha inicial:</b></td>
			<td width="400" height="30">' .$start_date. '</td>
			<td width="110" height="30"><b>Tipo de moneda:</b></td>
			<td width="55" height="30">'.$reportCoin->name.'('. $reportCoin->short_name .')</td>
		</tr>
		<tr>
			<td width="110" height="30"><b>Fecha final:</b></td>
			<td width="400" height="30">' . $end_date . '</td>
			<td width="110" height="30"></td>
			<td width="55" height="30"></td>
		</tr>
		</table>';	

		$pdf->WriteHTML($html);

		$reportsDates = $this->reports_m->get_reportDates( $coin_id, $start_date, $end_date );

		$pdf->Ln(7);
		$pdf->SetFont('Arial', '', 10);
		$html1 = '';
		$html1 .= '<table border="1">
		<tr>
			<td width="80" height="30"><b>N' . utf8_decode("º") . 'Prest.</b></td>
			<td width="100" height="30"><b>Fecha prest.</b></td>
			<td width="120" height="30"><b>Monto prest.</b></td>
			<td width="65" height="30"><b>Int. %</b></td>
			<td width="65" height="30"><b>N' . utf8_decode("º") . 'cuot.</b></td>
			<td width="90" height="30"><b>Modalidad</b></td>
			<td width="100" height="30"><b>Total con Int.</b></td>
			<td width="79" height="30"><b>Estado</b></td>
		</tr>';

		$sum_m = 0; $sum_mi = 0;
		foreach( $reportsDates as $rd) {
			$sum_m = $sum_m + $rd->credit_amount;
			$sum_mi = $sum_mi + $rd->total_int;
			$html1 .= '
			<tr>
				<td width="80" height="30">' . $rd->id . '</td>
				<td width="100" height="30">' . $rd->date . '</td>
				<td width="120" height="30">' . $rd->credit_amount . '</td>
				<td width="65" height="30">' . $rd->interest_amount . '</td>
				<td width="65" height="30">' . $rd->num_fee . '</td>
				<td width="90" height="30">' . $rd->payment_m . '</td>
				<td width="100" height="30">' . $rd->total_int . '</td>
				<td width="79" height="30">' . ($rd->status ? "Pendiente" : "Cancelado") . '</td>
			</tr>';
		}

		$html1 .= '
		<tr>
			<td width="80" height="30"><b>Total</b></td>
			<td width="100" height="30">-----</td>
			<td width="120" height="30"><b>' . number_format($sum_m, 2) . '</b></td>
			<td width="65" height="30">-----</td>
			<td width="65" height="30">-----</td>
			<td width="90" height="30">-----</td>
			<td width="100" height="30"><b>' . number_format($sum_mi, 2) . '</b></td>
			<td width="79" height="30">-----</td>
		</tr>';
		$html1 .= '</table>';

		$pdf->WriteHTML($html1);

		$pdf->Output('reporteFechas.pdf' , 'I');
	}

	public function customers() 
	{
		$data['customers'] = $this->reports_m->get_reportsByCustomers();
		$data['subview'] = 'admin/reports/customers';
		$this->load->view( 'admin/_main_layout', $data );
	}

	public function customer_pdf($customer_id)
  	{
		require_once APPPATH.'third_party/fpdf184/html_table.php';

		$reportCst = $this->reports_m->get_reportLC($customer_id);
		//print_r($reportCst[0]->customer_name);

		$pdf = new PDF();
		$pdf->AddPage('P','A4',0);
		$pdf->SetFont('Arial','B',13);
		$pdf->Ln(7);
		$pdf->Cell(0,0,'Reporte de prestamos por cliente - '.$reportCst[0]->customer_name,0,1,'C');

		$pdf->Ln(8);
	
		$pdf->SetFont('Arial','',10);

		foreach ($reportCst as $rc) {

		$html = '<table border="0">
		<tr>
		<td width="120" height="30"><b>Monto credito:</b></td><td width="400" height="30">'.$rc->credit_amount.'</td><td width="120" height="30"><b>Numero Credito:</b></td><td width="55" height="30">'.$rc->id.'</td>
		</tr>
		<tr>
		<td width="120" height="30"><b>Interes credito:</b></td><td width="400" height="30">'.$rc->interest_amount.' %</td><td width="120" height="30"><b>Forma pago:</b></td><td width="55" height="30">'.$rc->payment_m.'</td>
		</tr>
		<tr>
		<td width="120" height="30"><b>Nro cuotas:</b></td><td width="400" height="30">'.$rc->num_fee.'</td><td width="120" height="30"><b>Fecha credito:</b></td><td width="55" height="30">'.$rc->date.'</td>
		</tr>
		<tr>
		<td width="120" height="30"><b>Monto cuota:</b></td><td width="400" height="30">'.$rc->fee_amount.'</td><td width="120" height="30"><b>Estado credito:</b></td><td width="55" height="30">'.($rc->status ? "Pendiente" : "Cancelado").'</td>
		</tr>
		<tr>
		<td width="120" height="30"><b>Tipo moneda:</b></td><td width="400" height="30">'.$rc->name.'('.$rc->short_name.')</td><td width="120" height="30"><b></b></td><td width="55" height="30"></td>
		</tr>
		</table>';

		$pdf->WriteHTML($html);

		$pdf->Ln(7);
		$pdf->SetFont('Arial','',10);

		$html1 = '';
		$html1 .= '<table border="1">
		<tr>
		<td width="120" height="30"><b>Nro Cuota</b></td><td width="120" height="30"><b>Fecha pago</b></td><td width="120" height="30"><b>Total pagar</b></td><td width="120" height="30"><b>Estado</b></td>
		</tr>';

		$loanItems = $this->reports_m->get_reportLI($rc->id);
		foreach ($loanItems as $li) {
		$html1 .= '
		<tr>
		<td width="120" height="30">'.$li->num_quota.'</td><td width="120" height="30">'.$li->date.'</td><td width="120" height="30">'.($li->status ? $li->fee_amount : "0.00").'</td><td width="120" height="30">'.($li->status ? "Pendiente" : "Cancelado").'</td>
		</tr>';
		}

		$html1 .= '</table>';

		$pdf->WriteHTML($html1);

		$pdf->Ln(7);

		}

		$pdf->Output('reporte_global_cliente.pdf', 'I');
  	}
}
