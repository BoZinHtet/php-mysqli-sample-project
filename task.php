<?php 

require "conn.php";

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
	$fathername = valid($_POST['fathername']);
	$phone = valid($_POST['phone']);
	$photo = $_FILES['photo'];

	$sql = "SELECT * FROM student WHERE roll='$roll'";
	$result = $conn->query($sql);

	// print_r($result);
	if ($result->num_rows< 1) {
		
	$photoname = time();
	$exe = pathinfo($photo['name'],PATHINFO_EXTENSION);
	
	$target = "img/$photoname.$exe";
	// $target = "img/".$photoname.".".$exe;

	move_uploaded_file($photo['tmp_name'], $target);

	$sql = "INSERT INTO student VALUES(null,'$name','$roll','$phone','$fathername','$target')";

	$conn->query($sql);
	}

	

	/*$sql1 = "INSERT INTO student VALUES(?,?,?,?,?,?)";

	$run = $conn->prepare($sql1);
	$run ->bind_param(NULL,$name,$roll,$fathername,$phone,$photoname);
	$run ->execute();*/

	header("location:student2.php");

}
elseif (isset($_POST['update'])) {
	$id=valid($_POST['id']);
	$oldphoto=$_POST['old'];
	$name=valid($_POST['name']);
	$roll=valid($_POST['roll']);
	$phone=valid($_POST['phone']);
	$fathername=valid($_POST['fathername']);
	$photo=$_FILES['photo'];

	$sql="SELECT * FROM student WHERE roll='$roll' AND id!='$id'";

	$result= $conn->query($sql);

	if ($result->num_rows < 1) {
		$photoname=time();
		if($photo['tmp_name']){
			$exe=pathinfo($photo['name'],PATHINFO_EXTENSION);
			$target="img/$photoname.$exe";
			move_uploaded_file($photo['tmp_name'], $target);
			$photol=$target;			
		}else{
			$photol=$oldphoto;
		}

		$sql="UPDATE student SET name='$name',roll='$roll',phone='$phone',father_name='$fathername',photo='$photol' WHERE id='$id' ";

		$conn->query($sql);
	}
	header("location:student2.php");
}

 ?>