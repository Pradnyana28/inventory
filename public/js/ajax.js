function loader(element) {
	var loader = '<div class="bp-spinner loader-wrapper">Sedang diproses...</div>';
	if (element != 'hide') {
		return $("#" + element).after(loader);
	} else {
		$(".bp-spinner").hide();
	}
}

function notif(model, message) {
	jQuery.toast({
        position: 'bottom-right',
        text: message
    })
}

function _post(content, btn, err_element, process_url, redirect, hideForm, data_type) {

	var contents = content.serialize(),
	    btns = document.getElementById(btn),
		 me = $(this);

	if (me.data('requestRunning')) {
		return;
	}

	me.data('requestRunning', true);

	$.ajax({
		url: process_url,
		dataType: 'json',
		type: data_type,
		data: contents,
		beforeSend: function() {
			$("#"+ btn).hide();
			loader(btn);
		},
		error: function(jqXHR, status, thrown) {
			$("#"+ btn).show();
			loader('hide');
			notif('error', "We are sorry, something error with the system. But you can come back later and try again.");
		},
		success: function(data) {

			if ( data.success ) {

				if (data.redirect != false || redirect == true) {
					window.location.href = data.redirect;
				} else {

					$("#"+ btn).show();
					$(".loader-wrapper").remove();

					// btns.innerHTML = btnMes;
					if ( hideForm == true ) {
						$("#" + btn).prop('disabled', 'disabled');
						$("form").addClass('mfp-hide');
					}

					notif('success', data.result);
				}

			} else {
				$("#"+ btn).show();
				$(".loader-wrapper").remove();
				notif('error', data.result);
			}

		},
		complete: function() {
			me.data('requestRunning', false);
		}
	});
}

$("form[ja-ajax]").on('submit', function() {

	var data_request = $(this).attr("ja-request"),
		data_redirect = $(this).attr("ja-redirect"),
		data_type = $(this).attr("ja-type"),
	    redirect = true,
	    btn = $(this).find("button[ja-send]");

	// Set random number var button id
	var number = 1 + Math.floor(Math.random() * 6),
		btn_value = "ja-SubmitBtn_" + number;

	if (data_request == "") {
		alert("Missing attribute data-request");
	} else {

		// Set button id atribute with random value
		btn.attr("id", btn_value);

		if (data_redirect === undefined) {
			redirect = false;
		}

		if (data_type === undefined) {
			data_type = 'POST';
		}

		// Ajax request
		_post($(this), btn_value, "", data_request, redirect, false, data_type);

	}

	return false;

});
