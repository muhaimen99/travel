<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Itinerary Planner</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <header class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Welcome to Travel Itinerary Planner</h1><br>
                <p>Plan and book your entire trip, including flights, hotels, and activities.</p>
                
            </div>
            <div class="col-md-6 text-center">
                <img src="https://res.cloudinary.com/dqcvlj2il/image/upload/v1717967918/travel-hd-b6v7r5s344eq1oi2_zxktbk.webp" alt="Travel Image" class="img-fluid">
            </div>
        </div>
        <div class="buttons mt-3">
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php" class="btn">Go to Dashboard</a>
            <?php else: ?>
                <a href="login.php" class="btn">Login</a>
                <a href="register.php" class="btn">Register</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Beautiful Quotes -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Life Lesson</h2>
                <H3>"The world is a book, and those who do not travel read only one page."</H3>
           
            </div>
        </div>
    </div>

    <!-- Bootstrap Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">© 2024 Travel Itinerary Planner</span>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
