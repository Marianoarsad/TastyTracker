<?php
session_start();

include("./PHP-Files/connection.php");
include("./PHP-Files/functions.php");


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

    .background {
        display: grid;
        background-color: #9BCF53;
        grid-template-columns: 40% 60%;
        height: 85vh;
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

    .share-button > a {
        color: #9BCF53;
        font-size: 30px;
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
  </style>
  </head>
  <body>
    <div class ="homepage">
        <nav class="navbar">
            <div class="logo-container">
                <a href="index.php"><img class="logo" src="./Images/logo.png" alt="logo"></a>
                <a href ="recipes-registered.php">Recipes</a>
            </div>
            <div class="buttons">
                <button class="create-button"><a href="./createrecipe.php">Create Recipe</a></button>
                <button class="logout-button"><a href="logout.php"><span class="material-symbols-outlined">logout</span></a></button>
            </div>
        </nav>
    <div class="background">
        <div class="ulam">
            <p>Whats your</p>
            <p class="pare"><span>ulam</span> pare?</p>
            <button class="share-button"><a href="createrecipe.php">Share your recipe</a></button>
        </div>
        <div class="right-side">
            <img src="./Images/food.png" width="900px">
        </div>
    </div>
    </div>
  </body>
</html>