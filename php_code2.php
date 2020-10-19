<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'bill');

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
 

 

           
		mysqli_query($db, "INSERT INTO menu (dish_name,raw_price,total_price,profit) VALUES ('$dish_name', '$raw_price', '$total_price', '$profit')"); 
		$_SESSION['message'] = "saved"; 
		header('location: index2.php');
	}

if (isset($_POST['update'])) {
	$dish_id = $_POST['dish_id'];
	$dish_name = $_POST['dish_name'];
    $raw_price = $_POST['raw_price'];
	$total_price = $_POST['total_price'];
	$profit = $total_price -$raw_price ;
	 $_POST['profit'];
	

	mysqli_query($db, "UPDATE menu SET dish_name='$dish_name', raw_price='$raw_price', total_price='$total_price', profit='$profit' WHERE dish_id=$dish_id");
	$_SESSION['message'] = " updated!"; 
	header('location: index2.php');
}
if (isset($_GET['del'])) {
	$dish_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM menu WHERE dish_id=$dish_id");
	$_SESSION['message'] = "deleted!"; 
	header('location: index2.php');
}