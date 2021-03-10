<?php 
session_start();
require_once('./config/pdo.php');

function isOnline() {
	if(isset($_SESSION['id_user'])) {
		return true;
	}
    return false;
}
?>