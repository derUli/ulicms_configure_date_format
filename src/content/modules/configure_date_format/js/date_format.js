$("#date_format").keyup(function(){
	var date_format = $(this).val();
	var csrf_token = $("input[name='csrf_token']").val();
	var data = {"date_format" : date_format,
				"csrf_token" : csrf_token,
				"sClass" : "ConfigureDateController",
				"sMethod": "preview"
		};
 
        $.post('index.php', data, function(response) {
		if(response.length == 0){

			$("#date_format_preview").html("&nbsp;")
		} else {
			$("#date_format_preview").html(response)
		}
});
})