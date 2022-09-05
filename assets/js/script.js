$(document).ready(function() {

	// get all states
	$("#country_id").change( function() {

		countryId = $("#country_id").val()

		$.get( base_url + "admin/customers/ajax_getStates/" + countryId, function( data ) {

			$("#state_id").html( data );

		});

	});

	// get all cities
	$("#state_id").change( function() {

		stateId = $("#state_id").val()

		$.get( base_url + "admin/customers/ajax_getCities/" + stateId, function( data ) {

			$("#city_id").html( data );
			
		});

	});

	// get user data by document id
	var callback = function() {

		var document_id = $("#document_id").val()

		if (document_id == "") {

			alert('Ingrese un número de documento')
			return false

		} else {

			$.post( base_url + "admin/loans/ajax_searchCustomer/", {document_id : document_id}, function(data) {

				console.log('sin parse', data)

				if ( data == '[]' ) {

					$("#document_id").val('');
					alert('Cliente no registrado. Debe registrar el cliente para poder realizar un prestamo');
					$("#customer_document_id").val('');
					$("#customer_name").val('');
					$("#customer_id").val('');

				} else {

					$("#document_id").val('');

					data = JSON.parse( data )

					console.log( 'con parse', data )

					if ( data.loan_status == '0' ) {

						$("#customer_id").val(data.id);
						$("#customer_document_id").val(data.document_id);
						$("#customer_name").val(data.first_name + ' ' + data.last_name);

					} else {

						alert('Cliente tiene prestamos pendientes')

						$("#customer_id").val('');
						$("#customer_document_id").val('');
						$("#customer_name").val('');

					}
				}
			})

		}
	}

	// execute callback function when enter is pressed
	$("#document_id").keypress( function(e) {

		if ( e.which == 13) callback();

	});

	// execute callback function when search customers is clicked
	$("#search-customer").click(callback);

	// calc loan when calc button is clicked 
	$("#calc-loan").on('click', function() {

		var counter = 0

		if ( $("#credit_amount").val() == "" ) {
			counter = 1
			alert("Ingrese el monto solicitado")
			$("#credit_amount").focus()
			return false;
		}
		if ( $("#interest_amount").val() == "" ) {
			counter = 1
			alert("Ingrese el % de interés a cobrar")
			$("#interest_amount").focus()
			return false;
		}
		if ( $("#num_fee").val() == "" ) {
			counter = 1
			alert("Ingrese el número de cuotas")
			$("#num_fee").focus()
			return false;
		}
		if ( $("#issue_date").val() == "" ) {
			counter = 1
			alert("Ingrese la fecha de emisión del préstamo")
			$("#issue_date").focus()
			return false;
		}

		if ( counter == 0 ) {

			$("#register-loan").attr('disabled', false);

		}

		let amount = parseFloat( $("#credit_amount").val() );
		let interest = $("#interest_amount").val();
		let feeQty = $("#num_fee").val();

		let totalInterest = amount * (interest / 100 );
		let totalAmount = totalInterest + amount;
		let feeAmount = totalAmount / feeQty;

		$("#fee_amount").val(feeAmount.toFixed(2));
		$("#interest_value").val(totalInterest.toFixed(2));
		$("#total_amount").val(totalAmount.toFixed(2));

	});

	$("#loan_form").submit( function() {
		if( $("#customer_id").val() == "" ) {
			alert("Debe seleccionar un cliente para realizar un préstamo" );
			return false;
		}
	})

});

