<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insertmuldb.php" method="post" >
    <fieldset>
            <legend>Registration Form</legend>
            <div class="format">
                <label for="">First Name: </label>
                <input type="text" name="fname" placeholder="first name">
            </div>
            <div class="format">
                <label for="">Last Name: </label>
                <input type="text" name="lname" placeholder="last name">
            </div>
            <div class="format">
                <label for="">Email: </label>
                <input type="text" name="em" placeholder="email">
            </div>
            <div class="format">
                <label for="">Pasword</label>
                <input type="text" name="pass" placeholder="password">
            </div>
            <div class="format">
                <label for="">Birth Date: </label>
                <input type="date" name="bod">
            </div>
            <div class="format">
                <label for="">Add your picture: </label>
                <input type="file" name="filee">
            </div>
            <div class="format">
                <label for="">I am: </label>
                <input type="radio" name="select">
                <label for="">It student </label>
                <input type="radio" name="select">
                <label for="">student</label>
                <input type="radio" name="select">
                <label for="">employee</label>
            </div>

                    <input type="submit" name="submit" value="submit">
        </fieldset>








    </form>
</body>
</html>