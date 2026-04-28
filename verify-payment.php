<?php include 'config.php';
if(!isLoggedIn()) die("Access denied");

$user_id = $_SESSION['user_id'];
$payment_id = $_GET['payment_id'];
$discount = $_SESSION['coupon_discount'] ?? 0;
$amount = COURSE_PRICE - (COURSE_PRICE * $discount / 100);

$conn->query("INSERT INTO payments (user_id, razorpay_payment_id, amount, coupon_code) VALUES ($user_id, '$payment_id', $amount, '".($_SESSION['coupon_code'] ?? '')."')");
$conn->query("UPDATE users SET payment_status=1 WHERE id=$user_id");

unset($_SESSION['coupon_discount']);
header("Location: dashboard.php?payment=success");
?>