<!DOCTYPE html>

<?php
        function customPageHeader(){
        echo "<script type='text/javascript' src='includes/javascr/register.js'></script>";
    }
?>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>

   

</head>



<body>

    <!-- backend -->
    <?php
        if(isset($_POST['submit'])){
            $connection = mysqli_connect("localhost","root","");
            $db = mysqli_select_db($connection,"ArcNote");
                
            $username = $_POST['username'];
            $user_password = $_POST['password'];
            $user_email = $_POST['email'];
            $user_firstName = $_POST['firstname'];
            $user_lastname = $_POST['lastname'];
            $user_city = $_POST['city'];
            $user_pincode = $_POST['pincode'];
            $user_mobile = $_POST['mobile'];
            $user_prefernce = $_POST['user_pref'];
            $is_verified = 'true';

            $password = mysqli_real_escape_string($connection,$user_password);
            $hash_password = password_hash($password, PASSWORD_DEFAULT);

            //CALL procedure
            $query = "CALL addUser('$username', '$user_firstName', '$user_lastname' , '$user_city',  $user_pincode,  '$user_mobile', '$user_email' , '$user_password', '$user_prefernce','$is_verified')";
            
            $query_result = mysqli_query($connection,$query);
            
            if(!$query_result){
                die('QUERY FAILED '.mysqli_error($connection));
            }else{
                ?>	
						<script type="text/javascript">
						alert("Profile Created Sucessfully!! ");
						window.location.href = "login.php";
						</script>
					
					<?php
            }
        
        }
    ?>

    <!-- front end -->
    <div class="container">
    <h1 class="text-center"> <br> Registration Form</h1>
    <p id="errorMsg" style='color:#F00'></p>

    <form method="post" onsubmit="return checkForm()" action="./register.php">
        <div class="row">
            <div class="col-sm-3"></div>
                <div class="col-sm-6">
                   <div class='form-group'>
                        <label for="username">Username</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input onkeyup="checkUsername(this.value)" name="username" type="text" class="form-control" id="username" placeholder="Username" required="true">
                        </div>              
                        <p id="username_error" style="color:red;display:none;"><b>Sorry!! This username is already taken</b></p>      
                    </div>
                   
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class='form-group'>
                                <label for="fname">First Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="firstname" onfocusout="checkName(this.value)" type="text" class="form-control" id="fname" placeholder="First name" required="true">
                                </div>
                            </div>
                        </div>
                                        
                        <div class="col-sm-6">
                           <div class='form-group'>
                                <label for="lname">Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input name="lastname" onfocusout="checkName(this.value)" type="text" class="form-control" id="lname" placeholder="Last name" required="true">
                                </div>
                            </div>
                        </div>
                    </div>
                    <p id="name_error" style="color:red;display:none;"><b>Name cannot contain numbers!!!</b></p>
                    
                    <div class="row">
                        <div class="col-sm-6">
                           <div class='form-group'>
                                <label for="city">City</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                    <input name="city" type="text" class="form-control" id="city" placeholder="City" required="true">
                                </div>
                            </div>
                            <div class='form-group'>                           
                                <label for="contact">Mobile</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input name="mobile" onfocusout="checkContact(this.value);" type="number" class="form-control" id="mobile" placeholder="Mobile Number" valid><br>
                                </div>
                            </div>
                            <p id="contact_error" style="color:red;"></p>
                        </div>
                    
                        <div class="col-sm-6">
                            
                            <div class='form-group'>
                                <label for="pincode">Pincode</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-address-book"></i></span>
                                    <input name="pincode" onfocusout="checkPincode(this.value)" type="number" class="form-control" id="pincode" placeholder="Pincode" required="true" valid>
                                </div>
                            </div>
                            <p id="pincode_error" style="color:red;display:none;"><b>Enter 6 digit pincode!!!</b></p>
                            <div class="form-group">
                                  <label for="preference">Your Preference</label>
                                  <select name="user_pref" class="form-control" id="preference">
                                        <option value="Computer">Computer</option>
                                        <option value="Mechanical">Mechanical</option>
                                        <option value="IT">IT</option>
                                        <option value="Electronics">Electronics</option>
                                        <option value="Other">Other</option>
                                  </select>
                            </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <label for="email">Email</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input onkeyup="checkEmail(this.value)" name="email" type="Email" class="form-control" id="email" placeholder="Enter Email" required="true">
                        </div>
                        <p id="email_error" style="color:red;display:none;"><b>This email is already used, Please try some other email</b></p>
                    </div>

                    <div class='form-group'>
                        <label for="passwd">Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input name="password" type="Password" class="form-control" id="passwd" placeholder="Password" required="true"> 
                        </div>
                    </div>
                    
                    <!-- <div class='form-group'>
                        <label for="confirmpwd">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input onfocusout="checkPassword()"  name="confirmpassword" type="Password" class="form-control" id="confirmpwd" placeholder="Re-type password" required="true">
                        </div>
                        <p id="error_msg_confirmpwd" style="color:#F00; padding-top: 5px; display:none">ERROR!!! Password doesnt match</p> 
                    </div> -->

                   
                    <div class='form-group'>
                    <input name="submit" type="submit" id="final_submit" class="btn btn-primary" value="Register">
                    </div>
           
                    
                </div>
            <div class="col-sm-3"></div>
        </div>
    </form>
</div>




</body>
</html>