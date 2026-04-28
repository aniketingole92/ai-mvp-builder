<?php include 'config.php';
if(isLoggedIn()) header("Location: dashboard.php");

if(isset($_POST['login'])){
    $email = sanitize($_POST['email']);
    $pass = $_POST['password'];
    
    $result = $conn->query("SELECT id, password, payment_status FROM users WHERE email='$email'");
    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($pass, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            if($user['payment_status'] == 1){
                header("Location: dashboard.php");
            } else {
                header("Location: payment.php");
            }
        } else { $error = "Wrong password!"; }
    } else { $error = "User not found!"; }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login – <?php echo SITE_NAME; ?></title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="auth-container">
    <div class="auth-card">
        <a href="index.php" class="back-home">← Back to Home</a>
        <h2>Welcome Back</h2>
        <p>Login to access your course</p>
        <?php if(isset($error)) echo "<div class='alert error'>$error</div>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login →</button>
        </form>
        <p>New here? <a href="register.php">Create free account</a></p>
    </div>
</div>
</body>
</html>