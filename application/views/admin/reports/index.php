<div class="card shadow mb-4"
<div class="card header d flex align items center justify content betwen py 3">
<h6 class= "m-0 font-weight-bold text-primary" Reumen general de prestamos</h6>
<a class= "d-sm-inline-block btn btn-success shadow-sm" href="#" onclick="imp_credits(imp1);"><i class="fas fa-print  fa-sn"></i>Imprimir</a>
</div>

<div class="card-body">

<div class="form-row">
<div class= "form-group col-4">

<label class="small mb-1" for="exampleFormControlSelect2">Tipo de moneda</label>
<select class="form-control" id="coin_type" name="coin_type">
<?php foreach($coins as $e): ?>
<option value="<?php echo $e-id ?>"><?php echo $e->name.'('.strtoupper($e->short_name).')'?></option>
<?php endforeach ?>
</select>
</div>
</div>

<div class="table-responsive" id="imp1">
<table class="table" width="100%" cellspacing="0">
<thead class="thead-dark">
<tr>
<th>Descripcion</th>
<th class= "text-right">Cantidad</th>
</tr>
</thead>
<tbody>
<tr>
<tr> Total credito</tr>
<td class="text-right" id="cr"><?php echo $credits[0]->sum_credit.' '.strtoupper($credits[0]->short_name) ?></td>
</tr>
<tr>
<td> Total credito con interes</td>
<td class=" text-right" id="cr_interest"><?php echo $credits[1]->cr_interest.' '. .strtoupper($credits[1]->short_name) ?></td>
