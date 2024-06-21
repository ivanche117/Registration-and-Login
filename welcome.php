<?php
    session_start();
    include("db.php");
    if(!isset($_SESSION['valid'])){
        header("Location: login-form.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="welcome">

<header>
    <div class="logout">
        <a href="login-form.php"><button>Log Out</button> </a>
    </div>
</header>
<div class="welcome_div">
    <h1>Embark on a journey <br></h1>
    <h2>beneath the waves</h2>
    <p>Explore the fascinating underwater world of fish!</p>
</div>


</body>
</html>