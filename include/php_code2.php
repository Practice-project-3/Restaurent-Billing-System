<?php 
	session_start();
	include("connection.php");

	// initialize variables
	$dish_name = "";
	$raw_price = "";
	$total_price = "";
	$profit = "";
	$dish_id = 0;
	$update = false;


	if (isset($_POST['save'])) {
		$dish_name = $_POST['dish_name'];
		$raw_price = $_POST['raw_price'];
		$total_price = $_POST['total_price'];
		$profit = $total_price -$raw_price; 
		 $_POST['profit'];
 

 

           
		mysqli_query($con, "INSERT INTO menu (dish_name,raw_price,total_price,profit) VALUES ('$dish_name', '$raw_price', '$total_price', '$profit')"); 
		$_SESSION['message'] = "saved"; 
		header('location: ../index2.php');
	}

if (isset($_POST['update'])) {
	$dish_id = $_POST['dish_id'];
	$dish_name = $_POST['dish_name'];
    $raw_price = $_POST['raw_price'];
	$total_price = $_POST['total_price'];
	$profit = $total_price -$raw_price ;
	 $_POST['profit'];
	

	mysqli_query($con, "UPDATE menu SET dish_name='$dish_name', raw_price='$raw_price', total_price='$total_price', profit='$profit' WHERE dish_id=$dish_id");
	$_SESSION['message'] = " updated!"; 
	header('location: ../index2.php');
}


if(isset($_POST['del'])){


  // $con=mysqli_connect("localhost","root","","bill") or die("connection failed");
  $cust_id=$_POST['dish_id'];
  $sql___="DELETE FROM menu WHERE dish_id='{$cust_id}'";

  $result___=mysqli_query($con,$sql___) or die("Query Uncessfull");

  header("location: ../index2.php");
  mysqli_close($con);

}