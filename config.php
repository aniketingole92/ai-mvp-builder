<?php
// Database Configuration
$host = "localhost";
$dbname = "ai_mvp_builder";
$username = "root";
$password = ""; 

$host = "sql123.infinityfree.com";  // Copy from control panel
$dbname = "if0_123456_ai_mvp_builder";  // Your database name
$username = "if0_123456";  // Your database username
$password = "YourPassword123";  // Your database password

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Razorpay Keys (REPLACE WITH YOUR LIVE KEYS)
define('RAZORPAY_KEY', 'rzp_test_SiraW63fOELFH0');
define('RAZORPAY_SECRET', 'gFNjlLPrq2Oh98wwO4Ecz97b');

// Site Configuration
define('SITE_NAME', 'AI MVP Builder');
define('SITE_URL', 'http://localhost/ai-mvp-builder/');
define('COURSE_PRICE', 199);

session_start();

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to check if user has paid
function hasPaid($conn, $user_id) {
    $result = $conn->query("SELECT payment_status FROM users WHERE id=$user_id");
    if($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['payment_status'] == 1;
    }
    return false;
}

// Function to sanitize input
function sanitize($data) {
    global $conn;
    return htmlspecialchars(strip_tags(trim($data)));
}
?>