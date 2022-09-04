<div class="card shadow mb-4">
	<div class="card-header py-3">
		Nuevo Cliente
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
				<h5 class="text-info">Datos Personales</h5>
			</div>

			<div class="form-row pb-2">
				<div class="col-3">
					<label for="document_id">Documento de Identidad <sup class="text-danger">*</sup></label>
					<input type="text" id="document_id" name="document_id" class="form-control" value="<?php echo set_value('document_id', $this->input->post('document_id') ? $this->input->post('document_id') : $customer->document_id ); ?>">
				</div>
				<div class="col">
					<label for="first_name">Nombre <sup class="text-danger">*</sup></label>
					<input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo set_value('first_name', $this->input->post('first_name') ? $this->input->post('first_name') : $customer->first_name ); ?>">
				</div>
				<div class="col">
					<label for="last_name">Apellidos <sup class="text-danger">*</sup></label>
					<input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo set_value('last_name', $this->input->post('last_name') ? $this->input->post('last_name') : $customer->last_name ); ?>">>
				</div>				
			</div>

			<div class="form-row pb-2">				
				<div class="col-4">
					<label for="gender">Género</label>
					<select id="gender" name="gender" class="form-control">
						<?php if ( $customer->gender == 'none' ) : ?>
							<option value="" selected>Seleccione</option>
						<?php endif ?>
						<option value="masculino" <?php if ($customer->gender == 'masculino') echo "selected" ?>>Masculino</option>
						<option value="femenino" <?php if ($customer->gender == 'femenino') echo "selected" ?>>Femenino</option>
						<option value="no especificado" <?php if ($customer->gender == 'no especificado') echo "selected" ?>>No especificado</option>
					</select>
				</div>
				<div class="col-4">
					<label for="birthday">Fecha de nacimiento <sup class="text-danger">*</sup></label>
					<input type="date" id="birthday" name="birthday" class="form-control">
				</div>	
			</div>

			<hr class="mt-4 mb-4" />

			<div class="form-row py-3">
				<h5 class="text-info">Dirección</h5>
			</div>

			<div class="form-row pb-2">
				<!-- country -->
				<div class="col">
					<label for="country_id">País <sup class="text-danger">*</sup></label>
					<select id="country_id" name="country_id" class="form-control">
						<?php if ( $customer->country_id == 0 ) : ?>
							<option value="" selected>Selecciona...</option>
						<?php endif ?>
						<?php foreach( $countries as $country ) : ?>
							<option value="<?php echo $country->id ?>" <?php if ( $country->id == $customer->country_id ) echo "selected" ?> ><?php echo $country->name ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<!-- /country -->
				<!-- state -->
				<div class="col">
					<label for="state_id">Provincia o Estado <sup class="text-danger">*</sup></label>
					<select id="state_id" name="state_id" class="form-control">
						<?php if ( $customer->state_id == 0 ) : ?>
							<option value="" selected>Selecciona</option>
						<?php else : ?>
							<?php foreach ( $states as $state ) : ?>
								<option value="<?php echo $state->id ?>" <?php if($state->id == $customer->state_id) echo "selected" ?> ><?php echo $state->name ?></option>
							<?php endforeach ?>
						<?php endif ?>
					</select>
				</div>
				<!-- /state -->
				<!-- city -->
				<div class="col">
					<label for="city_id">Ciudad o Municipio <sup class="text-danger">*</sup></label>
					<select id="city_id" name="city_id" class="form-control">
						<?php if ( $customer->city_id == 0 ) : ?>
							<option value="" selected>Selecciona</option>
						<?php else : ?>  
							<?php foreach ( $cities as $city ) : ?>
								<option value="<?php echo $city->id ?>" <?php if ( $city->id == $customer->city_id ) echo "selected" ?> ><?php echo $city->name ?></option>
							<?php endforeach ?>
						<?php endif ?>
					</select>
				</div>
				<!-- /city -->
			</div>

			<!-- address -->
			<div class="form-row pb-2">
				<label for="address">Dirección</label>
    			<textarea class="form-control" id="address" name="address" rows="3" value=""></textarea>
			</div>
			
			<div class="form-row pb-2">
				<div class="col-3">
					<label for="apto">Apto/Casa <sup class="text-danger">*</sup></label>
					<input type="text" id="apto" name="apto" class="form-control" value="">
				</div>
				<div class="col-3">
					<label for="floor">Piso</label>
					<input type="text" id="floor" name="floor" class="form-control" value="">
				</div>
			</div>

			<hr class="mt-4 mb-4" />

			<div class="form-row py-3">
				<h5 class="text-info">Información de Contacto</h5>
			</div>

			<div class="form-row pb-2">
				<div class="col">
					<label for="mobile">Celular <sup class="text-danger">*</sup></label>
					<input type="text" id="mobile" name="mobile" class="form-control" value="">
				</div>
				<div class="col">
					<label for="phone">Télefono</label>
					<input type="text" id="phone" name="phone" class="form-control" value="">
				</div>
				<div class="col-6">
					<label for="email">Correo</label>
					<input type="email" id="email" name="email"  class="form-control" value="">
				</div>				
			</div>

			<hr class="mt-4 mb-4" />

			<div class="form-row py-3">
				<h5 class="text-info">Datos de la Empresa</h5>
			</div>

			<div class="form-row pb-2">
				<div class="col-3">
					<label for="business_name">Razón Social</label>
					<input type="text" id="business_name" name="business_name"  class="form-control" value="">
				</div>
				<div class="col">
					<label for="rnc">RNC</label>
					<input type="text" id="rnc" name="rnc" class="form-control" value="">
				</div>
				<div class="col-6">
					<label for="company">Nombre Comercial</label>
					<input type="text" id="company" name="company" class="form-control" value="">
				</div>				
			</div>

			<div class="form-row pb-2">
				<div class="col-3">
					<label for="company_phone">Télefono de la empresa</label>
					<input type="text" name="company_phone" id="company_phone" class="form-control" value="">
				</div>
				<div class="col">
					<label for="company_address">Dirección de la empresa</label>
					<input type="text" name="company_address" id="company_address" class="form-control" value="">
				</div>				
			</div>

			<div class="form-row mt-2">
				<small class="text-danger">* Campos requeridos</small>
			</div>

			<div class="form-row mt-4 mb-2">
				<button class="btn btn-primary" type="submit">Registrar cliente</button>
				<a href="<?php echo site_url('admin/customers/'); ?>" class="ml-2 btn btn-outline-secondary">Cancelar</a>
			</div>

		<?php echo form_close(); ?>

	</div>
</div>
