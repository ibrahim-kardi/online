<?php
	require_once('config.php');
	$id=$_GET['d'];
	$sele="DELETE FROM cit_student WHERE stu_id='$id'";
	$del=mysqli_query($con,$sele);
	if($del){
		header('Location:manage.php');
	}
?>
           