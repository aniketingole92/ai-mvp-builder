<?php include 'config.php';
if(!isLoggedIn()) header("Location: login.php");
$user_id = $_SESSION['user_id'];
$orders = $conn->query("SELECT * FROM payments WHERE user_id=$user_id ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head><title>Order History</title><link rel="stylesheet" href="style.css"></head>
<body>
<div class="dashboard-container">
    <h2>📋 Your Order History</h2>
    <table style="width:100%; background:#1a1a2e; border-radius:10px; overflow:hidden">
        <tr style="background:#667eea"><th>Payment ID</th><th>Amount</th><th>Coupon</th><th>Date</th></tr>
        <?php while($row = $orders->fetch_assoc()){ ?>
        <tr style="border-bottom:1px solid #333"><td><?php echo $row['razorpay_payment_id']; ?></td><td>₹<?php echo $row['amount']; ?></td><td><?php echo $row['coupon_code'] ?? '-'; ?></td><td><?php echo $row['created_at']; ?></td></tr>
        <?php } ?>
    </table>
    <a href="dashboard.php">← Back</a>
</div>
</body>
</html>