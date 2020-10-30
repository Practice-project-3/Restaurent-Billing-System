<style type="text/css">
	

	table{
		margin-top:3%;
	}
	td,th{
		font-size: 25px;
	}

	.menu{
color: white;
text-shadow: 5px 5px 5px orange;
font-size: 80px;
}
</style>

<?php  

include("../bg.html");
include("connection.php");

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['submit'])) {






// code for bill
			 $cust_id=$_POST['cust_id'];
			 $name=$_POST['cust_name'];
			 $dish_id=$_POST['dish_id'];
			 $dish=$_POST['cust_dish'];
			  $num_dish=$_POST['cust_num'];	
			  $date=$_POST['cust_date'];

			$sql_home="INSERT INTO cust_order( DISH_ID,CUST_ID, cust_name, SELECTED_DISH, QUANTITY, order_date) VALUES ('$dish_id' , '$cust_id',  '$name', '$dish','$num_dish', '$date')";
			mysqli_query($con,$sql_home);
			 
			
//code to calculate profit
$sql_price="SELECT 
      c.ID,
      M.dish_id,
      M.total_price,
      m.profit,
      C.DISH_ID,
      C.QUANTITY,
       M.profit*C.QUANTITY AS user_profit,
       M.total_price*C.QUANTITY AS quan_price,
       M.raw_price*C.QUANTITY AS quan_raw
      FROM MENU M ,cust_order C
      WHERE M.dish_id = C.DISH_ID
      ORDER BY c.ID ASC ;";

 $result_price = mysqli_query($con, $sql_price) or die("Query Uncessfull");

if (mysqli_num_rows($result_price) > 0) {
while ($row_price=mysqli_fetch_array($result_price)) {

$order_id=$row_price['ID'];
$price =$row_price['quan_price'];
$profit =$row_price['user_profit'];
$raw_price=$row_price['quan_raw'];
$insert_table="UPDATE cust_order SET price='{$price}',profit='{$profit}',total_raw='{$raw_price}' WHERE  ID='{$order_id}'" ;
$result=mysqli_query($con, $insert_table) or die("Query Uncessfull");
}

}
			



			
					
					if(isset($_POST['id1'])){
						$bill_cust_id1=$_POST['id1'];
						$bill_cust_id=$bill_cust_id1+1;
					}else{
						echo 'id not set';
					}

					$sql_bill="SELECT * FROM cust_order where id='$bill_cust_id'";
					$result_menu_bill=mysqli_query($con, $sql_bill);




?>
<body style="background-image: url('../img4.jpg');">
<center><h1 class="menu">Bill </h1></center>
		<table class="table" >
			 
			  <tbody>

			  	
			    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
			    	<?php 
			  		while ($row_menu_bill=mysqli_fetch_assoc($result_menu_bill)) {
			  	 	?>
			     <th scope="row"> <center>Customer Name</center></th>
			      <td><center><?php echo $row_menu_bill['cust_name']; ?></center></td>
			      
			    </tr>
			    
			    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
			   	<th scope="row"> <center>Ordered Dish</center></th>
			      <td><center><?php echo $row_menu_bill['SELECTED_DISH']; ?></center></td>
			    </tr>

			    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
			   	<th scope="row"> <center>Quantity</center></th>
			      <td><center><?php echo $row_menu_bill['QUANTITY']; ?></center></td>
			    </tr>

			    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
			   	<th scope="row"> <center>Total Bill</center></th>
			      <td><center><?php echo $row_menu_bill['price']; ?></center></td>
			    </tr>

			<?php  }?>
			  </tbody>
			</table>
<?php }} ?>
</body>