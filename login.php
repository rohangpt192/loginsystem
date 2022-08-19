<?php
$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    // the variable comes from name tag from forms
    $username = $_POST["username"];
    $password = $_POST["password"];
    
   
    // $sql = "Select * from users where username='$username' and password='$password'";
    $sql = "Select * from users where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while($row = mysqli_fetch_assoc($result)){
            if(password_verify($password, $row['password'])){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header("location: welcome.php");
            }
            else {
                $showError = "Invalid Credential , It means Invalid username and passsword.";
            }
        }
    }
     
    else {
        $showError = "Invalid Credential , It means Invalid username and passsword.";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showError . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>

    <div class="container my-3">
        <h1 class="text-center text-decoration-underline">LogIn To this website</h1>
        <form action="/loginsystem/login.php" method="post" class=" my-4 flex-column d-flex align-items-center">
            <div class="mb-3 col-md-5">
                <label for="username" class="form-label">Username: </label>
                <input type="text" maxlength="15" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 col-md-5">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="23" class="form-control" id="password" name="password">
                <div id="emailHelp" class="form-text">Make sure input correct login and password.</div>
            </div>
            <button type="submit" class="btn btn-primary col-md-5">Login</button>
            <div id="emailHelp" class="form-text">if you don't have account ,Please sign up here <a href="/loginsystem/signup.php" target="_parent"> Click here</a></div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>