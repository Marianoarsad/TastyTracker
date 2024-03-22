<?php
session_start();

include("./PHP-Files/connection.php");
include("./PHP-Files/functions.php");

if(isset($_POST['submit'])){

    $recipeName = $_POST['recipeName'];
    $description = $_POST['description'];
    $file = $_FILES['image'];
    $user_id = $_SESSION['user_id'];

    $fileName = $_FILES['image']['name'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileSize = $_FILES['image']['size'];
    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            $fileNameNew = uniqid('', true).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            
            $sql = "INSERT INTO recipe (recipeName, user_id, desciption, images)
                    VALUES ('$recipeName', '$user_id', '$description', '$fileNameNew');";
            
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo "<script> alert('New Recipe Added.'); </script>";
                header ("Location: createrecipe2.php");
                die;
            }
        } else {
            echo "<script> alert('Unknown file error.'); </script>";
        }
    } else {
        echo "<script> alert('Invalid file extension.'); </script>";
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
        height: 85vh;
    }

    .form-window {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 30%;
        height: 80%;
        border-radius: 30px;
        background: #FFF67E;
    }

    .inner-margin p {
        font-size: 26px;
        color: #416D19;
        font-weight: bold;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-bottom: 40px;
    }

    h2 {
      color: #416D19;
      margin-bottom: 20px;
    }

    .form-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group > label {
        font-size: 20px;
        align-self: center;
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
        width: 95px;
        border: none;
        outline: none;
        border-radius: 19px;
        font-weight: bold;
        margin-top: 18px;
        background-color: #9BCF53;
        color: #FFF67E;
    }

    .submit-button:hover {
        background-color: #BFEA7C;
        transition: 0.3s;
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
                <h2>Create Recipe</h2>
            </div>
            <div class="form-container">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for ="recipeName">Enter Recipe Name</label>
                        <input type="text" class="name-input form-input" id="ingredient" placeholder="Enter Recipe Name" name="recipeName">
                    </div>
                    <div class="form-group">
                        <label for ="recipeName">Description</label>
                        <input type="text" class="name-input form-input" id="description" placeholder="Describe your recipe" name="description">
                    </div>
                    <div class="form-group">
                        <label for ="recipeName">Image</label>
                        <input type="file" class="name-input form-input" id="images" accept=" .jpg, .jpeg, .png" placeholder="Insert recipe image" name="image">
                    </div>
                    <input type="submit" class="submit-button" name ="submit" value="next">
                </form>
            </div>
        </div>
    </div>
  </body>
</html>