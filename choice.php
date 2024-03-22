<?php
session_start();

include("./PHP-Files/connection.php");
include("./PHP-Files/functions.php");

$user_data = check_login($conn);

if(isset($_POST['add'])) {
    header("Location: addrecipe.php");
    die;
} else if (isset($_POST['submit'])) {
    echo "<script> alert('Recipe Created!'); </script>";
    header("Location: index-registered.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

    .body {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #BFEA7C;
        width: auto;
        height: 85vh;
    }

    .form-window {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        width: 30%;
        height: 40%;
        border-radius: 30px;
        margin-top: 50px;
        background: #FFF67E;
    }

    .header-container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 70px;
        width: 100%;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        background: transparent;
    }

    .header-container > h2 {
        color: #416D19;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
        width: 80%;
    }


    .form-group {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .form-group > label {
        font-size: 20px;
        align-self: flex-start;
        color: #416D19;
    }

    .form-input {
        height: 60px;
        width: 100%;
        border: none;
        outline: none;
        border-radius: 19px;
        padding: 12px;
        color: #FFF67E;
        background-color: #416D19;
    }

    .form-input::placeholder {
        color: #FFF67E;
        text-align: center;
    }

    .submit-button {
        height: 40px;
        width: 60%;
        border: none;
        outline: none;
        border-radius: 19px;
        font-weight: bold;
        margin-top: 18px;
        background-color: #9BCF53;
        color: #416D19;
        grid-column-start: 4;
    }

    .submit-button:hover {
        background-color: #BFEA7C;
        transition: 0.3s;
    }


    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group > label {
        font-size: 18px;
        align-self: center;
        color: #416D19;
    }

    .form-input {
        height: 40px;
        width: 100%;
        border: none;
        outline: none;
        border-radius: 19px;
        padding: 12px;
        color: #FFF67E;
        background-color: #416D19;
    }

    .desc-input {
        height: 200px;
    }

    .form-input::placeholder {
        color: #FFF67E;
        text-align: center;
    }

    #images {
        height: 50px;
    }

</style>
  </head>
  <body>
    <nav class="navbar">
        <div class="logo-container">
            <a href="index-registered.php"><img class="logo" src="./Images/logo.png" alt="logo"></a>
            <a href ="recipes-registered.php">Recipes</a>
        </div>
        <div class="buttons">
          <button class="create-button"><a href="./login.php">Create Recipe</a></button>
          <button class="logout-button"><a href="logout.php"><span class="material-symbols-outlined">logout</span></a></button>
        </div>
    </nav>
    <div class="body">
        <div class="form-window">
                <div class="header-container">
                    <h2>Add another ingredient?<h2>
                </div>
                <form class ="form-container" method="post" enctype="multipart/form-data">
                    <input type="submit" class="submit-button" name ="add" value="Add Ingredient">
                    <input type="submit" class="submit-button" name ="submit" value="Submit Recipe">
                </form>
        </div><!--form-window-->
    </div> <!--body-->
  </body>
</html>