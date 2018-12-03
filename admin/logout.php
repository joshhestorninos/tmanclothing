<?php
	session_start();
	session_destroy();

	header("location: http://$_SERVER[HTTP_HOST]/Payroll/admin/index.php");
?>