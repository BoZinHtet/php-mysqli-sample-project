<?php 

require("conn.php");

function valid($value){
	$value = trim($value);
	$value = htmlspecialchars($value);
	$value = stripslashes($value);
	// $value = mysql_real_escape_string($value);
	return $value;
}

if (isset($_POST['add'])) {
	$name = valid($_POST['name']);
	$roll = valid($_POST['roll']);
	$fathername = valid($_POST['father_name']);
	$phone = valid($_POST['phone']);
	$photo = $_FILES['photo'];
	// $photoname = $photo['name'];

	$sql = "SELECT * FROM student WHERE roll='$roll'";
	$result = $conn->query($sql);

	if ($result->num_rows< 1) {
		
	$photoname = time();
	$exe = pathinfo($photo['name'],PATHINFO_EXTENSION);
	
	$target = "img/$photoname.$exe";

	move_uploaded_file($photo['tmp_name'], $target);

	$sql = "INSERT INTO student VALUES(NULL,'$name','$roll','$phone','$fathername','$target')";

	$conn->query($sql);
	}

	

	/*$sql1 = "INSERT INTO student VALUES(?,?,?,?,?,?)";

	$run = $conn->prepare($sql1);
	$run ->bind_param(NULL,$name,$roll,$fathername,$phone,$photoname);
	$run ->execute();*/

	header("location:student2.php");

}

 ?>