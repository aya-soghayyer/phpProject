
<?php 
//this function is used to enable session in this page 
session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form </title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method = "post">
        <label> User Name </label><input type="text" name = "login" required /><br>
        <label> Password </label><input type="password" name = "pass" required /><br>
        <input type = "submit" name = "submit" value = "Login"/>
    </form>

    <?php  
// require("dbconn.php");
$con =  mysqli_connect("localhost:3306", "root", "", "bookstore");
 		if(isset($_POST["submit"]))
 		{
            $login = $_POST['login']; 
    		$p = $_POST['pass']; 

            //this statement copy the contents of the 
            //"dbcon.php" file and nofiy error if the 
            //file does not exist

            
            
            $sql = "SELECT * FROM users
             WHERE  userName = '$login' AND 
                    password = '$p';";
            
            $result = mysqli_query($con, $sql); 

            $row = mysqli_fetch_array($result);

	    	if(mysqli_num_rows($result) > 0)
	    	{
					
                    $_SESSION['userName'] = $row['userName']; 
                    setcookie("userName", "<br> the value of user name : $login" , time() + 120, "/"); 
                    echo "the time is ".time();
                    //OR $_SESSION['username'] = $login
                    
                    echo "Hello " . $row['userName'] . "<br>";
					echo  "Your Password: " . $row["password"] . "<br>";
					header("Location: userpage.php"); 
			}

			
	    echo "Your login name or passord is incorrect";
 		}
 
    ?>
</body>
</html>