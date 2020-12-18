<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<center><br><br>
	    <h3>ArcNote</h3>
        Buy and Sell old books<br><br><br>
        <form action="" method="POST">
            <input type="submit" name="admin_login" class="btn btn-primary" value="Admin Login" >
            <input type="submit" name="cust_login"  class="btn btn-primary" value="Customer Login" >
        </form>
        <?php
            if(isset($_POST['admin_login'])){
                header("Location: admin_login.php");
            }
            if(isset($_POST['cust_login'])){
                header("Location: cust_login.php");
            }
        ?>
	</center>
</body>
</html>