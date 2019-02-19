<?php
define ( "MODULE_ADMIN_HEADLINE", get_translation ( "CONFIGURE_DATE_FORMAT" ) );
function configure_date_format_admin() {
	if (get_request_method () == "post" && Request::getVar ( "save_date_format" )) {
		Settings::set ( "date_format", Request::getVar ( "date_format" ), "str" );
	}
	$date_format = Settings::get ( "date_format" );
	$controller = ControllerRegistry::get ( "ConfigureDateController" );
	$preview = $controller->format ( $date_format );
	
	?>
<form
	action="<?php echo ModuleHelper::buildAdminURL("configure_date_format");?>"
	method="post">
	<?php csrf_token_html();?>
	<?php
	if (get_request_method () == "POST" && Request::getVar ( "save_date_format" )) {
		?>
		
	<div class="alert alert-success alert-dismissable fade in">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?php translate("changes_was_saved")?>
		</div>
	<?php
	}
	?>
	<p>
		<strong><?php translate("date_format")?></strong> <br /> <input
			type="text" name="date_format" id="date_format"
			value="<?php Template::escape($date_format);?>"> <br />
	</p>
	<strong><?php translate("preview");?></strong>
	<div id="date_format_preview" class="alert alert-info""><?php Template::escape($preview);?></div>
	<input type="hidden" name="save_date_format" value="save_date_format">

	<div class="row">
		<div class="col-xs-6">
			<button type="submit" class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> <?php translate("save");?></button>
		</div>

		<div class="col-xs-6 text-right">
			<a
				href="http://php.net/manual/<?php Template::escape(getSystemLanguage());?>/function.date.php"
				target="_blank" class="btn btn-info"><i class="fa fa-question-circle" aria-hidden="true"></i> <?php translate("help");?></a>
		</div>
	</div>
</form>
<script type="text/javascript"
	src="<?php echo getModulePath("configure_date_format")?>js/date_format.js"></script>
<?php
}