<?php 

require 'conn.php';

if (isset($_POST['editid'])) {
	$id=$_POST['editid'];

	$sql="SELECT * FROM student WHERE id=".$id;

	$result=$conn->query($sql);

	$data=$result->fetch_assoc();

	echo json_encode($data);
}else{
	echo json_encode(['id'=>1]);
}

?>