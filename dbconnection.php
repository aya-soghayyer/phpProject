<!DOCTYPE html>
<html>
<head>
	<title> Database Connection </title>
</head>
<body>

<?php
//1 - recieve data from Web Form: 

$ISBN = (int) $_POST['ISBN']; 
$Title = $_POST['Title']; 
$Eno  = (int) $_POST['Eno']; 
$Cr = $_POST['Cr']; 
$price = $_POST['Price']; 

$name = $_FILES['Cover']['name'];
$tmp = $_FILES['Cover']['tmp_name'];
echo "name: " . $name . "<br>";
echo "Tmp: " . $tmp . "<br>"; 
$path = "img/" . $name; 
echo "Path: " . $path . "<br>"; 
move_uploaded_file($tmp, $path);



//2- create connection with bookstore database 

$con = mysqli_connect("localhost:3306", "root", "", "books");  

if($con)
{
	echo "Connection successfull"; 

	//do some quesry
  
    $sql = "INSERT INTO books 
	VALUES   ($ISBN, '$Title', $Eno, '$Cr', '$path', $price)";

	mysqli_query($con, $sql);

	/*$sql = "INSERT INTO books (ISBN, Title) 
	        VALUES (00000, 'Introduction')"; 
	$x = mysqli_query($con, $sql);
	*/
	if(mysqli_query($con, $sql))
	{
		echo "One Row is successfully Added"; 
	}  

}
else
{
	echo "Error 404"; 
}
mysqli_close($con); 
?>


</body>
</html>