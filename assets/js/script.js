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

	$("#document_id").keypress( function(e) {

		if ( e.which == 13) callback();

	});

	$("#search-customer").click(callback);

});

