<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?> – Idea to Launch</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<!-- Navigation -->
<nav class="navbar">
    <div class="nav-container">
        <div class="logo">🚀 <?php echo SITE_NAME; ?></div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="#features">Features</a>
            <a href="#modules">Modules</a>
            <a href="#pricing">Pricing</a>
            <?php if(isLoggedIn()): ?>
                <a href="dashboard.php" class="nav-btn">Dashboard</a>
                <a href="logout.php" class="nav-btn logout-nav">Logout</a>
            <?php else: ?>
                <a href="login.php" class="nav-btn">Login</a>
                <a href="register.php" class="nav-btn register-nav">Sign Up</a>
            <?php endif; ?>
        </div>
        <div class="mobile-menu" onclick="toggleMenu()">☰</div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <div class="hero-badge">🔥 Turn Your Idea into Reality</div>
        <h1 class="hero-title">From <span class="gradient-text">Idea</span> to <span class="gradient-text">Launch</span> in 30 Days</h1>
        <p class="hero-subtitle">Learn the exact framework to validate, build, and launch your AI-powered MVP — no technical background required.</p>
        <div class="hero-buttons">
            <a href="register.php" class="btn-primary">🚀 Start Your Journey →</a>
            <a href="#modules" class="btn-secondary">📺 Watch Preview</a>
        </div>
        <div class="hero-stats">
            <div class="stat"><span>5000+</span> Students</div>
            <div class="stat"><span>97%</span> Success Rate</div>
            <div class="stat"><span>4.9</span> ⭐ Rating</div>
        </div>
    </div>
    <div class="hero-image">
        <div class="floating-card card-1">💡 Idea Validation</div>
        <div class="floating-card card-2">⚙️ MVP Build</div>
        <div class="floating-card card-3">📈 Launch & Scale</div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features">
    <div class="section-header">
        <span class="section-tag">What You'll Learn</span>
        <h2>Complete MVP Building Framework</h2>
        <p>Everything you need to go from zero to launch</p>
    </div>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">🎯</div>
            <h3>Idea Validation</h3>
            <p>Learn how to validate your idea before writing a single line of code</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🤖</div>
            <h3>AI Tools Mastery</h3>
            <p>Use ChatGPT, Midjourney, and AI tools to build faster</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3>No-Code MVP</h3>
            <p>Build your first MVP without learning programming</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📊</div>
            <h3>Launch Strategy</h3>
            <p>Go-to-market strategies that actually work</p>
        </div>
    </div>
</section>

<!-- Pricing Section -->
<section id="pricing" class="pricing">
    <div class="section-header">
        <span class="section-tag">Simple Pricing</span>
        <h2>One Payment. Lifetime Access</h2>
    </div>
    <div class="pricing-card">
        <div class="price-badge">🔥 Best Value</div>
        <div class="price-amount">₹199</div>
        <div class="price-period">One-time payment • Lifetime access</div>
        <ul class="price-features">
            <li>✓ 2+ Hours Video Content</li>
            <li>✓ Downloadable Notes & Templates</li>
            <li>✓ Lifetime Updates</li>
            <li>✓ Private Community Access</li>
            <li>✓ Certificate of Completion</li>
        </ul>
        <a href="register.php" class="btn-primary">Get Instant Access →</a>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <p>© 2026 <?php echo SITE_NAME; ?> – All Rights Reserved</p>
</footer>

<script>
function toggleMenu() {
    document.querySelector('.nav-links').classList.toggle('active');
}
</script>
</body>
</html>