<!--Controler-->
<?php
require_once "pdo.php";

//delete data users here
if(isset($_POST["id"])){
    $sql= "DELETE FROM users WHERE id =:zid";
    $stmt= $pdo->prepare($sql);
    $stmt->execute(array(":zid"=>$_POST["id"]));
    echo("<p>Delete completed!</p>");
    //POST-redirect-GET
    header("location: deleteAc.php");
    return;
}

?>

<!--view-->
<html>
    <head>
        <meta charset="uft-8">
        
        <link href="styles.css" media="screen" rel="stylesheet" type="text/css">
        <title>Dynamic web page</title>
    </head>

    <body>
        <header>
        <h1>Delete accounts</h1>
        </header>

        <main>
            <div>
                <p>Stored data in database:</p>
                <table border="1">
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Last Name</td>
                        <td>E-mail</td>
                        <td>Born</td>
                    </tr>
                    <?php
                
                        $stmt2 = $pdo->query("SELECT * FROM users");
                        while($row = $stmt2->fetch(PDO::FETCH_ASSOC)){
                            echo("<tr><td>");
                            echo($row["id"]);
                            echo("</td><td>");
                            echo($row["name"]);
                            echo("</td><td>");
                            echo($row["lastName"]);
                            echo("</td><td>");
                            echo($row["email"]);
                            echo("</td><td>");
                            echo($row["bornAge"]);
                            echo("</td></tr>");
                        }
                    ?>
                </table>
            </div>
            <div>
                <form method="post">
                <p>Delete by ID:<input type="text" name="id" size="10"></p>
                <p><input type="submit" value="Delete"></p>
                </form>
            </div>
            <h4><a href="./index.php">Add users?</a><h4>
        </main>

        <footer>
        <p>Dynamic web page developed by: Michael Rodriguez Gamboa. <br>
        All mistakes and rights reserved. Costa Rica. 2020. <p>
        </footer>


    </body>
 
</html>