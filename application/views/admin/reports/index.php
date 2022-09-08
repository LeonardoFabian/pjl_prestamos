<!-- Customers DataTable  -->
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Reporte General de Préstamos</h6>
		<!-- add customer button -->
		<a class="d-sm-inline-block btn btn-success" href="#" onclick="print_report(report);">
		<i class="fas fa-print fa-sm pr-2"></i>Imprimir
		</a>
	</div>
	<div class="card-body">	

		<div class="form-row mt-4 mb-4">
			<div class="form-group col-4">
				<label class="small mb-1" for="coin_type">Tipo de moneda</label>
				<select type="text" id="coin_type" name="coin_type" class="form-control">
					<option value="0">Seleccionar moneda</option>
					<?php foreach ( $coins as $coin ) : ?>
						<option value="<?php echo $coin->id ?>" data-symbol="<?php echo $coin->short_name ?>"><?php echo $coin->name . ' ('. strtoupper($coin->short_name) . ')' ?></option>
					<?php endforeach ?>
				</select>	
			</div>							
		</div>

		<div class="table-responsive" id="report">
			<table class="table" width="100%" cellspacing="0">
				<thead class="thead-success">
					<tr>
						<th class="text-success">Descripción</th>
						<th class="text-right text-success">Cantidad</th>					
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Total Crédito</td>
						<td class="text-right" id="cr">0</td>			
					</tr>	
					<tr>
						<td>Total Crédito con Interés</td>
						<td class="text-right" id="cr_interest">0</td>			
					</tr>		
					<tr>
						<td>Total Crédito Cancelado con Interés</td>
						<td class="text-right" id="cr_interestPaid">0</td>			
					</tr>	
					<tr>
						<td>Total Crédito por Cobrar con Interés</td>
						<td class="text-right" id="cr_interestCollect">0</td>			
					</tr>					
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- Floating Action Button -->	
<?php $this->load->view( 'admin/components/fab-print' ); ?>

<!-- <div class="modal fade" id="customerInfoModal" data-keyboard="false" tabindex="-1" aria-labelledby="staticModalTitle" aria-hidden="true"></div> -->
