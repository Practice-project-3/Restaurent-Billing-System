
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

include("include/connection.php");

$sql = "SELECT * FROM menu ";

$result = mysqli_query($con ,$sql)or die("SQL Query Failed.");

$output = mysqli_fetch_all($result, MYSQLI_ASSOC);

$json_data = json_encode($output, JSON_PRETTY_PRINT);

$file_name = "data2.json";
    
if(file_put_contents("data2.json", $json_data )){
	echo  "<b>messsage is:data saved to Json file </b>";
}
else{
	echo "<b>messsageis:Can't Insert data in JSON file.</b>";
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
    <table class="table table-bordered table-striped" id="menu_table">
      <tr>
  <th>dish_id</th>
  <th>dish_name</th>
  <th>raw_price</th>
  <th>total_price</th>
  <th>profit</th>
</tr>
         
    </table>
  </div>
</div>  
</body>
</html>
<script>
  $(document).ready(function(){
        $.getJSON("data2.json",function(data){
           var menu_data = '';
       $.each(data,function(key,value){
            menu_data += '<tr>';
            menu_data += '<td>' + value.dish_id + '</td>';
            menu_data += '<td>' + value.dish_name + '</td>';
            menu_data += '<td>' + value.raw_price + '</td>';
            menu_data += '<td>' + value.total_price + '</td>';
            menu_data += '<td>' + value.profit + '</td>';
            menu_data += '</tr>';

       });
          $('#menu_table').append(menu_data);

        });
});

</script>
</div>    