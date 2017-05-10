$("#date_format").change(function(){
	var date_format = $(this).val();
	var csrf_token = $("input[name='csrf_token']").val();
	var data = {"date_format" : date_format,
				"csrf_token" : csrf_token,
				"sClass" : "ConfigureDateController",
				"sMethod": "preview"
		};
 
        $.post('index.php', data, function(response) {
		$("#date_format_preview").html(response)
});
})