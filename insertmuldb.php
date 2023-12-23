<html>
<head>
    <title> Database Connection </title>
</head>
<body>


<?php
//1 - recieve data from Web Form:


// $ISBN = $_POST['ISBN'];
$fn = $_POST['fname'];
$ln  = $_POST['lname'];
$email = $_POST['em'];
$password = $_POST['pass'];
$Birth = $_post['bod'];
$img = $_FILES['files']['name'];
$tmp = $_FILES['files']['tmp_name'];
echo "name: " . $name . "<br>";
echo "Tmp: " . $tmp . "<br>";
$path = "img/" . $name;
echo "Path: " . $path . "<br>";
move_uploaded_file($tmp, $path);

require("dbnewcon.php");




//2- create connection with bookstore database





if($con)
{
    echo "Connection successfull";


    //do some query
 
    $sql = "INSERT INTO muldb values  
             ('$fn', '$ln', '$email',  '$password',$Birth, '$path')";


    $resutlt = mysqli_query($con, $sql);


    /*$sql = "INSERT INTO books (ISBN, Title)
            VALUES (00000, 'Introduction')";
*/
    // $x = mysqli_query($con, $sql);
    if($x)
    {
        echo "One Row is successfully Added";
    }  


}
else
{
    echo "Error 404";
    die("couldn't connect :" . mysqli_error());
}
mysqli_close($con);
?>




</body>
</html>
