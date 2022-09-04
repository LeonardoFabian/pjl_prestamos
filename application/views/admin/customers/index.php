<!-- Customers DataTable  -->
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
		<!-- add customer button -->
		<a class="d-sm-inline-block btn btn-primary" href="<?php echo site_url('admin/customers/edit'); ?>">
			<i class="fas user-plus pr-2"></i>Nuevo cliente
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
						<th>Documento</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Correo</th>
						<th>Celular</th>
						<th>Télefono</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Documento</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Correo</th>
						<th>Celular</th>
						<th>Télefono</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</tfoot>
				<tbody>
					<?php if ( count( $customers ) ) : foreach( $customers as $customer ) : ?>
						<tr>
							<td><?php echo $customer->document_id ?></td>
							<td><?php echo $customer->first_name ?></td>
							<td><?php echo $customer->last_name ?></td>
							<td><?php echo $customer->email ?></td>
							<td><?php echo $customer->mobile ?></td>
							<td><?php echo $customer->phone ?></td>
							<td class="text-center">
								<button type="button" class="btn btn-sm <?php echo $customer->loan_status ? 'btn-outline-danger' : 'btn-outline-success' ?> status-check"><?php echo $customer->loan_status ? 'Con Crédito' : 'Sin Crédito' ?></button>
							</td>
							<td class="text-center">
								<a href="<?php echo site_url('admin/customers/edit/' . $customer->id ); ?>" class="btn btn-sm btn-info shadow-sm">
									<i class="fas fa-edit fa-sm"></i> Editar
								</a>
							</td>
						</tr>	
					<?php endforeach; else : ?>		
						<tr>
							<td colspan="8" class="text-center">
								No existen registros de Clientes, favor añadir un 
								<a class="d-sm-inline-block btn btn-primary" href="<?php echo site_url('admin/customers/edit'); ?>">Nuevo cliente</a>
							</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>
