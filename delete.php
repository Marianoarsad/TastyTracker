<?php
session_start();

include("./PHP-Files/connection.php");
include("./PHP-Files/functions.php");

$user_data = check_login($conn);

if(isset($_GET['deleterecipe'])){
    $recipe_id = $_GET['deleterecipe'];

    $sql = "DELETE FROM recipe WHERE recipe_id = '$recipe_id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
        echo"Recipe deleted!";
        header ("Location: recipes-registered.php");
    } else {
        die(mysqli_error($conn));
    }
}

?>