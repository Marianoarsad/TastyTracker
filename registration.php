<?php
session_start();
include("./PHP-Files/connection.php");
include("./PHP-Files/functions.php");

if(isset($_POST['submit'])) {

    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    $email = $_POST['email'];

    if(!empty($userName) && !empty($passWord) && !empty($email)) {

        $sql = "INSERT INTO users (userName, passWord, email)
                VALUES ('$userName', '$passWord', '$email')";

        $result = mysqli_query($conn, $sql);

        if ($result){
            echo "Registration Successful.";
            header ("Location: login.php");
        } else {
            die(mysqli_error($conn));
        }
    } else {
        echo "Missing field.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS-Files/Registration.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Registration</title>
    <style>
        nav {
          display: flex;
          gap: 30px;
          justify-content: space-between;
          align-items: center;
          font-size: 25px;
          background-color: #416D19;
          color: white;
          height: 15vh;
      }

      .logo-container {
          display: flex;
          align-items: center;
          justify-content: center;
          flex-direction: row;
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
          background-color: #BFEA7C;
          border: none;
          border-radius: 40px;
          font-size: 20px;
          font-weight: bold;
      }

      .login-button > a{
         color: #416D19;
      }

      .login-button > a:hover {
        color: #9BCF53;
        transition 0.3s;
      }

      .login-button:hover {
        background-color: #BFEA7C;
        transition 0.3s;
      }

      a {
        text-decoration: none;
        color: #9BCF53;
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
    <div class="body">
        <div class="form-window">
            <h1>Registration</h1>
            <div class="form-margin">
                <form method="post">
                    <div class="form-group">
                        <label for = "username">Username</label>
                        <input type="text" class="username-input form-input" id = "username" placeholder="Enter Username" name="userName" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for = "password">Password</label>
                        <input type="password" class="password-input form-input" id = "password" placeholder="Enter Password" name = "passWord" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for = "email">Email</label>
                        <input type="text" class="email-input form-input" id = "email" placeholder="Enter email" name="email" autocomplete="off">
                    </div>
                    <div class="submit-container">
                        <input type="submit" class="submit-button" value="submit" name ="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>