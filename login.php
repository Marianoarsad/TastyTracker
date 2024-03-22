<?php
session_start();

include("./PHP-Files/connection.php");
include("./PHP-Files/functions.php");

if(isset($_POST['submit'])) {

    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];

    if(!empty($userName) && !empty($passWord)) {

        $sql = "SELECT * FROM users WHERE userName = '$userName' limit 1";

        $result = mysqli_query($conn, $sql);

        if ($result){
            if($result && mysqli_num_rows($result) > 0){

            $user_data = mysqli_fetch_assoc($result);
            if($user_data['passWord'] === $passWord) {
              
              $_SESSION['user_id'] = $user_data['user_id'];
              header ("Location: index-registered.php");
              die;
            }

            }
        } else {
            die(mysqli_error($con));
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./CSS-Files/Login.css">
  </head>
  <style>
      * {
    margin: 0;
    padding: 0;
    }

    a {
        text-decoration: none;
        color: white;
    }

    h2 {
        font-size: 35px;
        color: #416D19;
    }

    * {
          padding:0;
          margin: 0;
      }

      a {
          text-decoration: none;
          color: #9BCF53;
      }

      .homepage {
          display: grid;
          background-color: #416D19;
          width: auto;
          height: 70vh;
      }

      nav {
          display: flex;
          gap: 30px;
          justify-content: space-between;
          align-items: center;
          font-size: 25px;
          background-color: #416D19;
          color: white;
          height: 100px;
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

      .logo-container > a {
          align-self: center;
          font-size: 25px
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

    .body {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #BFEA7C;
        width: auto;
        height: 85.6vh;
    }

    .form-window {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 30%;
        height: 90%;
        border-radius: 50px;
        background-color: #FFF67E;
    }

    .inner-margin {
        width: 80%;
        height: 60%;
        padding-top: 90px;
        background-color: #FFF67E;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .footer {
        height: 5.6vh;
        background-color: #416D19;
    }

    .username-input {
        width: 90%;
        height: 30px;
        padding-left: 14px;
        padding-right: 14px;
        margin-bottom: 16px;
        padding-top: 8px;
        padding-bottom: 8px;
        outline: none;
        border: none;
        border-radius: 30px;
        background: #9BCF53;
    }

    .password-input {
        width: 90%;
        height: 30px;
        padding-left: 14px;
        padding-right: 14px;
        padding-top: 8px;
        padding-bottom: 8px;
        outline: none;
        border: none;
        border-radius: 30px;
        background: #9BCF53;
    }

    .username-input::placeholder {
        color: #BFEA7C;
    }

    .password-input::placeholder {
        color: #BFEA7C;
    }

    p {
        font-size: 17px;
        margin-top: 10px;
        margin-left: 10px;
        align-self: flex-start;
    }

    a {
        font-size: 17px;
        margin-top: 10px;
        align-self: flex-end;
        color: #9BCF53;
    }

    .submit-button {
        height: 60px;
        width: 100px;
        color: white;
        background-color: #9BCF53;
        border: none;
        border-radius: 40px;
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
    }

    .submit-button:hover {
        background-color:#416D19;
        transition: 0.3s;
        font-weight: bold;
    }

  </style>
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
        <h2>Login</h2>
        <div class="inner-margin">
            <form method="post">
                <p>Username</p>
                <input class="username-input" type="text" placeholder="Enter Username" name = "userName" autocomplete="off">
                <p>Password</p>
                <input class="password-input" type="password" placeholder="Enter Password" name = "passWord" autocomplete="off">
                <a href="./registration.php">Click here to signup</a>
                <input type="submit" class="submit-button" value="Login" name ="submit">
              </form>
        </div>
    </div>   
  </div>
  </body>
</html>