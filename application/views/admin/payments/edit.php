<div class="card shadow mb-4">
	<div class="card-header py-3">
		Realizar Pago
	</div>
	<!-- card-body -->
	<div class="card-body">

		<!-- errors --> 
		<?php if ( validation_errors() ) { ?> 
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?php echo validation_errors(); ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php } ?>

		<?php echo form_open( 'admin/payments/checkout' ); ?>

			<div class="form-row mt-4 mb-4 text-center">
				<div class="col-12 col-md-4 m-auto">
					<label for="dni"><i class="fas fa-id-card fa-lg mr-2"></i>Consultar Documento de Identidad</label>
					<div class="input-group">						
						<input type="text" id="dni" class="form-control" value="" placeholder="Ej.: 00100000002">
						<input type="hidden" name="loan_id" id="loan_id" value="">
						<input type="hidden" name="customer_id" id="customer_id">
						<div class="input-group-append">
							<button type="button" id="search-client" class="btn btn-primary">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</div>							
			</div>

			<div class="form-row py-3">
				<h5 class="text-info">Datos del cliente</h5>
			</div>

			<div class="form-row pb-2">
				<div class="col-12 col-md-4 mb-4">
					<label for="customer_document_id">Documento de Identidad</label>
					<input type="text" id="customer_document_id" class="form-control" value="" readonly>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<label for="customer_name">Nombre</label>
					<input type="text" id="customer_name" name="customer_name" class="form-control text-uppercase" value="" readonly>
				</div>
			</div>

			<hr class="mt-4 mb-4" />

			<div class="form-row py-3">
				<h5 class="text-info">Datos del préstamo</h5>
			</div>

			<div class="form-row pb-2">
				<div class="col-12 col-md-4 mb-4">
					<label for="credit_amount">Monto solicitado</label>
					<input type="text" id="credit_amount" name="credit_amount" class="form-control" disabled>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<label for="payment_m">Forma de pago</label>
					<input type="text" id="payment_m" name="payment_m" class="form-control" disabled>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<label for="coin">Moneda</label>
					<input type="text" id="coin" name="coin" class="form-control" readonly>
				</div>
			</div>		
			
			<hr class="mt-4 mb-4" />

			<div class="form-row py-3">
				<h5 class="text-info">Listado de Cuotas</h5>
			</div>

			<div class="form-row mt-4 pb-2">
				<div class="form-group col-12 col-md-8">
					<table class="table table-bordered" id="quotas" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th><input type="checkbox" id="quota-checkbox-selector"></th>
								<th>Nº Cuota</th>
								<th>Fecha de pago</th>
								<th>Monto</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
				<div class="form-group col-12 col-md-4">
					<label for="total_amount" class="small mb-1">Monto Total</label>
					<input type="text" id="total_amount" class="form-control mb-3 text-center" style="font-weight: bold; font-size: 1.2rem;" disabled>

					<div class="row">
						<div class="col-6">
							<button class="btn btn-success btn-block" id="register_loan" type="submit" disabled>Registrar Pago</button>
						</div>
						<div class="col-6">
							<a href="<?php echo site_url('admin/payments/'); ?>" class="btn btn-outline-secondary btn-block">Cancelar</a>
						</div>
					</div>
				</div>
			</div>			

		<?php echo form_close(); ?>

	</div>
</div>
