<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTML 5 Boilerplate</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
      * {
          padding:0;
          margin: 0;
      }

      body {
        background: url("./Images/food.png") transparent;
      }

      a {
          text-decoration: none;
          color: #9BCF53;
      }

      .homepage {
          display: grid;
          background-color: #416D19;
          width: auto;
          height: 100vh;
          grid-template-rows: 100px auto;
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

      .background {
          display: grid;
          background-color: #9BCF53;
          grid-template-columns: 40% 60%;
      }

      .ulam {
          display: flex;
          flex-direction: column;
          font-size: 100px;
          align-items: center;
          justify-content: center;
      }

      .pare {
          margin-bottom: 100px;
      }

      span {
          color: #416D19;
      }

      .share-button {
          height: 100px;
          width: 300px;
          color: white;
          background-color: #416D19;
          border: none;
          border-radius: 40px;
          font-size: 30px;
          font-weight: bold;
      }

      .share-button:hover {
          background-color: #FFF67E;
          transition: 0.3s;
      }

      .right-side {
          width: auto;
          height: 80vh;
          display: flex;
          justify-content: flex-end;
          align-items: flex-end;
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
            <div class="ulam">
                <p>Whats your</p>
                <p class="pare"><span>ulam</span> pare?</p>
                <button class="share-button"><a href="login.php">Share your recipe</a></button>
            </div>
            <div class="right-side">
              <img src="./Images/food.png" width="900px">
            </div>
        </div>
    </div>
  </body>
</html>
