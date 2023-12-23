<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Display Books</title>
</head>
<body>
<!-- 4 - Put HTML Table inside Web Form to allow the user to select one row 
    to be updated 
-->

<form action = "updateauthorform.php" method = "post">
    <fieldset>
<?php
  //1 - dbcon 
    require("dbcon.php"); 
    if($con)
    {
	//echo "Connection successfull"; 
//2 - select data from database (Book table)
	$sql = "SELECT * FROM authors";	
	$result = mysqli_query($con, $sql); 

// 3- fetch the result set and display it in HTML table
    echo "<table border = '1'> 
             <tr> 
                <th> Update </th>
                <th> id </th>
                <th> fristname </th>
                <th>  last name </th> 
             </tr> "; 

    //mysqli_fetch_array ==> return one row from result set each time OR false when the rows ends
 
    while($row = mysqli_fetch_array($result))
    {
    	$id = $row["ID"];  
    	echo "<tr>";

    	echo    "<td><input type = 'radio' name = 'id' 
    	           value = '$id' ></td>" ;
    	echo    "<td> " . $row['ID'] . "</td>"; 
    	echo    "<td> " . $row['Fname'] . "</td>";
    	echo    "<td> " . $row['Lname'] . "</td>";
    	echo "</tr> ";  
    }
}
else
{
	echo "Error 404"; 
}

?>
</table>
<!-- select and submit -->

<input type="submit" name="update" value = "Update Books">
</fieldset>
</form>
</body>
</html>