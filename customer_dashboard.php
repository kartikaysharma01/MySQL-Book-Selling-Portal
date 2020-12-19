<!DOCTYPE html>
<html>
<head>
	<title>Customer Dashboard</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">

        #header{
			height: 15%;
			width: 100%;
			top: 20px;
			background-color: purple;
			position: sticky;
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
			height: 18%;
			width: 15%;
            left: 1%;
            border: solid 1px black;
			top: 38%;
			position: fixed;
            background-color: whitesmoke;
		}

        #left_side_third{
			height: 27%;
			width: 15%;
            left: 1%;
            border: solid 1px black;
			top: 59%;
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
			width: 80%;
			background-color: whitesmoke;
			position: absolute;
			left: 17%;
            top: 133px;   
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 12%;
			width: 80%;
			left: 20%;
			position: relative;
		}
		#td{
            padding-left: 4px;
            color: purple;
			text-align: left;
            background-color: white;
			width: 250px;
        }

        #td1{
            border: 1px solid black;
            padding-left: 4px;
            color: purple;
			text-align: left;
            background-color: white;
			width: 250px;
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
		<center><Strong><h3><b>ArcNote</b></h3></Strong> 
        <p> Buy and Sell old books</p>
		</center>
	</div>

    <span id="top_span"><marquee><Strong>Welcome to ArcNote BETA. We are still in development phase.</Strong></marquee></span>
	

    <div id="left_side_first">
		<form action="" method="post">
            &nbsp;&nbsp;<Strong>Hello, <?php echo $_SESSION['username'];?></Strong>
            
			<table>
                <tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="home" value="Home">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="edit_your_profile" value="Edit Your Profile">
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
            &nbsp;&nbsp;<Strong>Sell Books...</Strong>
			<table>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="sell_new_book" value="Sell new Book">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="prev_sold_book" value="Your Previous Books">
					</td>
				</tr>
			
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="remove_book" value="Delete Book">
					</td>
				</tr>
			</table>
		</form>
	</div>

        
    <div id="left_side_third">
		<form action="" method="post">
            &nbsp;&nbsp;<Strong>Books by category...</Strong>
			<table>
                <tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="show_comp_books" value="Computer Science">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="show_mech_books" value="Mechincal">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="show_IT_books" value="Information Technology">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="show_electrical_books" value="Electrical">
					</td>
				</tr>
				<tr>
					<td>
                        &nbsp;&nbsp;<input type="submit" name="show_other_books" value="Other">
					</td>
				</tr>
			</table>
		</form>
	</div>

    <div id="right_side"><br><br>
		<div id="demo">
            
            <?php
            if(isset($_POST['show_mech_books']))
            {
                ?>
                <center>
                <h4><b><br>Mechinal Archive</b></h4><br>
                <table>
                    <tr>
                        <td id="td"><b>Book Name</b></td>
                        <td id="td"><b>Author</b></td>
                        <td id="td"><b>Original Price</b></td>
                        <td id="td"><b>Arcnote Price</b></td>
                        <td id="td"><b>View Details</b></td>
                    </tr>
                </table>
                </center>
                <?php
 
                $query = "select * from book where book_status!='sold'and  seller_user_id!= '$_SESSION[user_id]'
                and book_category_id = (select category_id from categories where category_name = 'Mechnical' )" ;
                $query_run2 = mysqli_query($connection,$query);
                $query_run = mysqli_query($connection,$query);
                $row2= mysqli_fetch_array($query_run2);
                

                if(!is_null($row2)){
                    while($row= mysqli_fetch_array($query_run)){
                        
                        if(is_null($row)){
                            ?>
                            <center>
                                <p> Sorry!! No book of this category found!! </p>
                            </center>
                            <?php
                        }
                        else{
                            ?>
                            <center>
                            <table style="border-collapse: collapse;border: 1px solid black;">
                                <tr>
                                    <td id="td"><?php echo $row['book_name']?></td>
                                    <td id="td"><?php echo $row['book_author']?></td>
                                    <td id="td"><?php echo $row['book_original_price']?></td>
                                    <td id="td"><?php echo $row['book_selling_price']?></td>
                                    <td id="td"> 
                                        <form action="" method="post"><br>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="submit" name="view_book_details" class="btn btn-primary" value="View">
                                                </td>
                                            </tr>                                           
							            </table>
                                        </form>

                                        <br>
                                    </td>   
                                </tr>
                            </table>
                            </center>
                            <?php
                        }

                    }
                }
                else{
                    ?>
                    <center>
                        <p><b><br> Sorry!! No book of this category found!!</b> </p>
                    </center>
                    <?php
                }

            }
       
            elseif (isset($_POST['show_IT_books']))
            {
                ?>
                <center>
                <h4><b><br>IT Archive</b></h4><br>
                <table>
                    <tr>
                        <td id="td"><b>Book Name</b></td>
                        <td id="td"><b>Author</b></td>
                        <td id="td"><b>Original Price</b></td>
                        <td id="td"><b>Arcnote Price</b></td>
                        <td id="td"><b>View Details</b></td>
                    </tr>
                </table>
                </center>
                <?php
 
                $query = "select * from book where book_status!='sold' and seller_user_id!= '$_SESSION[user_id]'
                and book_category_id = (select category_id from categories where category_name = 'IT' )" ;
                $query_run = mysqli_query($connection,$query);
                $query_run2 = mysqli_query($connection,$query);

                $ro2w= mysqli_fetch_array($query_run2);

                if(!is_null($ro2w)){
                    while($row= mysqli_fetch_array($query_run)){
                        if(is_null($row)){
                            ?>
                            <center>
                                <p><br><b> Sorry!! No book of this category found!! </b></p>
                            </center>
                            <?php
                        }
                        else{
                            ?>
                            <center>
                            <table style="border-collapse: collapse;border: 1px solid black;">
                                <tr>
                                    <td id="td"><?php echo $row['book_name']?></td>
                                    <td id="td"><?php echo $row['book_author']?></td>
                                    <td id="td"><?php echo $row['book_original_price']?></td>
                                    <td id="td"><?php echo $row['book_selling_price']?></td>
                                    <td id="td"> 
                                        <form action="" method="post"><br>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="submit" name="view_book_details" class="btn btn-primary" value="View">
                                                </td>
                                            </tr>                                           
							            </table>
                                        </form>

                                        <br>
                                    </td>   
                                </tr>
                            </table>
                            </center>
                            <?php
                        }
                    }
                }
                else{
                    ?>
                    <center>
                        <p><b><br> Sorry!! No book of this category found!!</b> </p>
                    </center>
                    <?php
                }

            }

            elseif (isset($_POST['show_comp_books']))
            {
                ?>
                <center>
                <h4><b><br>Computer Science Archive</b></h4><br>
                <table>
                    <tr>
                        <td id="td"><b>Book Name</b></td>
                        <td id="td"><b>Author</b></td>
                        <td id="td"><b>Original Price</b></td>
                        <td id="td"><b>Arcnote Price</b></td>
                        <td id="td"><b>View Details</b></td>
                    </tr>
                </table>
                </center>
                <?php
 
                $query = "select * from book where book_status!='sold'and seller_user_id!= '$_SESSION[user_id]'
                 and book_category_id = (select category_id from categories where category_name = 'Computer' )" ;
                $query_run = mysqli_query($connection,$query);
                $query_run2 = mysqli_query($connection,$query);
                $row2= mysqli_fetch_array($query_run2);
                  
                if(!is_null($row2)){
                    while($row= mysqli_fetch_array($query_run)){
                        if(is_null($row)){
                            ?>
                            <center>
                                <p> Sorry!! No book of this category found!! </p>
                            </center>
                            <?php
                        }
                        else{
                            ?>
                            <center>
                            <table style="border-collapse: collapse;border: 1px solid black;">
                                <tr>
                                    <td class='book-name' id="td"><?php echo $row['book_name']?></td>
                                    <td id="td"><?php echo $row['book_author']?></td>
                                    <td id="td"><?php echo $row['book_original_price']?></td>
                                    <td id="td"><?php echo $row['book_selling_price']?></td>
                                    <td id="td"> 
                                        <form action="" method="post"><br>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="submit" name="view_book_details" class="btn btn-primary" value="View">
                                                </td>
                                            </tr>                                           
							            </table>
                                        </form>

                                        <br>
                                    </td>   
                                </tr>
                            </table>
                            </center>
                            <?php

                        
                        }
                    }
                }
                else{
                    ?>
                    <center>
                        <p><b><br> Sorry!! No book of this category found!!</b> </p>
                    </center>
                    <?php
                }
                
            }

   

            elseif(isset($_POST['show_electrical_books']))
            {
                ?>
                <center>
                <h4><b><br>Electrical Archive</b></h4><br>
                <table>
                    <tr>
                        <td id="td"><b>Book Name</b></td>
                        <td id="td"><b>Author</b></td>
                        <td id="td"><b>Original Price</b></td>
                        <td id="td"><b>Arcnote Price</b></td>
                        <td id="td"><b>View Details</b></td>
                    </tr>
                </table>
                </center>
                <?php
 
                $query = "select * from book where book_status!='sold' and seller_user_id!= '$_SESSION[user_id]'
                 and book_category_id = (select category_id from categories where category_name = 'Electrical' )" ;
                $query_run = mysqli_query($connection,$query);
                $query_run2 = mysqli_query($connection,$query);

                $row2= mysqli_fetch_array($query_run2);

                if(!is_null($row2)){

                    while($row= mysqli_fetch_array($query_run)){
                        if(is_null($row)){
                            ?>
                            <center>
                                <p> Sorry!! No book of this category found!! </p>
                            </center>
                            <?php
                        }
                        else{
                            ?>
                            <center>
                            <table style="border-collapse: collapse;border: 1px solid black;">
                                <tr>
                                    <td id="td"><?php echo $row['book_name']?></td>
                                    <td id="td"><?php echo $row['book_author']?></td>
                                    <td id="td"><?php echo $row['book_original_price']?></td>
                                    <td id="td"><?php echo $row['book_selling_price']?></td>
                                    <td id="td"> 
                                        <form action="" method="post"><br>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="submit" name="view_book_details" class="btn btn-primary" value="View">
                                                </td>
                                            </tr>                                           
							            </table>
                                        </form>

                                        <br>
                                    </td>   
                                </tr>
                            </table>
                            </center>
                            <?php
                        }
                    }
                }

                else{
                    ?>
                    <center>
                        <p><b><br> Sorry!! No book of this category found!!</b> </p>
                    </center>
                    <?php
                }

            }

            elseif(isset($_POST['show_other_books']))
            {
                ?>
                <center>
                <h4><b><br>General Archive</b></h4><br>
                <table>
                    <tr>
                        <td id="td"><b>Book Name</b></td>
                        <td id="td"><b>Author</b></td>
                        <td id="td"><b>Original Price</b></td>
                        <td id="td"><b>Arcnote Price</b></td>
                        <td id="td"><b>View Details</b></td>
                    </tr>
                </table>
                </center>
                <?php
 
                $query = "select * from book where book_status!='sold' and seller_user_id!= '$_SESSION[user_id]'
                and book_category_id = (select category_id from categories where category_name = 'Other' )" ;
                $query_run = mysqli_query($connection,$query);
                $query_run2 = mysqli_query($connection,$query);

                $row2= mysqli_fetch_array($query_run2);

                if(!is_null($row2)){

                    while($row= mysqli_fetch_array($query_run)){
                        if(is_null($row)){
                            ?>
                            <center>
                                <p> Sorry!! No book of this category found!! </p>
                            </center>
                            <?php
                        }
                        else{
                            ?>
                            <center>
                            <table style="border-collapse: collapse;border: 1px solid black;">
                                <tr>
                                    <td id="td"><?php echo $row['book_name']?></td>
                                    <td id="td"><?php echo $row['book_author']?></td>
                                    <td id="td"><?php echo $row['book_original_price']?></td>
                                    <td id="td"><?php echo $row['book_selling_price']?></td>
                                    <td id="td"> 
                                        <form action="" method="post"><br>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="submit" name="view_book_details" class="btn btn-primary" value="View">
                                                </td>
                                            </tr>                                           
							            </table>
                                        </form>

                                        <br>
                                    </td>   
                                </tr>
                            </table>
                            </center>
                            <?php
                        }
                    }
                }

                else{
                    ?>
                    <center>
                        <p><b><br> Sorry!! No book of this category found!!</b> </p>
                    </center>
                    <?php
                }

            }

        
            elseif(isset($_POST['home']))
            {
                ?>
                <center>
                <h4><b>Your Preferences</b></h4><br>
                <table>
                    <tr>
                        <td id="td"><b>Book Name</b></td>
                        <td id="td"><b>Author</b></td>
                        <td id="td"><b>Original Price</b></td>
                        <td id="td"><b>Arcnote Price</b></td>
                        <td id="td"><b>View Details</b></td>
                    </tr>
                </table>
                </center>
                <?php
	
                
                    $query = "select * from book where book_status!='sold' and seller_user_id!= '$_SESSION[user_id]'
                     and book_category_id = (select category_id from categories where category_name = '$_SESSION[preferences]' )" ;
                    $query_run = mysqli_query($connection,$query);
                    $query_run2 = mysqli_query($connection,$query);
                    
                    $row2= mysqli_fetch_array($query_run2);

                    if(!is_null($row2)){
                        while($row= mysqli_fetch_array($query_run)){
                            if(is_null($row)){
                                ?>
                                <center>
                                    <p> Sorry!! No book of this category found!! </p>
                                </center>
                                <?php
                            }
                            else{
                                ?>
                                <center>
                                <table style="border-collapse: collapse;border: 1px solid black;">
                                    <tr>
                                        <td id="td"><?php echo $row['book_name']?></td>
                                        <td id="td"><?php echo $row['book_author']?></td>
                                        <td id="td"><?php echo $row['book_original_price']?></td>
                                        <td id="td"><?php echo $row['book_selling_price']?></td>
                                        <td id="td"> 
                                        <form action="" method="post"><br>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="submit" name="view_book_details" class="btn btn-primary" value="View">
                                                </td>
                                            </tr>                                           
							            </table>
                                        </form>

                                        <br>
                                    </td>   
                                    </tr>
                                </table>
                                </center>
                                <?php
                            }
                        
                        }
                    }
                    else{
                        ?>
                        <center>
                            <p><b><br> Sorry!! No book of this category found!!</b> </p>
                        </center>
                        <?php
                    }
                }
               
            

            elseif(isset($_POST['edit_your_profile']))
            {

                $query = "select * from users where user_id = '$_SESSION[user_id]' ";
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
                                    <b>User ID:</b>
                                </td> 
                                <td>
                                    <input type="text" value="<?php echo $row['user_id']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Username:</b>
                                </td> 
                                <td>
                                    <input type="text" name="username" value="<?php echo $row['username']?>" disabled>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Verification:</b>
                                </td> 
                                <td>
                                    <input type="text" name="is_verified" value="<?php echo $row['is_verified']?>" disabled>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>First Name:</b>
                                </td> 
                                <td>
                                    <input type="text" name="user_first_name" value="<?php echo $row['user_first_name']?>" enable>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Last Name:</b>
                                </td> 
                                <td>
                                    <input type="text" name="user_last_name" value="<?php echo $row['user_last_name']?>" enable>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>City:</b>
                                </td> 
                                <td>
                                    <input type="text" name="user_city" value="<?php echo $row['user_city']?>" enable>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Pin:</b>
                                </td> 
                                <td>
                                    <input type="text" name="user_city_pin" value="<?php echo $row['user_city_pin']?>" enable>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Mobile:</b>
                                </td> 
                                <td>
                                    <input type="text" name="user_mobile" value="<?php echo $row['user_mobile']?>" enable>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Email:</b>
                                </td> 
                                <td>
                                    <input type="text" name="user_email" value="<?php echo $row['user_email']?>" enable>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Preferences:</b>
                                </td> 
                                <td>
                                    <input type="text" name="preferences" value="<?php echo $row['preferences']?>" enable>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Password:</b>
                                </td> 
                                <td>
                                    <input type="text" name="user_password" value="<?php echo $row['user_password']?>" enable>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" name="submit_changes_of_edit_your_profile" value="Save" ></td>

                            </center>
                        </table>
                    </form>

                    <?php	

                }

            }

            // SELL BOOKS
            elseif(isset($_POST['sell_new_book']))
            {
                ?>	
                    <center>
                    <h4><b>Sell Book...</b></h4><br><br>
                    <form action="" method="post">
                        &nbsp;&nbsp;<b>Book Name:</b>&nbsp;&nbsp; <input type="text" name="book_name"><br><br>
                        
                        &nbsp;&nbsp;<b>Book Author.:</b>&nbsp;&nbsp; <input type="text" name="book_author"><br><br>

                        &nbsp;&nbsp;<b>Book Edition:</b>&nbsp;&nbsp; <input type="text" name="book_edition"><br><br>

                        &nbsp;&nbsp;<b>Book Subject:</b>&nbsp;&nbsp; <input type="text" name="book_subject"><br><br>	

                        &nbsp;&nbsp;<b>Original Price:</b>&nbsp;&nbsp; <input type="text" name="book_original_price"><br><br>	

                        &nbsp;&nbsp;<b>Selling Price:</b>&nbsp;&nbsp; <input type="text" name="book_selling_price"><br><br>

                        &nbsp;&nbsp;<b> Description:</b>&nbsp;&nbsp; <input  type="text" name="book_desc"><br><br> 

                        &nbsp;&nbsp;<b> Category:</b>&nbsp;&nbsp; <input  type="text" name="category"><br><br> 

                    	
                        <br><input type="submit" name="add_new_book_to_sell" class="btn btn-primary"  value="Confirm"><br>
                    </form>
                    </center>

                    <?php	
            }


              // SELL BOOKS
              elseif(isset($_POST['sell_new_book']))
              {
                  ?>	
                      <center>
                      <h4><b>Sell Book...</b></h4><br><br>
                      <form action="" method="post">
                          &nbsp;&nbsp;<b>Book Name:</b>&nbsp;&nbsp; <input type="text" name="book_name"><br><br>
                          
                          &nbsp;&nbsp;<b>Book Author.:</b>&nbsp;&nbsp; <input type="text" name="book_author"><br><br>
  
                          &nbsp;&nbsp;<b>Book Edition:</b>&nbsp;&nbsp; <input type="text" name="book_edition"><br><br>
  
                          &nbsp;&nbsp;<b>Book Subject:</b>&nbsp;&nbsp; <input type="text" name="book_subject"><br><br>	
  
                          &nbsp;&nbsp;<b>Original Price:</b>&nbsp;&nbsp; <input type="text" name="book_original_price"><br><br>	
  
                          &nbsp;&nbsp;<b>Selling Price:</b>&nbsp;&nbsp; <input type="text" name="book_selling_price"><br><br>
  
                          &nbsp;&nbsp;<b> Description:</b>&nbsp;&nbsp; <input  type="text" name="book_desc"><br><br> 
  
                          &nbsp;&nbsp;<b> Category:</b>&nbsp;&nbsp; <input  type="text" name="category"><br><br> 
  
                          
                          <br><input type="submit" name="add_new_book_to_sell" class="btn btn-primary"  value="Confirm"><br>
                      </form>
                      </center>
  
                      <?php	
              }

              elseif(isset($_POST['prev_sold_book'])){
                ?>
                <center>
                <h4><b>Your Selling History...</b></h4><br>
                <table>
                    <tr>
                        <td id="td"><b>Book Name</b></td>
                        <td id="td"><b>Author</b></td>
                        <td id="td"><b>Original Price</b></td>
                        <td id="td"><b>Arcnote Price</b></td>
                        <td id="td"><b>View Details</b></td>
                    </tr>
                </table>
                </center>
                <?php
	
                
                    $query = "select * from book where seller_user_id = '$_SESSION[user_id]' " ;
                    $query_run = mysqli_query($connection,$query);
                    $query_run2 = mysqli_query($connection,$query);
                    
                    $row2= mysqli_fetch_array($query_run2);

                    if(!is_null($row2)){
                        while($row= mysqli_fetch_array($query_run)){
                            if(is_null($row)){
                                ?>
                                <center>
                                    <p> Sorry!! No book of this category found!! </p>
                                </center>
                                <?php
                            }
                            else{
                                ?>
                                <center>
                                <table style="border-collapse: collapse;border: 1px solid black;">
                                    <tr>
                                        <td id="td"><?php echo $row['book_name']?></td>
                                        <td id="td"><?php echo $row['book_author']?></td>
                                        <td id="td"><?php echo $row['book_original_price']?></td>
                                        <td id="td"><?php echo $row['book_selling_price']?></td>
                                        <td id="td"> 
                                        <form action="" method="post"><br>
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="submit" name="view_sold_book_details" class="btn btn-primary" value="View">
                                                </td>
                                            </tr>                                           
							            </table>
                                        </form>

                                        <br>
                                    </td>   
                                    </tr>
                                </table>
                                </center>
                                <?php
                            }
                        
                        }
                    }
                    else{
                        ?>
                        <center>
                            <p><b><br> You have not sold any book on arcnote!!</b> </p>
                        </center>
                        <?php
                    }
              }




            if(isset($_POST['add_new_book_to_sell']))
				{
                    $cat_id=-1;
                    if('$_POST[category]'=='Computer' ){
                        $cat_id=1;
                    }
                    elseif('$_POST[category]'=='Mechnical' ){
                        $cat_id=2;
                    }
                    elseif('$_POST[category]'=='IT' ){
                        $cat_id=3;
                    }
                    elseif('$_POST[category]'=='Electrical' ){
                        $cat_id=4;
                    }
                    else{
                        $cat_id=5;
                    }
             
					$query = "INSERT INTO book(book_name, book_author, book_edition, book_subject, 
                    book_original_price, book_selling_price, book_desc, book_status, book_category_id, seller_user_id) VALUES 
					( '$_POST[book_name]' , '$_POST[book_author]' ,'$_POST[book_edition]' ,'$_POST[book_subject]' 
                    ,'$_POST[book_original_price]', '$_POST[book_selling_price]' ,'$_POST[book_desc]' , 'available', '$cat_id' , '$_SESSION[user_id]' )";
					echo $query;
					$query_run = mysqli_query($connection,$query);
					
					if(($query_run)){
												
						?>	
						<script type="text/javascript">
						alert("Book has been added!! ");
						window.location.href = "customer_dashboard.php";
						</script>
					
					<?php
						
					}
					
					else{
						?>
						<center>
						<h4><u>Book could not be added. Try Again !!</u></h4><br><br>
						</center>
						<?php
					}

				}

            if(isset($_POST['submit_changes_of_edit_your_profile']))
            {
                $query = "update users set user_first_name ='$_POST[user_first_name]', user_last_name ='$_POST[user_last_name]' ,
                user_city ='$_POST[user_city]', user_city_pin = '$_POST[user_city_pin]' ,
                user_mobile ='$_POST[user_mobile]', user_email = '$_POST[user_email]' ,
                preferences ='$_POST[preferences]', user_password = '$_POST[user_password]' 
                WHERE user_id = $_SESSION[user_id] " ;
                $query_run = mysqli_query($connection,$query);

                ?>	
                    <script type="text/javascript">
                    alert("Profile Updated Successfully!!");
                    window.location.href = "customer_dashboard.php";
                    </script>
                
                <?php


            }

            if(isset($_POST['view_book_details'])){

                $query = "select * from book where book_id = '$_POST[book_id]'" ;
                $query1 = "select * from users where user_id = (Select seller_user_id from book where book_id = '$_POST[book_id]') " ;

                $query_run = mysqli_query($connection,$query);
                $query_run1 = mysqli_query($connection,$query1);
                $row= mysqli_fetch_array($query_run);
                $row1= mysqli_fetch_array($query_run1);


                ?><center>
                    <h4> <Strong><?php echo $row['book_name'];?></Strong></h4><br>

                     <table style="border-collapse: collapse;border: 1px solid black;">
                                <tr>
                                    <td id="td1"> <p> Author </p></td>
                                    <td id="td1"> <p><?php echo $row['book_author'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Edition  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_edition'];?> </p></td>
                                </tr>
                                <tr>
                                    <td id="td1"> <p> Subject  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_subject'];?> </p></td>
                                </tr> 
                                <tr>
                                    <td id="td1"> <p> Orginal Price  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_original_price'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Selling Price  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_selling_price'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Description  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_desc'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Status  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_status'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Seller name  </p></td>
                                    <td id="td1"> <p><?php echo $row1['username'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Seller contact  </p></td>
                                    <td id="td1"> <p><?php echo $row1['user_mobile'];?> </p></td>
                                </tr>

                            </table><br>

                            <form action="" method="post">
                                <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
                                <input type="submit" name="buy_book" class="btn btn-primary"  value="Buy">
                            </form><br>
                            
                            <form action="" method="post">
                                <input type="hidden" name="book_id" value="<?php echo $row['book_id']?>">
                                <input type="submit" name="rent_book" class="btn btn-primary" value="Rent">
                            </form><br>

                </center>
                <?php
            }
            
            if(isset($_POST['buy_book']))
            {

                $query = "update book set book_status= 'sold' where book_id = '$_POST[book_id]'" ;
                $query_run = mysqli_query($connection,$query);

                ?>	
                <script type="text/javascript">
                    alert("Book Purchased!!");
                    window.location.href = "customer_dashboard.php";
                </script>
                <?php
            }

            if(isset($_POST['view_sold_book_details'])){

                $query = "select * from book where book_id = '$_POST[book_id]'" ;
                $query1 = "select * from users where user_id = (Select seller_user_id from book where book_id = '$_POST[book_id]') " ;

                $query_run = mysqli_query($connection,$query);
                $query_run1 = mysqli_query($connection,$query1);
                $row= mysqli_fetch_array($query_run);
                $row1= mysqli_fetch_array($query_run1);


                ?><center>
                    <h4> <Strong><?php echo $row['book_name'];?></Strong></h4><br>

                     <table style="border-collapse: collapse;border: 1px solid black;">
                                <tr>
                                    <td id="td1"> <p> Author </p></td>
                                    <td id="td1"> <p><?php echo $row['book_author'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Edition  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_edition'];?> </p></td>
                                </tr>
                                <tr>
                                    <td id="td1"> <p> Subject  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_subject'];?> </p></td>
                                </tr> 
                                <tr>
                                    <td id="td1"> <p> Orginal Price  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_original_price'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Selling Price  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_selling_price'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Description  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_desc'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Status  </p></td>
                                    <td id="td1"> <p><?php echo $row['book_status'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Seller name  </p></td>
                                    <td id="td1"> <p><?php echo $row1['username'];?> </p></td>
                                </tr>

                                <tr>
                                    <td id="td1"> <p> Seller contact  </p></td>
                                    <td id="td1"> <p><?php echo $row1['user_mobile'];?> </p></td>
                                </tr>

                            </table><br>


                </center>
                <?php
            }

            if(isset($_POST['rent_book']))
            {
                $query = "update book set book_status= 'rent' where book_id = '$_POST[book_id]'" ;
                $query_run = mysqli_query($connection,$query);
                
                ?>	
                <script type="text/javascript">
                    alert("Book Rented!!");
                    window.location.href = "customer_dashboard.php";
                </script>
                <?php
            }

           

            ?>


            
                    
        </div>
    </div>
    </body>
</html>