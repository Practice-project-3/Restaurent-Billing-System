<?php  include('php_code2.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$dish_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM menu WHERE dish_id=$dish_id");

		if (count((array)$record)) {
			$n = mysqli_fetch_array($record);
			$dish_name = $n['dish_name'];
			$raw_price= $n['raw_price'];
			$total_price= $n['total_price'];
			$profit= $n['profit'];
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
<?php $results = mysqli_query($db, "SELECT * FROM menu"); ?>

<table>
	<thead>
		<tr>
			
			<th>dish_name</th>
			<th>raw_price</th>
			<th>total_price</th>
			<th>profit</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['dish_name']; ?></td>
			<td><?php echo $row['raw_price']; ?></td>
			<td><?php echo $row['total_price']; ?></td>
			<td><?php echo $row['profit']; ?></td>
			<td>
				<a href="index2.php?edit=<?php echo $row['dish_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="php_code2.php?del=<?php echo $row['dish_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form method="post" action="php_code2.php" >
		<div class="input-group">
			<input type="hidden" name="dish_id" value="<?php echo $dish_id; ?>">

			<label>dish_name</label>
			<input type="text" name="dish_name" placeholder="dish name" value="<?php echo $dish_name; ?>">
		</div>
		<div class="input-group">
			<label>raw_price</label>
<input type="number" name="raw_price" placeholder="raw material price" value="<?php echo $raw_price; ?>">
		</div>
		<div class="input-group">
			<label>total_price</label>
<input type="number" name="total_price" placeholder="total_price of dish including cost of raw material" value="<?php echo $total_price; ?>">
		</div>
		<!--<div class="input-group">
			<label>profit</label>
<input type="number" name="profit" value="<?/*php echo $profit ; */?>">
		</div>-->
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
<div>
	<br>
<button class="btn" type="submit"><a href="fetch2.json.php">Also save data to JSON file?click me!</a></button>

	</form>
</div>
</div>	
</body>
</html>
