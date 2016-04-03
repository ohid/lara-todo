<?php 

function flash($type, $title, $message) {
	$flash = app('App\Http\Flash');

	return $flash->message($type, $title, $message);
}
