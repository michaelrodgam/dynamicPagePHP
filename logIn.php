<!--Model -->
<?php 
require_once "pdo.php";
session_start();

if(isset($_POST["email"]) && isset($_POST["password"])){
    $_SESSION["success"] = true;
    $_SESSION["name"] = "Michael";

    header("location: ./logIn.php");
    return;
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