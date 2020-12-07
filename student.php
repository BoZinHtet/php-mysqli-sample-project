<?php 

// session_start();
if (isset($_SESSION['student'])) {
	$students = $_SESSION['student'];
}else{
	$students= array();
 }

if (isset($_POST['name'])) {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$roll = $_POST['roll'];
	$phone = $_POST['phone'];

	array_push($students, array($name,$age,$roll,$phone));

	$_SESSION['student'] = $students;
}

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		unset($students[$id]);
		$_SESSION['student'] = $students;
	}

	if (isset($_GET['remove'])) {
		session_destroy();
		$students = array();
	}
 ?>

 <form method="post" action="">
 	<label>Name</label>
 	<input type="text" name="name" required=""><br>
 	<label>Age</label>
 	<input type="text" name="age" required=""><br>
 	<label>Roll</label>
 	<input type="text" name="roll" required=""><br>
 	<label>Phone</label>
 	<input type="text" name="phone" required=""><br>
 	<button>Submit</button>
 </form>

<table border="1" width="500px">
	<thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Age</th>
			<th>Roll</th>
			<th>Phone</th>
		</tr>
	</thead>
	<tbody>
		<?php 

		$i=0;
		foreach ($students as $key => $value) {
			$i++;
			echo "<tr>";
			echo "<td>$i</td>";
			echo "<td>".$value[0]."</td>";
			echo "<td>".$value[1]."</td>";
			echo "<td>".$value[2]."</td>";
			echo "<td>".$value[3]."</td>";
			echo "<td><a href='student.php?id=$key'>Remove</a></td>";
			echo "</tr>";
		}

		// print_r($_SERVER); //To see All Server Data
		//print_r($_SERVER['SCRIPT_FILENAME']); //To see file path

		 ?>
	</tbody>
</table>

<a href='student.php?remove=1'>Remove All</a>