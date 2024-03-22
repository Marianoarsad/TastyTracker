<?php

$connection = mysqli_connect("localhost", "root", "", "infomanagement");

$userName = "";
$passWord = "";
$email = "";
$user_id = "";

$error_message = "";
$success_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM users WHERE user_id ='$user_id'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

   

    $userName = $row["userName"];
    $passWord = $row["passWord"];
    $email = $row["email"];

    } else {

        $userName = $row["userName"];
        $passWord = $row["passWord"];
        $email = $row["email"];

        do {
            if (empty($userName) || empty($passWord) || empty($email)) {
                $error_message = "Missing field";
                break;
            }
    
            $sql =  "UPDATE users".
                    "SET userName = '$userName', passWord = '$passWord', email = '$email'".
                    "WHERE id = $user_id";
            
            $result = $connection->query($sql);

            $success_message = "User information updated.";

        } while (false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <div class="logo"></div>
    </div>
    <div class="container my-5">
        <h2>User Info</h2>

        <?php
        if (!empty($error_message)) {
            echo "
            <div class='alert alert-warning alert-dismissable fade show' role='alert'>
                <strong>$error_message</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="userName" value="<?php echo $userName; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="passWord" value="<?php echo $passWord; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <?php
            if (!empty($success_message)) {
                echo "
                <div class='alert alert-success alert-dismissable fade show' role='alert'>
                <strong>$success_message</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Sumbit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="admin.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>