<!-- Customers DataTable  -->
<div class="card shadow mb-4">
	<div class="card-header d-flex align-items-center justify-content-between py-3">
		<h6 class="m-0 font-weight-bold text-primary">Reporte de Préstamos por rango de fechas</h6>	
	</div>
	<div class="card-body">	

		<div class="form-row mt-4 mb-4">
			<div class="form-group col-md-3">
				<label class="small mb-1" for="start_date">Desde</label>
				<input type="date" id="start_date" class="form-control">
			</div>

			<div class="form-group col-md-3">
				<label class="small mb-1" for="end_date">Hasta</label>
				<input type="date" id="end_date" class="form-control">
			</div>

			<div class="form-group col-md-3">
				<label class="small mb-1" for="date_coin_type">Tipo de moneda</label>
				<select type="text" id="date_coin_type" name="date_coin_type" class="form-control">
					<?php foreach ( $coins as $coin ) : ?>
						<option value="<?php echo $coin->id ?>"><?php echo $coin->name . ' ('. strtoupper($coin->short_name) . ')' ?></option>
					<?php endforeach ?>
				</select>	
			</div>	
			
			<div class="form-group col-md-3 d-flex justify-content-end align-items-end">
				<a class="btn btn-success" href="javascript:reportPDF()">
				<i class="fas fa-print fa-sm pr-2"></i>Imprimir</a>
			</div>

		</div>		
	</div>
</div>

<!-- Floating Action Button -->	
<div class="fab-container">		
	<div class="sub-button shadow bg-success">
		<a href="javascript:reportPDF()">
		<i class="fas fa-print fa-lg text-white"></i>
		</a>
	</div>
</div>

<!-- <div class="modal fade" id="customerInfoModal" data-keyboard="false" tabindex="-1" aria-labelledby="staticModalTitle" aria-hidden="true"></div> -->
