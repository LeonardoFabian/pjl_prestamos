<div class="card shadow mb-4">
	<div class="card-header py-3">
		Registrar Préstamo
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

		<?php echo form_open( 'admin/loans/edit', 'id="loan_form"' ); ?>

			<div class="form-row pb-4">
				<div class="col-8">
					<label for="name">Buscar Documento de Identidad</label>
					<div class="input-group">
						<input type="text" id="document_id" class="form-control" value="" placeholder="Ej.: 00100000002">
						<input type="hidden" name="customer_id" id="customer_id">
						<div class="input-group-append">
							<button type="button" id="search-customer" class="btn btn-primary">
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
				<div class="col-4">
					<label for="customer_document_id">Documento de Identidad</label>
					<input type="text" id="customer_document_id" class="form-control" value="" disabled>
				</div>
				<div class="col-4">
					<label for="customer_name">Nombre</label>
					<input type="text" id="customer_name" class="form-control text-uppercase" value="" disabled>
				</div>
			</div>

			<hr class="mt-4 mb-4" />

			<div class="form-row py-3">
				<h5 class="text-info">Datos del préstamo</h5>
			</div>

			<div class="form-row pb-2">
				<div class="col">
					<label for="credit_amount">Monto solicitado</label>
					<input type="number" id="credit_amount" name="credit_amount" class="form-control">
				</div>
				<div class="col">
					<label for="interest_amount">Interés (%)</label>
					<input type="number" id="interest_amount" name="interest_amount" class="form-control" >
				</div>
				<div class="col">
					<label for="num_fee">Cuotas</label>
					<input type="number" id="num_fee" name="num_fee" class="form-control" >
				</div>
			</div>

			<div class="form-row pb-2">				
				<div class="col-4">
					<label for="payment_m">Forma de pago</label>
					<select id="payment_m" name="payment_m" class="form-control">
						<option value="diario">Diario</option>
						<option value="semanal">Semanal</option>
						<option value="quincenal">Quincenal</option>
						<option value="mensual">Mensual</option>
					</select>
				</div>
				<div class="col-4">
					<label for="coin_id">Tipo de moneda</label>
					<select id="coin_id" name="coin_id" class="form-control">
						<?php foreach( $coins as $coin ) : ?>
							<option value="<?php echo $coin->id ?>"><?php echo $coin->short_name ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>

			<div class="form-row pb-2">
				<div class="col-3">
					<label for="issue_date">Fecha de emisión</label>
					<input type="date" id="issue_date" name="date" class="form-control">
				</div>
			</div>			

			<div class="form-row mt-4 pb-4">
				<div class="col-12 text-center">
					<button type="button" class="btn btn-success" id="calc-loan">Calcular Préstamo</button>
				</div>
			</div>		

			<div class="calc-loan-info form-row py-5 px-4" style="background-color: #d2f4e8;">
				<div class="col">
					<label for="fee_amount">Cuota</label>
					<input type="text" id="fee_amount" name="fee_amount" class="form-control" readonly>
				</div>
				<div class="col">
					<label for="interest_value">Interés (%)</label>
					<input type="text" id="interest_value" name="" class="form-control" disabled>
				</div>
				<div class="col">
					<label for="total_amount">Total</label>
					<input type="text" id="total_amount" name="" class="form-control" disabled>
				</div>
			</div>			

			<div class="form-row mt-2">
				<small class="text-danger">* Campos requeridos</small>
			</div>

			<div class="form-row mt-4 mb-2">
				<button class="btn btn-primary" id="register-loan" type="submit" disabled>Registrar préstamo</button>
				<a href="<?php echo site_url('admin/loans/'); ?>" class="ml-2 btn btn-outline-secondary">Cancelar</a>
			</div>

		<?php echo form_close(); ?>

	</div>
</div>
