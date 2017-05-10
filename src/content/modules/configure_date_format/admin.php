<?php
define ( "MODULE_ADMIN_HEADLINE", get_translation ( "CONFIGURE_DATE_FORMAT" ) );
function configure_date_format_admin() {
	$date_format = Settings::get ( $date_format );
	$controller = ControllerRegistry::get ( "ConfigureDateController" );
	$preview = $controller->format ( $date_format );
	?>
<form
	action="<?php echo ModuleHelper::buildAdminURL("configure_date_format");?>"
	method="post">
	<?php csrf_token_html();?>
	<strong><?php translate("date_format")?></strong> <br /> <input
		type="text" name="date_format" id="date_format"
		value="<?php Template::escape($date_format);?>"> <br />
	<div id="date_format_preview"><?php Template::escape($preview);?></div>
	<script type="text/javascript"
		src="<?php echo getModulePath("configure_date_format")?>js/date_format.js"></script>
</form>
<?php
}