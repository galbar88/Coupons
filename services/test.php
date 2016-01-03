<?php
	include_once ('../model/session_manager.php');
	$is_connected = Array();
	if (is_user_connected ()) {
		$is_connected["connected"] = "yes";
	} else {
		$is_connected["connected"] = "no";
	}
	$is_connected["status"] = "success";
	echo json_encode ($is_connected);
?>