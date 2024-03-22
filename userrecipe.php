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
<style>
    * {
        padding:0;
        margin: 0;
    }

    a {
        text-decoration: none;
        color: #9BCF53;
    }


    nav {
        display: flex;
        gap: 30px;
        justify-content: space-between;
        align-items: center;
        font-size: 25px;
        background-color: #416D19;
        color: white;
        height: 15vh;
        width: 100%;
    }

    .navbar ul {
        list-style: none;
        overflow: hidden;
    }

    .navbar li {
        float: left;
        display: block;
        margin: 20px;
    }

    .logo-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 40px;
    }
    .logo{
        border-radius: 50%;
        height: 80px;
        width: 80px;
        margin-left: 10px;
    }

    .login-button {
        height: 50px;
        width: 100px;
        margin-right: 30px;
        color: white;
        background-color: #9BCF53;
        border: none;
        border-radius: 40px;
        font-size: 20px;
        font-weight: bold;
    }

    .login-button > a{
        color: #416D19;
    }

    .login-button > a:hover{
        color: #BFEA7C;
    }

    .search {
        min-width: max-content;
        display: flex;
        align-items: center;
        padding: 14px;
        border-radius: 48px;
        background-color: #9BCF53;
        margin-right: 100px;
    }

    .search-input {
        width: 200px;
        height: 20px;
        font-size: 20px;
        color: #FFF67E;
        margin-left: 20px;
        outline: none;
        border: none;
        background: transparent;
    }

    .search-icon {
        color: #416D19;
    }

    .search-input::placeholder {
        color: #416D19;
    }

    .body {
        display: flex;
        align-items: center;
        justify-content: center;
        width: auto;
        height: 85vh;
        background-color: #9BCF53;
    }

    .recipe-window {
        display: grid;
        grid-template-columns: 40% 60%;
        grid-template-rows: 40% 60%;
        width: 90%;
        height: max-content;
        border-radius: 20px;
        background-color: #FFF67E;
    }

    .image-container {
      margin-top: 25px;
      margin-left: 25px;
      height: max-content;
      width: max-content;
      border: white solid 5px;
      border-radius: 20px;
    }

    h2 {
      font-size: 36px;
      margin-top: 60px;
      grid-row-start: 1;
      grid-column-start:2;
      grid-column-end:2;
    }

    .bs-table-container {
      margin-right: 50px;
      background: transparent;
      grid-row-start: 2;
      grid-column-start: 2;
    }

    .recipe-table {
      
    }


</style>
  </head>
  <body>
        <nav class="navbar">
          <div class="logo-container">
                <a href="index.php"><img class="logo" src="./Images/logo.png" alt="logo"></a>
                <a href ="recipes.php">Recipes</a>
            </div>
            <button class="login-button"><a href="./login.php">Login</a></button>
        </nav>
        <div class ="body">
            <div class="recipe-window">
                <div class ="image-container">
                  <img src="./Images/food.png" width="420" height="420">
                </div>
                <h2>Update Recipe </h2>
                <div class="bs-table-container">
                  <table class="recipe-table table table-striped-columns">
                    <thead>
                      <tr>
                        <th scope="col">Ingredient</th>
                        <th scope="col">Type</th>
                        <th scope="col">Ammount</th>
                        <th scope="col">Method</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Heat</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $recipe_id = $_GET['updaterecipe'];

                        $sql = "SELECT * FROM ingredients WHERE recipe_id = '$recipe_id'";

                        $result = $conn->query($sql);

                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr>
                                <td>$row[ingredient]</td>
                                <td>$row[type]</td>
                                <td>$row[ammount]</td>
                                <td>$row[method]</td>
                                <td>$row[duration]</td>
                                <td>$row[heat]</td>
                            </tr>
                            ";
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
  </body>
</html>