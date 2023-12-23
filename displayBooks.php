<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Display Books</title>
</head>
<body>

<form action = "<?php echo $_SERVER['PHP_SELF']; ?>" method = 'post' >
<fieldset>
	<legend>Select Books </legend>
	<label> Price: </label><br>
	<label> From: </label><input type="number" name="from" >
	<label> To: </label><input type="number" name="to" >
	<input type="submit" name="submit" value = "Select Books">
<?php

/* 
echo "<form action = '" . echo $_SERVER['PHP_SELF']; . "method = 'post' > "; 

*/ 

$con = mysqli_connect("localhost:3306", "root", "", "books"); 
if($con)
{
	echo "Connection successfull"; 

	if(!isset($_POST['submit']))
	{
		$sql = "SELECT * FROM books";
	}
	else 
	{
	 	$from = $_POST['from']; 
	 	$to = $_POST['to']; 
	 	$sql = "SELECT * FROM books 
	 	      WHERE Price >= $from AND Price <= $to"; 
	} 
	
	$result = mysqli_query($con, $sql); 

    echo "<table border = '1'> 
             <tr> 
                <th> ISBN </th>
                <th> Title </th>
                <th> Edition No </th> 
                <th> Copy right </th> 
                <th> Cover </th>
                <th> Price </th>  
             </tr> "; 

    //mysqli_fetch_array ==> return one row from result set each time OR false when the rows ends
    while($row = mysqli_fetch_array($result))
    {
    	echo "<tr>"; 
    	echo    "<td> " . $row['ISBN'] . "</td>"; 
    	echo    "<td> " . $row['Title'] . "</td>";
    	echo    "<td> " . $row['EditionNo'] . "</td>";
    	echo    "<td> " . $row['CopyRight'] . "</td>";
    	echo    "<td> <img src = '" . $row['Cover'] . "' hight = '200' width = '200' /> </td>";
    	echo    "<td> " . $row['Price'] . "</td>";
    	echo "</tr> ";  
    }
}
else
{
	echo "Error 404"; 
}

?>

</fieldset>
</form>
</body>
</html>