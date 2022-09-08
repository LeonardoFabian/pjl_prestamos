$(document).ready(function() {

	$("#coin_type").change( function() {

		var coin_id = $("#coin_type").val()
		var symbol = $('#coin_type option:selected').data("symbol");

		$.get( base_url + "admin/reports/ajax_getCreditsByCoin/" + coin_id, function(data) {

			data = JSON.parse(data);
			console.log('con parse', data)

			if ( data.credits[0].credits_sum == null) {
				var credit_sum = '0 ' + symbol.toUpperCase()
			} else {
				var credit_sum = data.credits[0].credits_sum + ' ' + (data.credits[0].short_name).toUpperCase()
			}
			$("#cr").html(credit_sum)

			if (data.credits[1].credits_interest == null ) {
				var credit_interest = '0 ' + symbol.toUpperCase()
			} else {
				var credit_interest = data.credits[1].credits_interest + ' ' + (data.credits[1].short_name).toUpperCase()
			}
			$("#cr_interest").html(credit_interest)

			if (data.credits[2].credits_interest_paid == null) {
				var cr_interestPaid = '0 ' + symbol.toUpperCase()
			} else {
				var cr_interestPaid = data.credits[2].credits_interest_paid + ' ' + (data.credits[2].short_name).toUpperCase()
			}
			$("#cr_interestPaid").html(cr_interestPaid)

			if (data.credits[3].credits_interest_collect == null) {
				var cr_interestCollect = '0 ' + symbol.toUpperCase()
			} else {
				var cr_interestCollect = data.credits[3].credits_interest_collect + ' ' + (data.credits[3].short_name).toUpperCase()
			}

			$("#cr_interestCollect").html(cr_interestCollect)

		});

	});

});

function print_report(report) {

	var printContent = document.getElementById('report').innerHTML;

	w = window.open();

	w.document.write(printContent);

	w.document.close();

	w.focus();

	w.print();

	w.close();
	
}

function reportPDF() {
	var startDate = $("#start_date").val();
	var endDate = $("#end_date").val();
	var coinType = $("#date_coin_type").val();

	if ( startDate == '' || endDate == '' ) {

		alert('Seleccione el rango de fechas que desea consultar')

	} else {

		window.open( base_url + 'admin/reports/dates_pdf/' + coinType + '/' + startDate + '/' + endDate )

	}
}
