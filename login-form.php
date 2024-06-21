<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login_body">

<header>
    <h2 class="logo"> </h2>
    <nav class = "navigation">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        <a href='login-form.php' id="login_link">Log in</a>
    </nav>
</header>

<div class="login">
<?php
    include("db.php");

    if(isset($_POST['submit'])){
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $password = mysqli_real_escape_string($connect, $_POST['password']);

        $result = mysqli_query($connect, "SELECT * FROM users WHERE email='$email'");
        $row = mysqli_fetch_assoc($result);

        if($row) {
            // Verify the hashed password
            if(password_verify($password, $row['password'])) {
                $_SESSION['valid'] = $row['email'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['id'] = $row['id'];

                header("Location: welcome.php");
                exit;
            } else {
                echo "<script> alert('Wrong credentials!')</script>";
            }
        } else {
            echo "<script> alert('Wrong credentials!')</script>";
        }
    }
?>


<h1>Sign In</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Email</label>
    <input type="text" name="email" required placeholder="Email" id="email">
    <label>Password</label>
    <input type="password" name="password" required placeholder="Password" id="password">
    <input type="submit" name="submit" value="Submit">
</form>
    <br>
    <p>Don't have an account? <a href="registration-form.php">Sign up here</a> </p>

 </div>
</body>
</html>