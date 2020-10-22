<?php 
include("connection.php");
include("../bg_analysis.html");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">








<!-- style for body-->
<style type="text/css">
body{
	margin: 0px;
}

.main{
	margin-top: 0px;
}

.left_div{
	float: left; align-content: center; width: 50%;  display: inline-block;
}
.right_div{
	float: right; align-content: center; width: 50%;  display: inline-block;
}

.form_div{
	margin-left: 60px; margin-right: 60px; margin-top: 30px;
}

.form{
	padding: 15px; border: black solid; background-color: rgba(0, 0, 0, 0.5);
}

.text{
	color: white;
	padding-right: 2%;
}

.triangle-down {
	width: 0;
	height: 0;
	margin-top: 1%;
	/*margin-right: 50%;*/
	/*margin-left: 50%;*/
	border-left: 25px solid transparent;
	border-right: 25px solid transparent;
	border-top: 50px solid #555;
}

h2{
	color: white;
	text-align: center;
}

.button4 {
	border-radius: 12px;
	background-color: #4CAF50;
	padding: 7px;
	padding-right: 30px;
	padding-left: 30px;
	/*margin-left: 47%;*/
	/*margin-right: 50%;*/
	align-content: center;
}

.button4:hover {background-color: #e7e7e7;}

</style>


<body style="background-image: url('../img4.jpg');">




	
<div class="form_div" >
					<form class="form"  method="post">
						 <div>
							<h2>Overall Analysis</h2><br>
						</div>
						 <center>
						  <div class="form-group">
							    <label for="Start" class="text">Select Start & End Date:</label>
	  							<input type="date"  name="start_date1">
	  							<input type="date"  name="end_date1">
						  </div>
						</center>
						  <center><button type="submit" class="button4" value="save">Calculate</button></center>
					</form>
			</div>

			<center><div class="triangle-down"></div></center>
			

			<div style="margin-right: 5%; margin-left: 5%; margin-top: 5px;">

				<?php  
				
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				//connectivity for overall analysis
				if(isset($_POST['start_date1'])){
				$start_date1= $_POST['start_date1'];
				}

				if(isset($_POST['end_date1'])){
				$end_date1= $_POST['end_date1'];
				}
				
				$sql_show1= "SELECT sum(total_raw) as total_raw, sum(price) as price, sum(profit) as profit FROM cust_order  WHERE  order_date
					BETWEEN '{$start_date1}'  AND '{$end_date1}'";
	 			$result_show1= mysqli_query($con,$sql_show1) or die("Query Uncessfull");

	 			if (mysqli_num_rows($result_show1) > 0) {
				?>

				<table class="table" >
				  <thead class="thead-dark" >
				    <tr>
				      <th scope="col"><center><h3>Parameter</h3></center></th>
				      <th scope="col"><center><h3>Output in Rs</h3></center></th>
				      
				    </tr>
				  </thead>
				  <tbody>
				    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
				      <th scope="row"><center>Total Investment</center></th>
				    <?php
                  		while ($row=mysqli_fetch_assoc($result_show1)) {
         			 ?>
				      <td><center><?php echo $row['total_raw']; ?></center></td>
				    
				   </tr>
				    

				    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
				      <th scope="row"><center>Total Sale</center></th>
				     
				      <td><center><?php echo $row['price']; ?></center></td>
				    
				    </tr>
				    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
				      <th scope="row"><center>Total Profit</center></th>
				    
				      <td><center><?php echo $row['profit']; ?></center></td>
				     
				 
				    </tr>
 						
 						<?php 

 							$sql40="SELECT max(SELECTED_DISH) as mamx, min(SELECTED_DISH) as minm from cust_order WHERE  order_date
					BETWEEN '{$start_date1}'  AND '{$end_date1}'";
 							$res40=mysqli_query($con, $sql40) or die("Query Uncessfull");

 							if (mysqli_num_rows($res40) > 0) {
							while ($row40=mysqli_fetch_array($res40)) {
								

 						?>
				    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
				      <th scope="row"><center>Maximum Sold</center></th>
				      <td><center><?php echo $row40['mamx']; ?></center></td>
				      
				    </tr>
				    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
				      <th scope="row"><center>Minimum Sold</center></th>
				      <td><center><?php echo $row40['minm']; ?></center></td>
				    </tr>
				    <?php }} ?> 
				<?php } ?>
				  </tbody>
				</table>

		<?php  }}else{
					echo "<center><h2>"."Select dates please"."</h2></center>";
				}?>
			</div>
</body>
</html>