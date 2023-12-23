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

	

	$sql = "SELECT * FROM books WHERE ISBN = '$id'";

	$result = mysqli_query($con, $sql); 

	$row = mysqli_fetch_array($result); 

	$ISBN = $row["ISBN"];
	$Title = $row["Title"]; 
	$EN = $row['EditionNo']; 
	$CR = $row['CopyRight'];
	$cover = $row['Cover'];
	$P = $row['Price'];

}
elseif(isset($_POST['submit']))
{
	
	$ISBN = $_POST["ISBN"];
	$Title = $_POST["Title"]; 
	$EN = $_POST['EN']; 
	$CR = $_POST['CR'];

	$P = $_POST['price'];

	$sql = "update books  SET
	        Title = '$Title',
	        EditionNo = $EN,
	        CopyRight = '$CR',
	        Price = $P 
	        WHERE 
	        ISBN = '$ISBN';";
	if(mysqli_query($con, $sql))
	   echo "<h1> One Row is successfully Updated </h1>";  

}

?>
<form action = '<?php echo $_SERVER["PHP_SELF"]; ?>' method = 'post'> 
	<fieldset>
		<legend> Update Book Form </legend>
		<label for="">ISBN</label>
		   <input type = "text" name = 'ISBN' value = '<?php echo $ISBN; ?>' 
		    readonly /><br>
			<label for="">title</label>
		   <input type = 'text' name = 'Title' value = '<?php echo $Title; ?>' /><br>
		   <label for="">en</label>
		   <input type = 'text' name = 'EN' value = '<?php echo $EN; ?>' /><br>
		   <label for="">CopyRight</label>
		   <input type = 'text' name = 'CR' value = '<?php echo $CR; ?>' /><br>
		   <label for="">price</label>
		   <input type = 'text' name = 'price' value = '<?php echo $P; ?>' /><br>

		   <input type="submit" name="submit" value = "Confirm Update">


</fieldset>
</form>
</body>
</html>