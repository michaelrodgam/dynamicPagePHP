<!--This is data to start the server, is the Model-->
<?php
    require_once "pdo.php";
    
    if(isset($_POST["name"]) && isset($_POST["lastName"]) 
    && isset($_POST["email"]) && isset($_POST["bornAge"])){
        $sqlInsert = "INSERT INTO users (name, lastName, email, bornAge) 
                        VALUES (:name, :lastName, :email, :bornAge)";
        
        echo("<pre>\n".$sqlInsert."</pre>\n");
        $stmt = $pdo->prepare($sqlInsert);
        $stmt->execute(array(
            ":name"=>$_POST["name"],
            ":lastName"=>$_POST["lastName"],
            ":email"=>$_POST["email"],
            ":bornAge"=>$_POST["bornAge"],
        ));
    }
    
?>

<!--This is the View, and how it will be show to the user-->
<html>
    <head>
        <meta charset="uft-8">
        
        <link href="styles.css" media="screen" rel="stylesheet" type="text/css">
        <title>Dynamic web page</title>
    </head>

    <body>
        <header>
        <h1>Add accounts to the database</h1>
        </header>

        <main>
            <div id="data">
                <form method="post">
                    <p>Name: <br><input type="text" name="name" size="40"></p>   
                    <p>Last Name: <br><input type="text" name="lastName" size="40"></p>
                    <p>E-mail: <br><input type="text" name="email" size="40"></p>
                    <p>Born age: <br><input type="text" name="bornAge" size="4"></p>
                    <p><input type="submit" value="Add New"></p>
                </from>
            </div>
            

            <h4><a href="./deleteAc.php">Delete users?</a><h4>
        </main>

        <footer>
        <p>Dynamic web page developed by: Michael Rodriguez Gamboa. <br>
        All mistakes and rights reserved. Costa Rica. 2020. <p>
        </footer>


    </body>
 
</html>
