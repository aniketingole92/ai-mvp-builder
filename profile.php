<?php include 'config.php';
if(!isLoggedIn()) header("Location: login.php");
$user_id = $_SESSION['user_id'];

if(isset($_POST['update'])){
    $name = sanitize($_POST['name']);
    $phone = sanitize($_POST['phone']);
    $conn->query("UPDATE users SET name='$name', phone='$phone' WHERE id=$user_id");
    $success = "Profile updated!";
}

$user = $conn->query("SELECT * FROM users WHERE id=$user_id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head><title>My Profile</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="auth-container">
    <div class="auth-card">
        <h2>My Profile</h2>
        <?php if(isset($success)) echo "<div class='alert success'>$success</div>"; ?>
        <form method="POST">
            <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
            <input type="email" value="<?php echo $user['email']; ?>" disabled>
            <input type="tel" name="phone" value="<?php echo $user['phone']; ?>">
            <button type="submit" name="update">Update Profile</button>
        </form>
        <a href="dashboard.php">← Back to Dashboard</a>
    </div>
</div>
</body>
</html>