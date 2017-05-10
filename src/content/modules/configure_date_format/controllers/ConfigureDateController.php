<?php
class ConfigureDateController extends Controller {
	public function format($format, $time = time()) {
		return date ( $format, $time );
	}
	public function preview() {
		$format = Request::getVar ( "date_format", "", "str" );
		die ( Template::getEscape ( $this->format ( $format ) ) );
	}
}