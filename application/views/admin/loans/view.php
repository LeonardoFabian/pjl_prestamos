<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<div class="float-left">
				<h5 class="modal-title" id="staticModalTitle">
					Préstamo # <?php echo $loan->id ?>			
				</h5>
				<p>
					Cliente: <span class="text-uppercase"><?= strtoupper($loan->customer_name) ?></span>
					<br>
					Documento Nº: <?= $loan->document_id ?>
				</p>
			</div>
			<div class="d-flex flex-row-reverse">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times fa-sm"></i></button>
				<button type="button" class="close" onclick="window.print();"><i class="fas fa-print fa-sm"></i></button>
			</div>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="table-responsive">
						<div class="clearfix mb-2">
							<div class="float-left">
								Monto: <?= $loan->symbol . $loan->credit_amount; ?>
								<br>
								Tasa (%): <?= $loan->interest_amount . '%'; ?>
								<br>
								Cuota: <?= $loan->symbol . $loan->fee_amount; ?>						
								<br>
								Plazo (<?= $loan->payment_m ?>): <?= $loan->num_fee; ?>
								<br>
								Moneda: <?= strtoupper($loan->short_name); ?>
							</div>
							<div class="float-right">
								Fecha: <?= $loan->date; ?>
								<br>
								Estado: <?= $loan->status ? 'Pendiente' : 'Pagado'; ?>
							</div>
						</div>

						<div class="table-responsive">
							<table class="table table-striped table-condensed">
								<thead>
									<tr class="active">
										<th>Cuota Nº</th>
										<th class="col-xs-2">Fecha de pago</th>
										<th class="col-xs-2 text-right">Cuota</th>
										<th class="col-xs-2 text-center">Estado</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										if ( $items ) {
											$i = 0;
											foreach ( $items as $item ) {
												echo '<tr>';
													echo '<td>'. ++$i .'</td>';
													echo '<td>'. $item->date .'</td>';
													echo '<td class="text-right">'. $item->fee_amount .'</td>';

													$status = ($item->status) ? 'Pendiente' : 'Pagado';
													echo '<td class="text-center">'. $status .'</td>';								
												echo '</tr>';
											}
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
