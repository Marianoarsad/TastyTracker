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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS-Files/admin.css">
    <title>Admin</title>
</head>
<body>
    <div class="header">
        <div class="logo"></div>
          <p>My recipe</p>
          <p>More recipe</p>
    </div>
    <div class="container my-5">
        <h2>List of Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Email</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sql = "SELECT * FROM users";
                $result = $connection->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[user_id]</td>
                    <td>$row[userName]</td>
                    <td>$row[passWord]</td>
                    <td>$row[email]</td>
                    <td>
                        <a class='btn btn-primary btn-sm' href='edit.php?'>Edit</a>
                        <a class='btn btn-danger btn-sm' href='delete.php?']>Delete</a>
                    </td>
                </tr>
                    ";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>