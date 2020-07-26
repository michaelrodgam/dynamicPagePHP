<!--This is data to start the server, is the Model!-->
<?php
    require_once "pdo.php";
    
    //add new data user.
    if(isset($_POST["name"]) && isset($_POST["lastName"]) 
    && isset($_POST["email"]) && isset($_POST["bornAge"])){
        $sqlInsert = "INSERT INTO users (name, lastName, email, bornAge) 
                        VALUES (:name, :lastName, :email, :bornAge)";
        
        $stmt = $pdo->prepare($sqlInsert);
        $stmt->execute(array(
            ":name"=>$_POST["name"],
            ":lastName"=>$_POST["lastName"],
            ":email"=>$_POST["email"],
            ":bornAge"=>$_POST["bornAge"],
        ));
        //POST-redirect-GET
        header("location: addAC.php");
        return;
    }
    
    function showData(){ //Why this do not work? I do not know. It is the same.
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
    }

?>

<!--This is the View, and how it will be show to the user-->
<html>
    <head>
        <meta charset="uft-8">
        
        <link href="styles.css" media="screen" rel="stylesheet" type="text/css">
        <title>Adding Users</title>
    </head>

    <body>
        <header>
        <h1>Add accounts to the database</h1>
        </header>

        <main>
            <div id="showData">
                <!--This is for show the data-->
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
                        //showData();
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

            <div id="dataInput">
                <form method="post">
                    <p>Name: <br><input type="text" name="name" size="40"></p>   
                    <p>Last Name: <br><input type="text" name="lastName" size="40"></p>
                    <p>E-mail: <br><input type="text" name="email" size="40"></p>
                    <p>Born age: <br><input type="text" name="bornAge" size="4"></p>
                    <p><input type="submit" value="Add New"></p>
                </from>
            </div>
            

            <h4><a href="./deleteAc.php">Delete users?</a></h4>
            <h4><a href="./index.php">Home</a></h4>
        </main>

        <footer>
        <p>Dynamic web page developed by: Michael Rodriguez Gamboa. <br>
        All mistakes and rights reserved. Costa Rica. 2020. <p>
        </footer>


    </body>
 
</html>
