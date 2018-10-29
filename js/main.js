$(document).ready(function() {
	var index = 'blog';

	$.ajax({
		type: "POST",
		data: {acao : 'new_index',  index : index},
		async: false,
		url: './api/index.php',
		success: function(data) {
			var resp = $.parseJSON(data);
			console.log(resp);
		}
	});

});