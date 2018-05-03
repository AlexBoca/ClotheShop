<?php
function dd($var) {
	var_dump($var);
	die();
}

function view($file, $params = []) {
	extract($params);
	$file_path = str_replace('.', '/', $file);
	require ROOT . 'view/' . $file_path . '.php';
}

function url($location, $params = []) {
	$url = BASE_URL  . str_replace('//', '/', '/' . $location);
	if (!empty($params)){
		$url .= '?'. http_build_query($params);
	}
	return  $url;
}

function redirect($location) {
	header('Location: ' . $location);

}

function db() {
	return \App\Database::Instance();
}

function build_params($params = []) {
	$items = [];

	foreach ($params as $value) {

		if (is_string($value)) {
			$item = sprintf("'%s'", $value);
		} else {
			$item = $value;
		}

		$items[] = $item;
	}

	return implode(', ', $items);
}

function build_query($array) {
	$items = [];
	$format = "%s='%s'";

	foreach ($array as $key => $value) {

		if (is_string($value)) {
			$item = sprintf($format, $key, $value);
		} else {
			$item = $key . '=' . $value;
		}

		$items[] = $item;
	}

	return implode(', ', $items);
}

db()->set(DB_HOST, DB_USER, DB_PASS, DB_NAME);
db()->connect();