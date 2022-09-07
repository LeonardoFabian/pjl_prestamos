<!-- Customers DataTable  -->
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Administrar Usuario</h6>
		<!-- add customer button -->
		<!-- <a class="d-sm-inline-block btn btn-primary" href="<?php echo site_url('admin/payments/edit'); ?>">
		<i class="fas fa-plus-circle pr-2"></i>Realizar Pago
		</a> -->
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
			<div class="form-row pb-2">
				<div class="form-group col-md-4">
					<label for="first_name">Nombre</label>
    				<input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo set_value('first_name', $this->input->post('first_name') ? $this->input->post('first_name') : $user->first_name ); ?>">
				</div>
				<div class="form-group col-md-4">
					<label for="last_name">Apellidos</label>
    				<input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo set_value('last_name', $this->input->post('last_name') ? $this->input->post('last_name') : $user->last_name ); ?>">
				</div>
				<div class="form-group col-md-4">
					<label for="email">Correo Electrónico</label>
    				<input type="email" id="email" name="email" class="form-control" value="<?php echo set_value('email', $this->input->post('email') ? $this->input->post('email') : $user->email ); ?>">
				</div>
			</div>		
			
			<div class="form-row mt-4 mb-2">
				<button class="btn btn-primary" type="submit">Guardar Datos</button>
				<a href="<?php echo site_url('admin/dashboard/'); ?>" class="ml-2 btn btn-outline-secondary">Cancelar</a>
			</div>
		<?php echo form_close(); ?>
	</div>
</div>
