<?php 
	
	// 3 ways to connect database

	// *******************first way*************************

	// $host="127.0.0.1";
	$host="localhost";
	$user="root";
	$pass="";
	$db="tutorial";

	// create connection with mysqli oop
	$conn = new mysqli($host,$user,$pass,$db);
	if ($conn->connect_error) {
		echo "error";
	}
	//Disconnect == unset($conn)
	function DisDB(){
		// unset($conn);
		$conn->close();
	}
	// run style
	//$sql="SELECT";
	// $conn->query($sql); 

	// ***********************second way********************

	// Create connection mysqli procedure
	// $conn =  mysqli_connect($host,$user,$pass);
	// mysqli_select_db($conn,$db);

	// // Check connection
	// if (!$conn) {
	//   die("Connection failed: " . mysqli_connect_error());
	// }
	// echo "Connected successfully";
	// function DisDB(){
	// 	mysqli_close($conn); 
	// }
	// run style
	//$sql="SELECT";
	// mysqli_query($conn, $sql)

	// **********************third way*******************************
	
	// create connection with PHP DATABSE OBJECT
	// try {
	// 	  $conn = new PDO("mysql:host=$host;dbname=tutorial", $user, $pass);
	// 	  // set the PDO error mode to exception
	// 	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 	  echo "Connected successfully";
	// 	} catch(PDOException $e) {
	// 	  echo "Connection failed: " . $e->getMessage();
	// }
	// function DisDB(){
	// 	$conn=null;
	// }
	// run style
	// $sql="SELECT";
	// $conn->exec($sql);

	// object.name
 // object->name

 // object.getName();
 // object->getName();
 ?>

