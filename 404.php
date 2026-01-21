<?php
// Set proper 404 header
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>404 - Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    body {
        min-height: 100vh;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .error-box {
        max-width: 520px;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        text-align: center;
    }

    .error-code {
        font-size: 5rem;
        font-weight: 800;
        color: #dc3545;
    }

    .error-text {
        font-size: 1.2rem;
        color: #6c757d;
    }
    </style>
</head>

<body>

    <div class="error-box">
        <div class="error-code">404</div>
        <h3 class="fw-bold mb-3">Page Not Found</h3>
        <p class="error-text mb-4">
            The page you are looking for does not exist or has been moved.
        </p>

        <div class="d-grid gap-2">
            <a href="dashboard.php" class="btn btn-primary">
                Go to Dashboard
            </a>
            <a href="javascript:history.back()" class="btn btn-outline-secondary">
                Go Back
            </a>
        </div>

        <hr class="my-4">

        <small class="text-muted">
            © <?= date("Y") ?> Computer Sikhe & Website Banaye
        </small>
    </div>

</body>

</html>