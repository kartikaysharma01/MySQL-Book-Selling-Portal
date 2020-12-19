<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">

		#header{
			height: 10%;
			width: 100%;
			top: 2%;
			background-color: purple;
			position: fixed;
			color: white;
		}
		#left_side_first{
			height: 10%;
			width: 15%;
			top: 21%;
            left: 1%;   
			position: fixed;
            background-color: white;
		}

        #left_side_second{
			height: 21%;
			width: 15%;
            left: 1%;
            border: solid 1px black;
			top: 33%;
			position: fixed;
            background-color: whitesmoke;
		}

        #left_side_third{
			height: 21%;
			width: 15%;
            left: 1%;
            border: solid 1px black;
			top: 56%;
			position: fixed;
            background-color: whitesmoke;
		}

        #left_side_fourth{
			height: 13%;
			width: 15%;
            left: 1%;
            border: solid 1px black;
			top: 79%;
			position: fixed;
            background-color: whitesmoke;
		}

		#right_side{
			height: 75%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
            background-color: blue;
			width: 200px;
		}
	</style>

	<?php
		session_start();
		$name = "";	
		$admin_id = "";
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"ArcNote");
	?>
</head>

<body>
	<div id="header"><br>
		<center><Strong><h3>ArcNote Adminstrator</h3></Strong> 

		</center>
	</div>
	
    <span id="top_span"><marquee><Strong>Note:- Any change made by the admin will be universal and irreversible.</Strong></marquee></span>
	

    <div id="left_side_first">
		<form action="" method="post">
            &nbsp;&nbsp;<Strong>Hello, <?php echo $_SESSION['name'];?></Strong>
            
			<table>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="edit_admin" value="Edit Your Profile">
					</td>
				</tr>
                <tr>
					<td>
                        &nbsp;&nbsp;<a href="logout.php">Logout</a>
					</td>
				</tr>
			</table>
		</form>
	</div>

    <div id="left_side_second">
		<form action="" method="post">
            <!-- &nbsp;&nbsp;<Strong>Hello, <?php echo $_SESSION['name'];?></Strong> -->
            &nbsp;&nbsp;<Strong>Make changes in users...</Strong>
			<table>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="search_user" value="Search User">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="edit_user" value="Edit User">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="add_new_user" value="Add New User">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="delete_user" value="Delete User">
					</td>
				</tr>
			</table>
		</form>
	</div>

    <div id="left_side_third">
		<form action="" method="post">
            <!-- &nbsp;&nbsp;<Strong>Hello, <?php echo $_SESSION['name'];?></Strong> -->
            &nbsp;&nbsp;<Strong>Make changes in books...</Strong>
			<table>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="search_book" value="Search Book">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="edit_book" value="Edit Book">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="add_new_book" value="Add New Book">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="delete_book" value="Delete Book">
					</td>
				</tr>
			</table>
		</form>
	</div>

    <div id="left_side_fourth">
		<form action="" method="post">
            &nbsp;&nbsp;<Strong>Make changes in Admin...</Strong>
			<table>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="search_admin" value="Search Admin">
					</td>
				</tr>
				
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="add_new_admin" value="Add New Admin">
					</td>
				</tr>
				
			</table>
		</form>
	</div>
        
	<div id="right_side"><br><br>
		<div id="demo">
            <!-- code to serch admin -->
            <?php
                    if(isset($_POST['search_admin']))
                    {
                        ?>
                        <center>
                        <form action="" method="post">
                        &nbsp;&nbsp;<b>Search by Admin ID:</b>&nbsp;&nbsp; <input type="text" name="admin_id">
                        <input type="submit" name="search_by_admin_id_for_search" value="Search">
                        </form><br>


                        </center>
                        <?php
					}
					
                    if(isset($_POST['search_by_admin_id_for_search']))
                    {
						$query = "select * from admin where admin_id = '$_POST[admin_id]' ";
						$query_run = mysqli_query($connection,$query);
						$row = mysqli_fetch_assoc($query_run);
						
						if(!is_null($row)){
							?>	
							<center>
							<h4><b><u>Admin's details</u></b></h4><br><br>
							<table>
								<tr>
									<td>
										<b>Admin ID:</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['admin_id']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Name:</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['name']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Mobile:</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['mobile_no']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Email:</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['email']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Password:</b>
									</td> 
									<td>
										<input type="password" value="<?php echo $row['password']?>" disabled>
									</td>
								</tr>
								</center>
							</table>
							<?php
							
						}
						
						else{
							?>
							<center>
							<h4><u>No such admin exists !!</u></h4><br><br>
							</center>
							<?php
						}

					}

            ?>


			<!-- code to add admin -->
			<?php
				if(isset($_POST['add_new_admin']))
				{
					?>
					<center>
					<form action="" method="post">
					&nbsp;&nbsp;<b>Full Name:</b>&nbsp;&nbsp; <input type="text" name="admin_name"><br><br>
					
					&nbsp;&nbsp;<b>Mobile No.:</b>&nbsp;&nbsp; <input type="text" name="mobile_no"><br><br>

					&nbsp;&nbsp;<b>Email Add.:</b>&nbsp;&nbsp; <input type="text" name="email"><br><br>

					&nbsp;&nbsp;<b>Password:</b>&nbsp;&nbsp; <input type="text" name="password"><br><br>	

					<input type="submit" name="add_new_admin_for_add" value="Confirm"><br>
					</form><br>

	
					</center>
					<?php
				}
				
				if(isset($_POST['add_new_admin_for_add']))
				{
					$query = "INSERT INTO admin(name, mobile_no, email, password) VALUES 
					( '$_POST[admin_name]' , '$_POST[mobile_no]' ,'$_POST[email]' ,'$_POST[password]' )";
					
					$query_run = mysqli_query($connection,$query);
					
					if(($query_run)){
						$last_id = mysqli_insert_id($connection);
						
				
						
						?>	
						<script type="text/javascript">
						alert("New Admin added with admin id <?php echo $last_id;?>");
						window.location.href = "admin_dashboard.php";
						</script>
					
					<?php
						
					}
					
					else{
						?>
						<center>
						<h4><u>Admin could not be added. Try Again !!</u></h4><br><br>
						</center>
						<?php
					}

				}

			?>

			<!-- code to edit admin -->
			<?php
				if(isset($_POST['edit_admin']))
				{

					$query = "select * from admin where admin_id = '$_SESSION[admin_id]' ";
					$query_run = mysqli_query($connection,$query);
					$row = mysqli_fetch_assoc($query_run);
					
					if(!is_null($row)){
						?>	
						<center>
						<h4><b><u>Your Profile</u></b></h4><br><br>
						<form action="" method="post">

							<table>
								<tr>
									<td>
										<b>Admin ID:</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['admin_id']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Name:</b>
									</td> 
									<td>
										<input type="text" name="name" value="<?php echo $row['name']?>" enable>
									</td>
								</tr>
								<tr>
									<td>
										<b>Mobile:</b>
									</td> 
									<td>
										<input type="text" name="mobile_no" value="<?php echo $row['mobile_no']?>" enable>
									</td>
								</tr>
								<tr>
									<td>
										<b>Email:</b>
									</td> 
									<td>
										<input type="text" name="email" value="<?php echo $row['email']?>" enable>
									</td>
								</tr>
								<tr>
									<td>
										<b>Password:</b>
									</td> 
									<td>
										<input type="text" name="password" value="<?php echo $row['password']?>" enable>
									</td>
								</tr>

								<tr>
									<td></td>
									<td><input type="submit" name="edit_admin_from_dash" value="Save"> </td>

								</center>
							</table>
						</form>

						<?php	

					
					}
				}

				if(isset($_POST['edit_admin_from_dash']))
				{
					$query = "update admin set name ='$_POST[name]', mobile_no ='$_POST[mobile_no]' ,
						email ='$_POST[email]', password = '$_POST[password]' WHERE admin_id = $_SESSION[admin_id] " ;
					$query_run = mysqli_query($connection,$query);

					?>	
						<script type="text/javascript">
						alert("Profile Updated Successfully!!");
						window.location.href = "admin_dashboard.php";
						</script>
					
					<?php


				}			
				

			?>


		</div>
	</div>
</body>
</html>