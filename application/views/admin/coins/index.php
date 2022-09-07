<!-- Customers DataTable  -->
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Monedas</h6>
		<!-- add customer button -->
		<a class="d-sm-inline-block btn btn-primary" href="<?php echo site_url('admin/coins/edit'); ?>">
		<i class="fas fa-plus-circle pr-2"></i>Nueva moneda
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
						<th>Moneda (plural)</th>
						<th>Moneda (singular)</th>
						<th>Código ISO</th>
						<th>Símbolo</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>Moneda (plural)</th>
						<th>Moneda (singular)</th>
						<th>Código ISO</th>
						<th>Símbolo</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</tfoot>
				<tbody>
					<?php if ( count( $coins ) ) : foreach( $coins as $coin ) : ?>
						<tr>
							<td><?php echo $coin->name ?></td>
							<td><?php echo $coin->singular_name ?></td>
							<td><?php echo $coin->short_name ?></td>
							<td><?php echo $coin->symbol ?></td>
							<td><?php echo $coin->description ?></td>
							<td class="text-center">
								<a href="<?php echo site_url('admin/coins/edit/' . $coin->id ); ?>" class="btn btn-sm btn-info shadow-sm">
									<i class="fas fa-edit fa-sm"></i> Editar
								</a>
							</td>
						</tr>	
					<?php endforeach; else : ?>		
						<tr>
							<td colspan="8" class="text-center">
								No existen monedas registradas en el sistema, favor añadir una <a href="<?php echo site_url('admin/coins/edit'); ?>">Nueva Moneda</a>
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
