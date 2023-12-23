<!DOCTYPE html>
<html>
<head>
	<title>Update Form - Action Page</title>
</head>
<body>

<?php
require("dbcon.php"); 

// 6 - send the selected row to new HTML Form and 
//dispaly row data inside this form
if(!isset($_POST['submit']))
{
	$id = $_POST["id"]; 

	

	$sql = "SELECT * FROM authors WHERE ID = '$id';";

	$result = mysqli_query($con, $sql); 

	$row = mysqli_fetch_array($result); 

	$id = $row["ID"];
	$ln = $row["Lname"]; 
	$fn = $row['Fname']; 
	

}
elseif(isset($_POST['submit']))
{
	
	$id = $_POST["Id"];
	$fn = $_POST["fname"]; 
	$ln = $_POST['lname']; 
	
	// $sql2 = "update authors  
	// 		SET Fname = '$fn', Lname = '$ln',
	// 		WHERE  ID = '$id';";

$sql=	 "UPDATE authors
SET Fname ='$fn', Lname = '$ln'
    WHERE ID ='$id'";;


	if(mysqli_query($con, $sql))
	   echo "<h1> One Row is successfully Updated </h1>";  

}

?>
<form action = '<?php echo $_SERVER["PHP_SELF"]; ?>' method = 'post'> 
	<fieldset>
		<legend> Update Book Form </legend>
		<label for="">id</label>
		   <input type = "text" name = 'Id' value = '<?php echo $id; ?>' 
		    readonly /><br>
			<label for="">first name </label>
		   <input type = 'text' name = 'fname' value = '<?php echo $fn; ?>' /><br>
		   <label for="">last name</label>
		   <input type = 'text' name = 'lname' value = '<?php echo $ln; ?>' /><br>
		  

		   <input type="submit" name="submit" value = "Confirm Update">


</fieldset>
</form>
</body>
</html>