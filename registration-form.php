<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class=register_body>
    <header>
        <h2 class="logo"> </h2>
        <nav class = "navigation">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Contact</a>
            <a href='login-form.html' id="login_link">Log in</a>
        </nav>
    </header>

    <div class="register">


<?php
include("db.php");
if(isset($_POST["submit"])) {
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    if (empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password)) {
        echo "<script> alert('All fields are required!') </script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script> alert('The format of the Email is not valid!') </script>";
    } else {
        $verify_email = mysqli_query($connect, "SELECT email FROM users WHERE email='$email'");
        if(mysqli_num_rows($verify_email) !=0){
            echo "<script> alert('This Email is already used, please Try another One!') </script>";
        } else {
            $verify_username = mysqli_query($connect, "SELECT username FROM users WHERE username='$username'");
            if(mysqli_num_rows($verify_username) !=0){
                echo "<script> alert('This username is already used, please Try another One!') </script>";
            } else {
                if (strlen($password)<8) {
                    echo "<script> alert('The Password must be at least 8 characters long!') </script>";
                } else {
                    $containsNumber = preg_match('/[0-9]/', $password);
                    $containsUppercase = preg_match('/[A-Z]/', $password);
                    $containsLowercase = preg_match('/[a-z]/', $password);
                    $containsSpecialChar = preg_match('/[^a-zA-Z0-9]/', $password);

                    if (!$containsNumber){
                        echo "<script> alert('The password must contain at least one number!') </script>";
                    } elseif (!$containsUppercase){
                        echo "<script> alert('The password must contain at least one uppercase letter!') </script>";
                    } elseif (!$containsLowercase){
                        echo "<script> alert('The password must contain at least one lowercase letter!') </script>";
                    } elseif (!$containsSpecialChar){
                        echo "<script> alert('The password must contain at least one special character!') </script>";
                    } else {
                        mysqli_query($connect, "INSERT INTO users(fname, lname, email, username, password) VALUES('$first_name', '$last_name', '$email', '$username', '$passwordHash')");
                        header("Location: registered.php");
                        exit;
                    }
                }
            }
        }
    }
}
?>




        <h1>Sign Up</h1>
        <form method="POST">
            <label>First Name</label>
            <input type="text" name="fname" required>
            <label>Last Name</label>
            <input type="text" name="lname" required>
            <label>Email</label>
            <input type="text" name="email" required placeholder="example@test.com">
            <label>Username</label>
            <input type="text" name="username" required placeholder="username">
            <label>Password</label>
            <input type="password" name="password" required placeholder="********">
            <input type="submit" name="submit" value="Submit">
        </form>
        <br>
        <p> Already have an account? <a href="login-form.html">Login </a></p>
    </div>
</body>
</html>