<!--This is data to start the server, is the Model!-->
<?php
    require_once "pdo.php";
    
    //start the session data for the server and send the cookie sessionId.
    session_start();
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
        <h1>Welcome to my dynamic web page!</h1>
        </header>

        <main>
            
            <?php 
            var_dump($_SESSION);

            //log in, with this ugly code mixed.
                if(! isset($_SESSION["success"])){ ?>
                <h4><a href="./logIn.php">Log in?</a></h4>
            <?php
            } else {
            //logged and log out.
            ?>
            <div>
                <p>Welcome <?php echo($_SESSION["name"])?>! What you want to do?</p>
                <h4><a href="./addAc.php">Add users?</a></h4>
                <h4><a href="./deleteAc.php">Delete Users?</a></h4>
                <h4><a href="./logOut.php">Log Out</a></h4>
            </div>
            <?php 
            }
            ?>

        </main>

        <footer>
        <p>Dynamic web page developed by: Michael Rodriguez Gamboa. <br>
        All mistakes and rights reserved. Costa Rica. 2020. <p>
        </footer>


    </body>
 
</html>
