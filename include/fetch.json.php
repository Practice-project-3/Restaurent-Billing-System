
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	b{
	margin: 30px auto; 
    padding: 10px; 
    border-radius: 5px; 
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    width: 50%;
    text-align: center;
	}
	.c{
       max-width:700px;
       background-color: white;
       align-content: center;
        margin: auto;
        background-image:url(form.png);
      background-size: cover;
        
      }
</style>
</head>
<body style="background-image:url(img3.jpg);background-size:cover;background-attachment: fixed;">
<?php

include("connection.php");
$sql = "SELECT * FROM customer";

$result = mysqli_query($con ,$sql)or die("SQL Query Failed.");

$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

$json_data = json_encode($output, JSON_PRETTY_PRINT);

$file_name = "data.json";
    
if(file_put_contents("data.json", $json_data )){
	echo  "<b>data saved to Json file </b>";
}else{
	echo "<b>Can't Insert data in JSON file.</b>";
}


?>
<br>
<br>
<br>
</div>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<style type="text/css">
	.c{
       
        background-image:url(form.png);
      background-size: cover;
        
      }
      .btn {
    padding: 10px;
    font-size: 15px;
    color: white;
    background: #5F9EA0;
    border: none;
    border-radius: 5px;
}
a{text-decoration: none;
     color: white;       }
</style>
</head>
<body>
	<p align="left">
       <button class="btn" type="submit"><a href="index2.php">back to table page</a></button>
     </p>

<div class="c">

		<h1><center>JSON DATA TO HTML</center></h1><br>
		<table class="table table-bordered table-striped" id="customer_table">
			<tr>
	<th>cust_id</th>
	<th>cust_name</th>
	<th>email</th>
	<th>password</th>
	<th>user_role</th>
</tr>
         
		</table>
	</div>
</div>	
</body>
</html>
<script>
	$(document).ready(function(){
        $.getJSON("data.json",function(data){
           var customer_data = '';
       $.each(data,function(key,value){
            customer_data += '<tr>';
            customer_data += '<td>' + value.cust_id + '</td>';
            customer_data += '<td>' + value.cust_name + '</td>';
            customer_data += '<td>' + value.email + '</td>';
            customer_data += '<td>' + value.password + '</td>';
            customer_data += '<td>' + value.user_role + '</td>';
            customer_data += '</tr>';

       });
          $('#customer_table').append(customer_data);

        });
});

</script>
</div>