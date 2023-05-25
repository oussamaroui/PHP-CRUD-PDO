<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>READ</title>
</head>
<body>
<h2>Users list</h2>
<form action="#" method="post">
Display users with age > <input type="number" name="ageparam"/>
<input type="submit" value="Search"/>
</form><br>

<?php
$host = 'localhost';
$dbname = 'oussama';
$username = 'root';
$password = '';

try {
    $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    if (isset($_REQUEST["ageparam"])){
        $statement = $connexion->prepare("select * from  users where age>?");
        $statement->execute([$_REQUEST["ageparam"]]);
    }
    else
        $statement = $connexion->prepare("select * from  users");
        $statement->execute();
        $data=$statement->fetchAll();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
?>

<table border="1" cellspacing="0">
    <thead>
    <tr>
        <td>ID</td>
        <td>EMAIL</td>
        <td>FULL NAME</td>
        <td>PASSWORD</td>
        <td>AGE</td>
        <td>ACTIONS</td>
    </tr>
    </thead>
    <tbody>
        <?php
        foreach($data as $ligne)
        echo "
        <tr>
            <td>".$ligne["id"]."</td>
            <td>".$ligne["email"]."</td>
            <td>".$ligne["fname"]."</td>
            <td>".$ligne["pass"]."</td>
            <td>".$ligne["age"]."</td>
            <td><a style='margin-right:5px;' href='delete.php?id=".$ligne["id"]."'>Supprimer</a>
            <a href='update.php?id=".$ligne["id"]."'>Modifier</a></td>
        </tr>";
        ?>
    </tbody>
</table>
<br>
<a href="indexCRUD.html">Home CRUD</a>

</body>
</html>