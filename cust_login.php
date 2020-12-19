<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
    <?php 
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $verify_query = "SELECT * FROM users WHERE username = '{$username}'";
            
            $verify_query_result = mysqli_query($connection,$verify_query);
            
            if(!$verify_query_result){
                die("FAILED" . mysqli_error($connection));
            }else{
                $verify_row = mysqli_fetch_assoc($verify_query_result);
                $email_id = $verify_row['user_email'];
                $username = $verify_row['username'];
                $is_verified = $verify_row['is_verified'];
                if ($is_verified == 'false') {
                    header("Location: verify_user.php?email_id='{$email_id}'&username='{$username}'");
                }
            }
        }
    ?>


<center><br><br>
		<h3>Customer LogIn Page</h3><br>
		<form action="" method="post">
			Email ID: <input type="text" name="email" placeholder="Email" required><br><br>
			Password: <input type="password" name="password" placeholder="Password" required><br><br>
			<input type="submit" name="submit" class="btn btn-primary"  value="LogIn">

		</form><br>
		
        <form action="" method="post">
            <input type="submit" name="register" class="btn btn-primary" value="Register">
		</form><br>

		<?php
			session_start();
			if(isset($_POST['submit'])){
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"ArcNote");
				$query = "select * from users where user_email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) {
					if($row['user_email'] == $_POST['email']){
						if($row['user_password'] == $_POST['password']  ){
							$_SESSION['username'] =  $row['username'];
							$_SESSION['user_email'] =  $row['user_email'];
							$_SESSION['user_id'] =  $row['user_id'];
							$_SESSION['preferences'] = $row['preferences'];
							header("Location: customer_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
                   
				}
                
            }
            
            if(isset($_POST['register'])){
                header("Location: register.php");
            }


		?>
	</center>



</body>
</html>