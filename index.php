<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedin = true;
}
else{
  $loggedin = false;
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
    <div class="container my-3">
        <h2 class="text-center text-decoration-underline">Welcome to iSecure System</h2>
        <div class="my-4">
            <p>This is demo page of our log in system to see our demo</p>
            <?php 
            if(!$loggedin){
                echo '<p>To see our page: <a href="/loginsystem/welcome.php" target="_parent"> Click here</a></p>
                <p>Signup here:<a href="/loginsystem/signup.php" target="_parent"> Click here</a></p>';
                }
                if($loggedin){
                echo '<p>To see our page: <a href="/loginsystem/welcome.php" target="_parent"> Click here</a></p>';
                }
            ?>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>