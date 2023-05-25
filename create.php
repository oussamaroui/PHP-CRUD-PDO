<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE</title>
</head>
<body>
    <h1>Create New User</h1>
    <form action="#" method="post">
    Email : <input type="text" name="email" required><br>
    Full Name <input type="text" name="fname"><br>
    Age : <input type="number" name="age"><br>
    Password : <input type="password" name="password" required ><br>
    <input type="submit" value="Save" name="submit"><br>
    </form>
<?php
$host = 'localhost';
$dbname = 'oussama';
$username = 'root';
$password = '';

if(isset($_POST["submit"])){

    $email=$_POST["email"];
    $fname=$_POST["fname"];
    $age=$_POST["age"];
    $passe=$_POST["password"];

    try {
        $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $statement = $connexion->prepare("INSERT INTO users(email, fname, pass, age) VALUES(?,?,?,?)");
        $statement->execute([$email, $fname, $passe, $age]);
        echo("<hr><span style='color:green;'>User registered successfully</span><hr>");
    }
    catch (Exception $e) {
        echo("<hr><div style='color:red;'>Unable to add this User<br>");
        echo($e->getMessage()."</div><hr>");
    }
}
?>
<br>
<a href="indexCRUD.html">Home CRUD</a>
</body>
</html>