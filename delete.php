<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE</title>
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
        $statement = $connexion->prepare("DELETE from users where id=?");        
        $statement->execute([$id]);
        echo("<hr><span style='color:green;'>User Successfully deleted</span><hr>");
    }
    catch (Exception $e) {
        echo("<hr><div style='color:red;'>could not delete this User<br>");
        echo($e->getMessage()."</div><hr>");
    }

    ?>
<br>
<a href="indexCRUD.html">Home CRUD</a>
</body>
</html>