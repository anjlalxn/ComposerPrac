<?php
session_start();

// Logout handler
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// Block anyone who isn't logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = htmlspecialchars($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Login Demo</span>
            <form method="post" class="d-flex">
                <button type="submit" name="logout" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card shadow-sm text-center">
            <div class="card-body p-5">
                <h1 class="card-title mb-3">Welcome!</h1>
                <p class="card-text text-muted">You are logged in as <strong><?= $username ?></strong>.</p>
            </div>
        </div>
    </div>

</body>
</html>