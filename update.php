<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
</head>
<body>
    <?php
    $id=$_REQUEST["id"];

    $host = 'localhost';
    $dbname = 'oussama';
    $username = 'root';
    $password = '';

    try {

        $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $statement = $connexion->prepare("select * from  users where id=?");
        $statement->execute([$id]);
        $ligne=$statement->fetch();

        $email=$ligne["email"];
        $fname=$ligne["fname"];
        $age=$ligne["age"];
        $pass=$ligne["pass"];
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
    ?>


<h1>User Change <?=$id?> With Name <?=$fname?></h1>
    <form action="#" method="post">
    id : <input type="text" name="id" required disabled value="<?=$id?>"/><br/>
    Email : <input type="text" name="email" required value="<?=$email?>"/><br/>
    Full Name : <input type="text" name="fname" required value="<?=$fname?>"/><br/>
    Age : <input type="number" name="age" value="<?=$age?>"/><br/>
    Password : <input type="text" name="password" required value="<?=$pass?>"/><br/>
    <input type="submit" value="Save" name="submit"/><br/>
    </form>

<?php
if(isset($_POST["submit"])){

    $email=$_POST["email"];
    $fname=$_POST["fname"];
    $age=$_POST["age"];
    $passe=$_POST["password"];

try {
    
    $statement = $connexion->prepare("update users set email=?, fname=?, pass=?, age=? where id=?");
    $statement->execute([$email, $fname, $passe, $age, $id]);
    echo("<hr><span style='color:green;'>User Successfully modified</span><hr>");
    }
    catch (Exception $e) {
    echo("<hr><div style='color:red;'>Could not modify this User<br>");
    echo($e->getMessage()."</div><hr>");
    }
}
?>
<br>
<a href="indexCRUD.html">Home CRUD</a>

</body>
</html>