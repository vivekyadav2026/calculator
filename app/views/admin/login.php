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
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FAFAFA;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #111827;
        }
        .login-card {
            background: #FFFFFF;
            border: 1px solid #E5E7EB;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        .form-control {
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            color: #111827;
        }
        .form-control:focus {
            border-color: #6366F1;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
            background: #FFFFFF;
        }
        .form-label {
            font-weight: 500;
            font-size: 0.875rem;
            color: #374151;
            margin-bottom: 0.25rem;
        }
        .btn-login {
            background-color: #111827;
            border-color: #111827;
            color: #FFFFFF;
            font-weight: 500;
            font-size: 0.875rem;
            border-radius: 8px;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            transition: all 0.2s;
        }
        .btn-login:hover {
            background-color: #374151;
            border-color: #374151;
            color: #FFFFFF;
        }
        .text-light-muted {
            color: #6B7280;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card login-card">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4 pb-2">
                            <div class="mb-3 d-inline-flex align-items-center justify-content-center bg-light rounded-circle" style="width: 56px; height: 56px; border: 1px solid #E5E7EB;">
                                <i class="bi bi-shield-lock-fill text-dark fs-3"></i>
                            </div>
                            <h4 class="fw-bold text-dark">Welcome back</h4>
                            <p class="small text-light-muted">Sign in to manage your calculator site</p>
                        </div>
                        <form action="<?php echo URLROOT; ?>/admin/login" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter username" value="<?php echo htmlspecialchars($data['username']); ?>" required>
                                <div class="invalid-feedback"><?php echo $data['username_err']; ?></div>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" placeholder="Enter password" required>
                                <div class="invalid-feedback"><?php echo $data['password_err']; ?></div>
                            </div>
                            <button type="submit" class="btn btn-login w-100 py-2">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
