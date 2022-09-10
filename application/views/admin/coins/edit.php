<div class="card shadow mb-4">
	<div class="card-header py-3">
		<?php echo empty( $coin->name ) ? 'Nueva Moneda' : 'Editar Moneda'; ?>
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

		<?php echo form_open(); ?>

			<div class="form-row py-3">
				<h5 class="text-info">Información de la moneda</h5>
			</div>

			<div class="form-row pb-4">
				<div class="col-12 col-md-6 mb-4">
					<label for="name">Nombre (plural) <sup class="text-danger">*</sup></label>
					<input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name', $this->input->post('name') ? $this->input->post('name') : $coin->name ); ?>" placeholder="Ej.: Dólares">
				</div>
				<div class="col-12 col-md-6 mb-4">
					<label for="singular_name">Nombre (singular)<sup class="text-danger">*</sup></label>
					<input type="text" id="singular_name" name="singular_name" class="form-control" value="<?php echo set_value('singular_name', $this->input->post('singular_name') ? $this->input->post('singular_name') : $coin->singular_name ); ?>" placeholder="Ej.: Dólar">
				</div>							
			</div>

			<div class="form-row pb-2">		
				<div class="col-12 col-md-2 mb-4">
					<label for="short_name">Código (Abreviatura) <sup class="text-danger">*</sup></label>
					<input type="text" id="short_name" name="short_name" class="form-control" value="<?php echo set_value('short_name', $this->input->post('short_name') ? $this->input->post('short_name') : $coin->short_name ); ?>" placeholder="Ej.: USD">
				</div>	
				<div class="col-12 col-md-2 mb-4">
					<label for="symbol">Símbolo <sup class="text-danger">*</sup></label>
					<input type="text" id="symbol" name="symbol" class="form-control" value="<?php echo set_value('symbol', $this->input->post('symbol') ? $this->input->post('symbol') : $coin->symbol ); ?>" placeholder="Ej.: $">
				</div>				
				<div class="col-12 col-md-8 mb-4">
					<label for="description">Descripción <sup class="text-danger">*</sup></label>
					<input type="text" id="description" name="description" class="form-control" value="<?php echo set_value('description', $this->input->post('description') ? $this->input->post('description') : $coin->description ); ?>" placeholder="Ej.: Dólar estadounidense">
				</div>	
			</div>			

			<div class="form-row mt-2">
				<small class="text-danger">* Campos requeridos</small>
			</div>

			<div class="form-row mt-4 mb-2">
				<button class="btn btn-primary" type="submit">Registrar moneda</button>
				<a href="<?php echo site_url('admin/coins/'); ?>" class="ml-2 btn btn-outline-secondary">Cancelar</a>
			</div>

		<?php echo form_close(); ?>

	</div>
</div>
