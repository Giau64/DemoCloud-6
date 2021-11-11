<?php

include_once("connection.php");
	if(isset($_POST["btnAdd"]))
	{
		$id = $_POST['txtID'];
		$name = $_POST['txtName'];
		$des = $_POST['txtAddress'];
        $phone = $_POST['txtPhone'];
        $email = $_POST['txtEmail'];
		$err="";
		if($id=="")
		{
			echo "<script>alert('Enter category ID please')</script>";
		}
		elseif($name=="")
		{
			echo "<script>alert('Enter category name please')</script>";
		}
		
		else
		{
		$sq="SELECT * FROM store WHERE store_id='$id' or store_name='$name'";
		$result = pg_query($conn,$sq);
			if(pg_num_rows($result)==0)
			{
				pg_query($conn, "INSERT INTO store (store_id, store_name, address, phone, email) VALUES ('$id', '$name', '$des', '$phone', '$email')");
				echo '<meta http-equiv="refresh" content="0;URL=index.php?page=category"/>';
			}
			else
			{
				echo "<li>Duplicate category ID</li>";
			}
	    }
	}

?>

<div class="container">
	<h2>ADD CATEGORY</h2>
	<form method="POST" class="form-horizontal" role="form">
	<div class="form-group">
		<label>StoreID:</label>
		<input type="text" class="form-control" id="txtID" name="txtID" placeholder="Enter Store ID" value=''>
	</div>
	<div class="form-group">
		<label>Store Name:</label>
		<input type="text" class="form-control" id="txtName" name="txtName" placeholder="Enter Store Name" value=''>
	</div>
	<div class="form-group">
		<label>Address</label>
		<input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Address" value=''>
	</div>
    <div class="form-group">
		<label>Phone:</label>
		<input type="text" class="form-control" id="txtPhone" name="txtPhone" placeholder="Enter Phone" value=''>
	</div>
    <div class="form-group">
		<label>Email:</label>
		<input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Enter Email" value=''>
	</div>
		<button type="submit" class="btn btn-primary" name="btnAdd" value="Add new">Submit</button>
		<button type="button" class="btn btn-danger" name="btnCancel" value="Ignore" onclick="window.location='index.php?page=category'">Cancel</button>
	</form>
</br>
</div>