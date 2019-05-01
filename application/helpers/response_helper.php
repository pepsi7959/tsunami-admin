<?php

if (!function_exists('jsonObjectSuccess')) {
	function jsonObjectSuccess($data=null) {
		return array(
			'success' => true,
			'resultcode' => 200,
			'message' => '',
			'data' => $data
		);
	}
}

if (!function_exists('jsonObjectFail')) {
	function jsonObjectFail($status_code, $message, $data=null) {
		return array(
			'success' => false,
			'resultcode' => $status_code,
			'message' => $message,
			'data' => $data
		);
	}
}

if (!function_exists('responseSuccess')) {
	function responseSuccess($controller, $data=null) {
		if (!($controller instanceof CI_Controller)) {
			return false;
		}
		
		$controller->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode(jsonObjectSuccess($data), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		
		return true;
	}
}

if (!function_exists('responseFail')) {
	function responseFail($controller, $status_code, $message, $data=null) {
		if (!($controller instanceof CI_Controller)) {
			return false;
		}
		
		$controller->output
		->set_status_header($status_code)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode(jsonObjectFail($status_code, $message, $data), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
		
		return true;
	}
}

?>
