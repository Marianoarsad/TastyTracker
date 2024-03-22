<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS-Files/recipes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <style>
      .card-buttons {
        display: flex;
        gap: 10px;
        margin: 5px;
      }

      .edit-button {
        align-self: flex-start;
        display: inline;
        border: none;
        border-radius: 20px;
        width: 30%;
        background-color: #9BCF53;
      }

      .delete-button {
        align-self: flex-start;
        display: inline;
        border: none;
        border-radius: 20px;
        width: 30%;
        background-color: #416D19;
      }

      .card-buttons > a {
        color: white;
      }
    </style>
  </head>
  <body>
    <div class ="homepage">
        <nav class="navbar">
          <div class="logo-container">
            <a href="index.php"><img class="logo" src="./Images/logo.png" alt="logo"></a>
            <a href ="recipes.php">Recipes</a>
          </div>
            <button class="login-button"><a href="./login.php">Login</a></button>
        </nav>
        <div class="background">
            <h2>Recipes</h2>
            <div class="body">
                <?php
                session_start();

                include("./PHP-Files/connection.php");
                include("./PHP-Files/functions.php");

                $sql = "SELECT * FROM recipe";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "
                    <div class='card' style='width: 18rem;'>
                        <img src='uploads/$row[images]' class='card-img-top' alt='image'>
                        <div class='card-body'>
                            <h5 class='card-title'>$row[recipeName]</h5>
                            <p class='card-text'>$row[desciption]</p>
                        </div>
                    </div>
                    ";
                }
                ?>
                
                </div>
            </div>
        </div>
    </div>
  </body>
</html>