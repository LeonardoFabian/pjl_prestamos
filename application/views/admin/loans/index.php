<!-- Customers DataTable  -->
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Préstamos</h6>
		<!-- add customer button -->
		<a class="d-sm-inline-block btn btn-primary" href="<?php echo site_url('admin/loans/edit'); ?>">
			<i class="fas user-plus pr-2"></i>Nuevo prestamo
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
						<th>Nº</th>
						<th>Cliente</th>
						<th>Monto</th>
						<th>Interés</th>
						<th>Total</th>
						<th>Moneda</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Nº</th>
						<th>Cliente</th>
						<th>Monto</th>
						<th>Interés</th>
						<th>Total</th>
						<th>Moneda</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</tfoot>
				<tbody>
					<?php if ( count( $loans ) ) : foreach( $loans as $loan ) : ?>
						<tr>
							<td><?php echo $loan->id ?></td>
							<td class="text-uppercase"><?php echo $loan->customer ?></td>
							<td>
								<?php 
									$floatCreditAmount = floatval($loan->credit_amount);
									echo $loan->symbol . number_format($floatCreditAmount, 2); 
								?>
							</td>
							<td>
								<?php 
									$interest = $floatCreditAmount * (floatval($loan->interest_amount)/100);
									echo $loan->symbol . number_format($interest, 2);
								?>
							</td>
							<td>
								<?php 
									$total = floatval($loan->credit_amount) + floatval($interest); 
									echo $loan->symbol . number_format($total, 2);
								?>
							</td>
							<td><?php echo $loan->short_name ?></td>
							<td>
								<button type="button" class="btn btn-sm <?php echo $loan->status ? 'btn-outline-danger' : 'btn-outline-success' ?> status-check"><?php echo $loan->status ? 'Pendiente' : 'Pagado' ?></button>	
							</td>
							<td class="text-center">
								<a href="<?php echo site_url('admin/loans/view/' . $loan->id ); ?>" class="btn btn-sm btn-info shadow-sm" data-toggle="ajax-modal">
									<i class="fas fa-eye fa-sm"></i> Ver
								</a>
							</td>
						</tr>	
					<?php endforeach; else : ?>		
						<tr>
							<td colspan="8" class="text-center">
								No existen prestamos registrados en el sistema, si desea puede registrar un  
								<a class="d-sm-inline-block btn btn-primary" href="<?php echo site_url('admin/leans/edit'); ?>"> nuevo prestamo</a>
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="modal fade" id="customerInfoModal" data-keyboard="false" tabindex="-1" aria-labelledby="staticModalTitle" aria-hidden="true"></div>
