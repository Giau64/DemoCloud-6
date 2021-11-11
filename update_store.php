     <!-- Bootstrap -->
     <link rel="stylesheet" type="text/css" href="style.css" />
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <?php
		include_once("connection.php");
		if(isset($_GET["id"]))
		{
			$id= $_GET["id"];
			$result = pg_query($conn,"SELECT * FROM store where store_id='$id'");
			$row = pg_fetch_array($result, NULL, PGSQL_ASSOC);
			$store_id = $row['store_id'];
			$store_name = $row['store_name'];
			$address = $row['address'];
            $phone = $row['phone'];
            $email = $row['email'];
	?>
        <div class="container">
        <h2>Update Store</h2>
        <form method="POST" class="form-horizontal" role="form">
        <div class="form-group">
            <label>StoreID:</label>
            <input type="text" class="form-control" id="txtID" name="txtID" placeholder="Enter Store ID" readonly value='<?php echo $store_id;?>'>
        </div>
        <div class="form-group">
            <label>Store Name:</label>
            <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Enter Store Name" value='<?php echo $store_name;?>'>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Address" value='<?php echo $address;?>'>
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <input type="text" class="form-control" id="txtPhone" name="txtPhone" placeholder="Enter Phone" value='<?php echo $phone;?>'>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Enter Email" value='<?php echo $email;?>'>
        </div>
            <div class="form-group">
                 <div class="col-sm-offset-2 col-sm-10">
                     <input type="submit" class="btn btn-primary" name="btnUpdate" id="btnUpdate" value="Update" />
                     <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore"
                         onclick="window.location='manage_store.php'" />

                 </div>
             </div>
        </form>
    </br>
    </div>

     <?php
		}
		else
        {
			echo '<meta http-equiv="Refresh" content="0; URL=?page=category_management"/>';
        }
	?>
     <?php
		if(isset($_POST["btnUpdate"]))
		{
            $id = $_POST['txtID'];
            $name = $_POST['txtName'];
            $des = $_POST['txtAddress'];
            $phone = $_POST['txtPhone'];
            $email = $_POST['txtEmail'];
			$err="";
			if($name=="")
			{
				$err .= "<li>Enter Category Name, please</li>";
			}
			if($err!="")
			{
				echo "<ul>$err</ul>";
			}
			else
			{
				$sq = "SELECT * FROM store WHERE store_id != '$id' and store_name='$name'";
				$result= pg_query($conn, $sq);
				if(pg_num_rows($result)==0)
				{
					pg_query($conn, "UPDATE store SET store_name ='$name', email='$email', phone='$phone', address='$address' where store_id='$id'");
					echo '<meta http-equiv="Refresh" content="0; URL=?page=store"/>';
				}
				else
				{
					echo "<li>Duplicate category Name</li>";
				}
			}
		}
    ?>