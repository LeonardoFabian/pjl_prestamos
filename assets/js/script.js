$(document).ready(function() {

	$("#country_id").change( function() {

		countryId = $("#country_id").val()

		$.get( base_url + "admin/customers/ajax_getStates/" + countryId, function( data ) {

			$("#state_id").html( data );

		});

	});

	$("#state_id").change( function() {

		stateId = $("#state_id").val()

		$.get( base_url + "admin/customers/ajax_getCities/" + stateId, function( data ) {

			$("#city_id").html( data );
			
		});

	});

});

