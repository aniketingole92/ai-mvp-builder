<?php include 'config.php';
if(isLoggedIn()) header("Location: dashboard.php");

if(isset($_POST['register'])){
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $check = $conn->query("SELECT id FROM users WHERE email='$email'");
    if($check->num_rows > 0){
        $error = "Email already registered!";
    } else {
        $conn->query("INSERT INTO users (name, email, phone, password) VALUES ('$name','$email','$phone','$pass')");
        $_SESSION['user_id'] = $conn->insert_id;
        header("Location: payment.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Sign Up – <?php echo SITE_NAME; ?></title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="auth-container">
    <div class="auth-card">
        <a href="index.php" class="back-home">← Back to Home</a>
        <h2>Create Your Account</h2>
        <p>Start your MVP journey today</p>
        <?php if(isset($error)) echo "<div class='alert error'>$error</div>"; ?>
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="tel" name="phone" placeholder="Phone Number">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Create Account →</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</div>
</body>
</html>