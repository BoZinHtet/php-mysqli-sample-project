<?php 

	require 'conn.php';

	if (isset($_GET['deleteid'])) {
		$id=$_GET['deleteid'];
		$sql="DELETE FROM student WHERE id=$id";
		$conn->query($sql);
	}

	header("location:student2.php")

 ?>
