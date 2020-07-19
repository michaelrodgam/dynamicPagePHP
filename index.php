<!DOCTYPE html>

<!--This is data to start the server, is the Model-->
<?php
    require_once "pdo.php";
    
    $stmt = $pdo->query("SELECT * FROM users");
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ //simple test.
        echo("<table border='1'>");
        echo("\n<tr><td>Name: ");
        echo($row["name"]);
        echo("</td><td> Email:");
        echo($row["email"]);
        echo("</td></tr>\n");
        echo("</table>");
    }
?>

<!--This is the View, and how it will be show to the user-->
<html>
 
</html>
