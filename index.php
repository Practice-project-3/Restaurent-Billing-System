<?php  include('php_code.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$cust_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM customer WHERE cust_id=$cust_id");

		if (count((array)$record)) {
			$n = mysqli_fetch_array($record);
			$cust_name = $n['cust_name'];
			$email= $n['email'];
			$password= $n['password'];
			$user_role= $n['user_role'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<STYLE>
	 a{text-decoration: none;
	   color: white;       }
     
     .b{
       max-width:700px;
       background-color: white;
       align-content: center;
        margin: auto;
        background-image:url(form.png);
      background-size: cover;
        
      }
	  </STYLE>
</head>
<body style="background-image:url(img3.jpg);background-size:cover;background-attachment: fixed;">
	<div class="b">
	<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
<?php $results = mysqli_query($db, "SELECT * FROM customer"); ?>

<table>
	<thead>
		<tr>
			
			<th>cust_name</th>
			<th>email</th>
			<th>password</th>
			<th>user_role</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['cust_name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['user_role']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['cust_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="php_code.php?del=<?php echo $row['cust_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form method="post" action="php_code.php" >
		<div class="input-group">
			<input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">

			<label>cust_name</label>
			<input type="text" name="cust_name" value="<?php echo $cust_name; ?>">
		</div>
		<div class="input-group">
			<label>email</label>
<input type="text" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>password</label>
<input type="text" name="password" value="<?php echo $password; ?>">
		</div>
		<div class="input-group">
			<label>user_role</label>
<input type="text" name="user_role" value="<?php echo $user_role; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
<div>
	<br>
<button class="btn" type="submit"><a href="fetch.json.php">Also save data to JSON file?click me!</a></button>

	</form>
</div>
</div>	
</body>
</html>
