<?php include 'config.php';
if(!isLoggedIn()) header("Location: login.php");

$user_id = $_SESSION['user_id'];
$user = $conn->query("SELECT name, payment_status FROM users WHERE id=$user_id")->fetch_assoc();

if($user['payment_status'] != 1) header("Location: payment.php");

$videos = $conn->query("SELECT * FROM videos ORDER BY order_num ASC");
?>
<!DOCTYPE html>
<html>
<head><title>My Dashboard – <?php echo SITE_NAME; ?></title><link rel="stylesheet" href="style.css"></head>
<body>
<nav class="dashboard-nav">
    <div class="logo">🚀 <?php echo SITE_NAME; ?></div>
    <div class="nav-links">
        <a href="dashboard.php">Dashboard</a>
        <a href="profile.php">Profile</a>
        <a href="order-history.php">Orders</a>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</nav>

<div class="dashboard-container">
    <div class="welcome-header">
        <h1>Welcome, <?php echo htmlspecialchars($user['name']); ?>! 🎓</h1>
        <p>Your journey from Idea to Launch starts here</p>
    </div>

    <div class="progress-section">
        <h3>📊 Your Progress</h3>
        <div class="progress-bar"><div class="progress-fill" style="width: 0%"></div></div>
    </div>

    <div class="videos-grid">
        <?php while($video = $videos->fetch_assoc()) { ?>
        <div class="video-card">
            <div class="video-thumb">
                <video controls preload="metadata">
                    <source src="<?php echo $video['video_url']; ?>" type="video/mp4">
                </video>
            </div>
            <div class="video-body">
                <h3><?php echo $video['title']; ?></h3>
                <p><?php echo $video['description']; ?></p>
                <?php if($video['notes_url']) { ?>
                    <a href="<?php echo $video['notes_url']; ?>" class="download-btn" download>📄 Download Notes</a>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</body>
</html>