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

    </head>

    <body>
        <header>
        
        </header>
        
        <main>
            <?php 
                //just testing
                var_dump($_SESSION);
                //flash message
                if(isset($_SESSION["error"])){
                    echo("<p style='color: red'>ERROR:: ".$_SESSION["error"]."</p>");
                    unset($_SESSION["error"]);
                }

            ?>
            <form method="post">
                <p>E-mail: <br><input type="text" name="email" size="40"></p>
                <p>Password: <br><input type="password" name="password" size="12"></p>
                <p><input type="submit" value="Log in"></p>
            </form>

            <div>
                <h4><a href="./index.php">Home</a></h4>
            </div>

        </main>
        
        <footer>
        
        </footer>

    </body>
</html>