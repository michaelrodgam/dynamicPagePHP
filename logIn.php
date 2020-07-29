<!--Model -->
<?php 
require_once "pdo.php";
session_start();


if(isset($_POST["email"]) && isset($_POST["password"])){
    //database communication
    $sql = "SELECT * FROM users WHERE email = :email AND pass = :pass";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":email" => $_POST["email"], ":pass" => $_POST["password"]));
    
    //getting the results.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $condition = $row["email"] == $_POST["email"] && $row["password"] == $_POST["pass"];
    if($condition){
        $_SESSION ["success"] = "Welcome ".$row["name"]."!";
        $_SESSION ["name"] = $row["name"];
        header("location: ./index.php");
        return;
    }
    else{
        $_SESSION["error"] = "Wrong Email-Password or it do not exist!";
        header("location: ./logIn.php");
        return;
    }
    
}


?>

<!--view-->

<html>
    <head>
        <meta charset="uft-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="./styles.css" media="screen" rel="stylesheet" type="text/css">
    </head>

    <body>
        <header>
            <h1>Please Login</h1>
        </header>
        
        <main>
            <div>
                <?php 
                    //flash message
                    if(isset($_SESSION["error"])){
                        echo("<p class='flashMessage' style='color: red'>ERROR:: ".$_SESSION["error"]."</p>");
                        unset($_SESSION["error"]);
                    }
                ?>
            </div>

            <div class="form">
                <form method="post">
                    <p>E-mail: <br><input type="text" name="email" size="40"></p>
                    <p>Password: <br><input type="password" name="password" size="12"></p>
                    <p><input type="submit" value="Log in"></p>
                </form>
            </div>
            <div>
                <h4><a class="button" href="./index.php">Back</a></h4>
            </div>
        </main>
        
        <footer>
            <div>
                <p>Dynamic web page developed by: Michael Rodriguez Gamboa. <br>
                All mistakes and rights reserved. Costa Rica. 2020. <p>
                </div>
        </footer>

    </body>
</html>