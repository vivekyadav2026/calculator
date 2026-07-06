<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - <?php echo SITENAME; ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4f46e5, #ec4899);
        }
        body {
            font-family: 'Inter', sans-serif;
            background: var(--primary-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 1.5rem;
            color: #fff;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            border-radius: 0.75rem;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.5);
            color: #fff;
            box-shadow: none;
        }
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .btn-login {
            background: #fff;
            color: #4f46e5;
            font-weight: 600;
            border-radius: 0.75rem;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-2px);
        }
        .text-light-muted {
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card login-card shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <i class="bi bi-shield-lock-fill fs-1"></i>
                            <h3 class="fw-bold mt-2">Admin Login</h3>
                            <p class="small text-light-muted">Sign in to manage your calculator site</p>
                        </div>
                        <form action="<?php echo URLROOT; ?>/admin/login" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label small fw-medium">Username</label>
                                <input type="text" name="username" id="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter username" value="<?php echo htmlspecialchars($data['username']); ?>" required>
                                <div class="invalid-feedback text-warning"><?php echo $data['username_err']; ?></div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label small fw-medium">Password</label>
                                <input type="password" name="password" id="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter password" required>
                                <div class="invalid-feedback text-warning"><?php echo $data['password_err']; ?></div>
                            </div>
                            <button type="submit" class="btn btn-login w-100 py-2.5">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
