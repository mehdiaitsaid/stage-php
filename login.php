
<?php
session_start();

// Redirect authenticated users to the session test page
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    header('Location: test_session.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm border-0 p-4" style="width: 100%; max-width: 420px;">
        <div class="card-body">
            <h2 class="text-center mb-4">Login</h2>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert">
<!--                    Invalid email or password.-->
                </div>
            <?php endif; ?>

            <form action="handler2.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control"
                           id="email" name="email" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control"
                           id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Sign in
                </button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
