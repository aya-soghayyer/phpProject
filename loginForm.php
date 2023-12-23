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
        <label>User Name </label><input type="text" name = "login" required /><br>
        <label>Password </label><input type="password" name = "pass" required /><br>
        <input type = "submit" name = "submit" value = "Login"/>
    </form>

    <?php  

 		if(isset($_POST["submit"]))
 		{
            $login = $_POST['login']; 
    		$p = $_POST['pass']; 

            //this statement copy the contents of the 
            //"dbcon.php" file and nofiy error if the 
            //file does not exist

            require("dbcon.php");
            
            $sql = "SELECT * FROM users WHERE 
                    userName = '$login' AND 
                    password = '$p';";
            
            $result = mysqli_query($con, $sql); 

            $row = mysqli_fetch_array($result);

	    	if(mysqli_num_rows($result) > 0)
	    	{
					echo "Hello " . $row['userName'] . "<br>";
					echo  "Your Password: " . $row["password"] . "<br>";
					header("Location: userpage.php"); 
			}

			
	    echo "Your login name or password is incorrect";
 		}
 
    ?>
</body>
</html>