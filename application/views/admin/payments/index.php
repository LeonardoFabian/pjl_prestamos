<!-- Customers DataTable  -->
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Pagos</h6>
		<!-- add customer button -->
		<a class="d-sm-inline-block btn btn-primary" href="<?php echo site_url('admin/payments/edit'); ?>">
		<i class="fas fa-plus-circle pr-2"></i>Realizar Pago
		</a>
	</div>
	<div class="card-body">

		<!-- msgs -->
		<?php if ( $this->session->flashdata( 'msg' ) ) : ?>
			<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
				<?= $this->session->flashdata( 'msg' ); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>		
		<?php endif; ?>							
		<!-- / msgs -->

		<div class="table-responsive">
			<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nº Documento</th>
						<th>Cliente</th>
						<th>Préstamo</th>
						<th>Nº Cuota</th>
						<th>Cuota</th>
						<th>Fecha de pago</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Nº Documento</th>
						<th>Cliente</th>
						<th>Préstamo</th>
						<th>Nº Cuota</th>
						<th>Cuota</th>
						<th>Fecha de pago</th>
					</tr>
				</tfoot>
				<tbody>
					<?php if ( count( $payments ) ) : foreach( $payments as $payment ) : ?>
						<tr>
							<td><?php echo $payment->document_id ?></td>
							<td class="text-uppercase"><?php echo $payment->name_customer ?></td>
							<td class="text-uppercase"><?php echo $payment->loan_id ?></td>
							<td class="text-uppercase"><?php echo $payment->num_quota ?></td>				
							<td><?php echo $payment->symbol . $payment->fee_amount ?></td>
							<td><?php echo $payment->pay_date ?></td>							
						</tr>	
					<?php endforeach; else : ?>		
						<tr>
							<td colspan="8" class="text-center">
								No existen pagos registrados en el sistema, si desea puede registrar un  
								<a href="<?php echo site_url('admin/payments/edit'); ?>">Nuevo Pago</a>
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Floating Action Button -->	
<?php $this->load->view( 'admin/components/fab' ); ?>

<div class="modal fade" id="customerInfoModal" data-keyboard="false" tabindex="-1" aria-labelledby="staticModalTitle" aria-hidden="true"></div>
