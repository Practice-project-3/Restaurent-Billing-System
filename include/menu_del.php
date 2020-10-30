<?php   

include("../bg_user_admin.html")
?>

<style type="text/css">
	.form_div{
	margin-left: 60px; margin-right: 60px; margin-top: 30px;
}
	.form{
	padding: 5%; border: black solid; background-color: rgba(0, 0, 0, 0.5);
}

.button{
	border-radius: 50px;
	padding: 10px;
	padding-left: 10px;
	padding-right: 10px;
	background-color: black;
	background: rgba(0,0,0,0.7);
	color: white;
	font-size: 30px;
	
}
</style>
<body style="background-image: url('../img4.jpg');">
<div class="form_div">
<form method="post" action="php_code2.php" class ="form" style="padding: 15px; border: black solid; "

>
<div >
		<center><div   style="   padding-bottom: 2%; color: white;"><h3>Delete Menu:</h3></div>
			
            <label style="color: white;" >Enter dish Id</label>
            <input type="text" name="dish_id" /><br><br>
       		
			<div style="padding-bottom: 2%; ">
				<button class="button" type="submit" name="del" >delete menu</button></button></div><br><br><br>
		</center>	
</div>
</div>
</form>
</body>