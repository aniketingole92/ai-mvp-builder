<?php include 'config.php';
if(!isLoggedIn()) header("Location: login.php");
$user_id = $_SESSION['user_id'];

// Apply coupon if exists
$discount = 0;
if(isset($_GET['coupon'])){
    $code = $_GET['coupon'];
    $check = $conn->query("SELECT discount_percent FROM coupons WHERE code='$code' AND is_active=1 AND expiry_date >= CURDATE()");
    if($check->num_rows > 0){
        $discount = $check->fetch_assoc()['discount_percent'];
        $_SESSION['coupon_discount'] = $discount;
    }
}

$final_amount = COURSE_PRICE - (COURSE_PRICE * $discount / 100);
?>
<!DOCTYPE html>
<html>
<head><title>Payment – <?php echo SITE_NAME; ?></title>
<link rel="stylesheet" href="style.css">
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
<div class="payment-container">
    <h2>💰 Unlock Full Access</h2>
    <div class="price-box">
        <?php if($discount > 0): ?>
            <del>₹<?php echo COURSE_PRICE; ?></del>
            <span class="price">₹<?php echo $final_amount; ?></span>
            <span class="discount-badge">-<?php echo $discount; ?>% off</span>
        <?php else: ?>
            <span class="price">₹<?php echo COURSE_PRICE; ?></span>
        <?php endif; ?>
    </div>
    
    <?php if($discount == 0): ?>
    <form method="GET" class="coupon-form">
        <input type="text" name="coupon" placeholder="Have a coupon code?">
        <button type="submit">Apply</button>
    </form>
    <?php endif; ?>
    
    <button class="pay-btn" id="payBtn">💳 Pay Now & Get Access</button>
</div>

<script>
var options = {
    "key": "<?php echo RAZORPAY_KEY; ?>",
    "amount": <?php echo $final_amount * 100; ?>,
    "currency": "INR",
    "name": "<?php echo SITE_NAME; ?>",
    "description": "Complete Course Access",
    "handler": function(response){
        window.location.href = "verify-payment.php?payment_id="+response.razorpay_payment_id;
    }
};
var rzp = new Razorpay(options);
document.getElementById('payBtn').onclick = function(e){
    rzp.open();
}
</script>
</body>
</html>