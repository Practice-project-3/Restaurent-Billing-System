<?php 
	session_start();
	include("connection.php");

	// initialize variables
	$cust_name = "";
	$email = "";
	$password = "";
	$user_role = "";
	$cust_id1 = "";
	$update = false;

	if (isset($_POST['save'])) {
		$cust_name = $_POST['cust_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$user_role = $_POST['user_role'];
           
		mysqli_query($con, "INSERT INTO customer (cust_name,email,password,user_role) VALUES ('{$cust_name}', '{$email}', '{$password}', '{$user_role}')"); 
		mysqli_query($con,"UPDATE customer SET cust_id1 = cust_id;");
		$_SESSION['message'] = "saved"; 
		header('location: ../index.php');
	}
if (isset($_POST['update'])) {
	$cust_id = $_POST['cust_id'];
	$cust_name = $_POST['cust_name'];
    $email = $_POST['email'];
	$password = $_POST['password'];
	$user_role = $_POST['user_role'];
	

	mysqli_query($con, "UPDATE customer SET cust_name='$cust_name', email='$email', password='$password', user_role='$user_role' WHERE cust_id=$cust_id");
	$_SESSION['message'] = " updated!"; 
	header('location: ../index.php');

}


if(isset($_POST['del'])){


  // $con=mysqli_connect("localhost","root","","bill") or die("connection failed");
  $cust_id=$_POST['cust_id'];
  $sql___="DELETE FROM customer WHERE cust_id='{$cust_id}'";

  $result___=mysqli_query($con,$sql___) or die("Query Uncessfull");

  header("location: ../index.php");
  mysqli_close($con);

}