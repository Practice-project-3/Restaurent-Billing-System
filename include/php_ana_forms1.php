<?php 
include("connection.php");
include("../bg.html");
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
							<h2>Single Dish Analysis</h2><br>
						 </div>
						 <center>
						  <div class="form-group">
							   
							   <label for="cars" style="color: white;">Select Dish: </label>
			                    <select name="select_dish" id="cars">
			                      <option value="" disabled="disabled" selected></option>
			                      <?php 
			                        $sql_dish="SELECT * FROM menu";
			                        $result_dish=mysqli_query($con,$sql_dish) or die("query unsuccessful");
			                        while ($row10=mysqli_fetch_assoc($result_dish)) {
			                      ?>
			                      <option value="<?php echo $row10['dish_id'] ?>" ><?php echo $row10['dish_name']; ?></option>
			                     <?php } ?>
			                    </select><br>


							   <label for="Start" class="text">Select Start & End Date:</label>
	  							<input type="date"  name="start_date2">
	  							<input type="date"  name="end_date2">
	  							
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
				if(isset($_POST['select_dish'])){
				 $selected_dish=$_POST['select_dish'];
				}

				if(isset($_POST['start_date2'])){
				 $start_date2= $_POST['start_date2'];
				}

				if(isset($_POST['end_date2'])){
				  $end_date2= $_POST['end_date2'];
				}
				
				 $sql_show2="SELECT sum(quantity) as quantity1, sum(total_raw) as total_raw2, sum(price) as price2, sum(profit)  as profit2 FROM cust_order  WHERE selected_dish='{$selected_dish}'  AND order_date
					BETWEEN '{$start_date2}'  AND '{$end_date2}';";
	 			 $result_show2= mysqli_query($con,$sql_show2) or die("Query Uncessfull");

	 			if (mysqli_num_rows($result_show2) > 0) {


				?>


SELECT sum(quantity) as quantity1, sum(total_raw) as total_raw2, sum(price) as price2, sum(profit) as profit2 FROM cust_order WHERE selected_dish='samosa' AND order_date BETWEEN '2020-01-20' AND '2020-12-23'


				<table class="table" >
				  <thead class="thead-dark" >
				    <tr>
				      <th scope="col">Parameter</th>
				      <th scope="col">Output in Rs</th>
				      
				    </tr>
				  </thead>
				  <tbody>
				    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
				      <th scope="row">Total num of order</th>
				    <?php
                  		while ($row=mysqli_fetch_assoc($result_show2)) {
         			 ?>
				      <td><?php echo $row['quantity1']; ?></td>
				    
				   </tr>
				    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
				      <th scope="row">Total Investment</th>
				     
				      <td><?php echo $row['total_raw2']; ?></td>
				    
				    </tr>

				    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
				      <th scope="row">Total Sale</th>
				     
				      <td><?php echo $row['price2']; ?></td>
				    
				    </tr>
				    <tr style="background-color: rgba(0, 0, 0, 0.5); color: white;">
				      <th scope="row">Total Profit</th>
				    
				      <td><?php echo $row['profit2']; ?></td>
				    </tr> 
				 
				    
				<?php } ?>
				  </tbody>
				</table>

		<?php  }}else{
					echo "<center><h2>"."Select dates please"."</h2></center>";
				}?>
			</div>
</body>
</html>