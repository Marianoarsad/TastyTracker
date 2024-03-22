<?php
session_start();

include("./PHP-Files/connection.php");
include("./PHP-Files/functions.php");

$user_data = check_login($conn);

if(isset($_POST['submit'])){

    $recipeName = $_POST['recipeName'];
    $description = $_POST['description'];
    $ingredient = $_POST['ingredient'];
    $type = $_POST['type'];
    $ammount = $_POST['ammount'];
    $method = $_POST['method'];
    $duration = $_POST['duration'];
    $heat = $_POST['heat'];
    $user_id = $user_data;
            
    /*Insert to INGREDIENTS TABLE*/
    $sql2 = "INSERT INTO ingredients (ingredient, type, ammount, method, duration, heat, user_id, recipeName)
            VALUES ('$ingredient', '$type', '$ammount', '$method', '$duration', '$heat', '$user_id', '$recipeName')";
            
    $sqlResult = mysqli_query($conn, $sql);
    $sqlResult2 = mysqli_query($conn, $sql2);

    if ($sqlResult && $sqlResult2) {
        echo "<script> alert('New Recipe Added.'); </script>";
        header ("Location: choice.php");
        die;
    }   else {
            echo "<script> alert('Unknown file error.'); </script>";
        }
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
        height: 185vh;
    }

    .form-window {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        flex-direction: column;
        width: 40%;
        height: 90%;
        border-radius: 30px;
        background: #FFF67E;
    }

    .header-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 50px;
        height: 10%;
        width: 100%;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        background: #9BCF53;
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
        margin-bottom: 40px;
        width: 80%;
    }

    .form-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
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

    .form-group1 > label {
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
                    <h2>Adding Ingredient</h2>
                </div>
                <form class ="form-container" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for ="recipeName">Enter Recipe Name</label>
                        <input type="text" class="name-input form-input" id="ingredient" placeholder="Enter Recipe Name" name="recipeName">
                    </div>
                    <div class="form-group">
                        <label for ="recipeName">Description</label>
                        <input type="text" class="desc-input form-input" id="description" placeholder="Describe your recipe" name="description">
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ingredient</label>
                        <input type="text" class="ingredients-input form-input" id="ingredient" placeholder="Enter Ingredient" name="ingredient">
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ingredient Type</label>
                        <div>
                        <label for="primary" class="radio-inline"><input type="radio" class="type-input form-input" id="primary" name="type" value="Primary">Primary</label>
                        <label for="secondary" class="radio-inline"><input type="radio" class="type-input form-input" id="secondary" name="type" value ="Secondary">Secondary</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ammount</label>
                        <input type="text" class="ammount-input form-input" id="ammount" placeholder="Enter Ammount" name="ammount">
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Method</label>
                        <input type="text" class="method-input form-input" id="method" placeholder="Enter Method" name="method">
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Duration</label>
                        <input type="text" class="duration-input form-input" id="duration" placeholder="Enter Duration" name="duration">
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Heat</label>
                        <div>
                            <label for="low" class="radio-inline"><input type="radio" class="type-input form-input" id="low" name="heat" value="low">low</label>
                            <label for="medium" class="radio-inline"><input type="radio" class="type-input form-input" id="medium" name="heat" value="medium">medium</label>
                            <label for="high" class="radio-inline"><input type="radio" class="type-input form-input" id="high" name="heat" value="high">high</label>
                        </div>
                    </div>
                    <input type="submit" class="submit-button" name ="submit" value="proceed">
                </form>
        </div><!--form-window-->
    </div> <!--body-->
  </body>
</html>