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

<form action = "updateForm.php" method = "post">
    <fieldset>
<?php
  //1 - dbcon 
    require("dbcon.php"); 
    if($con)
    {
	//echo "Connection successfull"; 
//2 - select data from database (Book table)
	$sql = "SELECT * FROM books";	
	$result = mysqli_query($con, $sql); 

// 3- fetch the result set and display it in HTML table
    echo "<table border = '1'> 
             <tr> 
                <th> Update </th>
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
    	$id = $row["ISBN"];  
    	echo "<tr>";

    	echo    "<td><input type = 'radio' name = 'id' 
    	           value = '$id' ></td>" ;
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
</table>
<!-- select and submit -->

<input type="submit" name="update" value = "Update Books">
</fieldset>
</form>
</body>
</html>