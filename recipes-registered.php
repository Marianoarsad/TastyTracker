<?php

session_start();
include("./PHP-Files/connection.php");
include("./PHP-Files/functions.php");
$user_data = check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS-Files/recipes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  </head>
<style>
    * {
        padding: 0;
        margin: 0;
    }

    .navbar {
        width: 100%;
        height: 15vh;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: auto;
        color: #416D19;
        background: #416D19;
    }

    .logo-container {
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: row;
          gap: 40px;
    }

    .logo-container > a {
          font-size: 25px;
          text-decoration: none;
          color: #9BCF53;
    }

    button > a {
      font-size: 15px;
      text-decoration: none;
      color: #416D19;
      font-weight: bold;
    }

    .logo{
          border-radius: 50%;
          height: 80px;
          width: 80px;
          margin-left: 10px;
    }

    .logout-button {
        background-color: #9BCF53;
        border-radius: 50%;
        height: 60px;
        width: 60px;
        border: none;
        margin-right: 20px;
    }

    .create-button {
        background-color: #9BCF53;
        border-radius: 50px;
        height: 60px;
        width: 160px;
        border: none;
    }

    .buttons {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 20px;
      width: max-content;
      height: auto;
    }

    .inner-margin {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr 1fr;
      grid-auto-columns: 1fr;
      width: 100%;
      height: 100%;
    }

    .card-buttons {
        display: flex;
        gap: 10px;
      }

      .edit-button {
        align-self: flex-start;
        display: inline;
        border: none;
        border-radius: 20px;
        width: 70px;
        margin: 10px;
        background-color: #9BCF53;
      }

      .delete-button {
        align-self: flex-start;
        display: inline;
        border: none;
        border-radius: 20px;
        width: 100px;
        margin: 10px;
        background-color: #416D19;
      }

</style>
  <body>
    <div class ="homepage">
        <nav class="navbar">
            <div class="logo-container">
                <a href="index-registered.php"><img class="logo" src="./Images/logo.png" alt="logo"></a>
                <a href ="recipes-registered.php">Recipes</a>
            </div>
        <div class="buttons">
            <button class="create-button"><a href="./createrecipe.php">Create Recipe</a></button>
            <button class="logout-button"><a href="logout.php"><span class="material-symbols-outlined">logout</span></a></button>
        </div>
        </nav>
        <div class="background">
            <h2>Recipes</h2>
            <div class="body">
                <div class = "inner-margin">
                <?php

                $sql = "SELECT * FROM recipe";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    $user_id = $row['user_id'];
                    $recipe_id = $row['recipe_id'];
                    $recipeName = $row['recipeName'];
                    $desc = $row['desciption'];

                    echo "
                    <div class='card' style='width: 18rem;'>
                        <img src='uploads/$row[images]' class='card-img-top' alt='image'>
                        <div class='card-body'>
                            <h5 class='card-title'>$row[recipeName]</h5>
                            <p class='card-text'>$row[desciption]</p>
                         </div>
                         
                         <div class='-card-buttons'>
                          <button class='edit-button'><a href = 'update.php?updaterecipe=".$recipe_id."' class='text-light'>Edit</a></button>
                          <button class ='delete-button'><a href = 'delete.php?deleterecipe=".$recipe_id."' class='text-light'>Delete</a></button>
                        </div>
                    </div>
                    ";
                }
                ?>
                </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>