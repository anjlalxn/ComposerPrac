<?php
require_once 'config.php';
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

// Fetch student records
$sql = 'SELECT studentID, studentName, yearLevel, section, program FROM student_records';
$stmt = $pdo->query($sql);
$records = $stmt->fetchAll();
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
                <h1 class="card-title mb-3">Welcome to Student Records!</h1>
                <p class="card-text text-muted">You are logged in as <strong><?= $username ?></strong>.</p>
            </div>
        </div>

        <!-- ============================================ -->
        <!-- STUDENT RECORDS TABLE -->
        <!-- ============================================ -->

        <div class="card mt-3" id="student-card">

            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Student Records</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">

                        <thead class="table-light">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Year Level</th>
                                <th>Section</th>
                                <th>Program</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php if (count($records) > 0): ?>
                            <?php foreach ($records as $row): ?>
                                <tr>
                                    <td><?= htmlspecialchars($row['studentID']) ?></td>
                                    <td><?= htmlspecialchars($row['studentName']) ?></td>
                                    <td><?= htmlspecialchars($row['yearLevel']) ?></td>
                                    <td><?= htmlspecialchars($row['section']) ?></td>
                                    <td><?= htmlspecialchars($row['program']) ?></td>
                                    <td>
                                        <!-- Action buttons go here (Edit / Delete) -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted">No student records found.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

</body>

</html>