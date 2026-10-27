
<?php
session_start();

$isAuthenticated =
    isset($_SESSION['authenticated']) &&
    $_SESSION['authenticated'] === true &&
    isset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Session Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm border-0 p-4 text-center"
         style="width: 100%; max-width: 500px;">
        <div class="card-body">

            <?php if ($isAuthenticated): ?>

                <div class="text-success mb-3">
                    <h1>&#10003;</h1>
                </div>

                <h2 class="text-success mb-3">Session Created!</h2>

                <p class="fs-5">
                    Hello, <?= htmlspecialchars($_SESSION['user'], ENT_QUOTES, 'UTF-8') ?>!
                </p>

                <p class="text-muted">
                    Your session is active and authentication was successful.
                </p>


                <div class="d-flex justify-content-center gap-2 mt-4">
                    <a href="logout.php" class="btn btn-danger">
                        Logout
                    </a>
                </div>


            <?php else: ?>

                <div class="text-danger mb-3">
                    <h1>&#10007;</h1>
                </div>

                <h2 class="text-danger mb-3">Access Denied</h2>

                <p class="text-muted">
                    Error: No valid authenticated session was found.
                    Please log in first.
                </p>

                <a href="login.php" class="btn btn-primary">
                    Back to Login
                </a>

            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
