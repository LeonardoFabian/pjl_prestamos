<div class="card shadow mb-4">
	<div class="card-header py-3">
		Nuevo Cliente
	</div>
	<!-- card-body -->
	<div class="card-body">

		<?php echo form_open(); ?>

			<div class="form-row pb-2">
				<div class="col">
					<label for="document_id">Documento de Identidad</label>
					<input type="text" id="document_id" class="form-control" placeholder="">
				</div>
				<div class="col">
					<label for="first_name">Nombre</label>
					<input type="text" id="first_name" class="form-control" placeholder="">
				</div>
				<div class="col">
					<label for="last_name">Apellidos</label>
					<input type="text" id="last_name" class="form-control" placeholder="">
				</div>
				<div class="col">
					<label for="gender">Género</label>
					<select id="gender" class="form-control">
						<option selected>Selecciona...</option>
						<option>Masculino</option>
						<option>Femenino</option>
					</select>
				</div>
			</div>

			<hr class="mt-4 mb-4" />

			<div class="form-row pb-2">
				<!-- country -->
				<div class="col">
					<label for="country_id">País</label>
					<select id="country_id" class="form-control">
						<option selected>Selecciona...</option>
						<option>Estados Unidos</option>
						<option>República Dominicana</option>
					</select>
				</div>
				<!-- /country -->
				<!-- state -->
				<div class="col">
					<label for="state_id">Provincia o Estado</label>
					<select id="state_id" class="form-control">
						<option selected>Selecciona...</option>
						<option>Distrito Nacional</option>
						<option>Santo Domingo</option>
					</select>
				</div>
				<!-- /state -->
				<!-- city -->
				<div class="col">
					<label for="city_id">Ciudad o Municipio</label>
					<select id="city_id" class="form-control">
						<option selected>Selecciona...</option>
						<option>Santo Domingo de Guzmán</option>
						<option>Las Yayas</option>
					</select>
				</div>
				<!-- /city -->
			</div>

			<!-- address -->
			<div class="form-row pb-2">
				<label for="address">Dirección</label>
    			<textarea class="form-control" id="address" rows="3"></textarea>
			</div>
			
			<div class="form-row pb-2">
				<div class="col">
					<label for="apto">Apto/Casa</label>
					<input type="text" id="apto" class="form-control" placeholder="">
				</div>
				<div class="col">
					<label for="floor">Piso<sup>*</sup></label>
					<input type="text" id="floor" class="form-control" placeholder="">
				</div>
			</div>

			<div class="form-row mt-4 mb-2">
				<button class="btn btn-primary" type="submit">Registrar cliente</button>
				<a href="<?php echo site_url('admin/customers/'); ?>" class="ml-2 btn btn-outline-secondary">Cancelar</a>
			</div>

		<?php echo form_close(); ?>

	</div>
</div>
