<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data['seo']->meta_title) ? $data['seo']->meta_title : (isset($data['title']) ? $data['title'] . ' - ' . SITENAME : SITENAME); ?></title>
    <meta name="description" content="<?php echo isset($data['seo']->meta_description) ? $data['seo']->meta_description : (isset($data['description']) ? $data['description'] : ''); ?>">
    <meta name="keywords" content="<?php echo isset($data['seo']->meta_keywords) ? $data['seo']->meta_keywords : ''; ?>">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo isset($data['seo']->og_title) ? $data['seo']->og_title : (isset($data['title']) ? $data['title'] : SITENAME); ?>">
    <meta property="og:description" content="<?php echo isset($data['seo']->og_description) ? $data['seo']->og_description : (isset($data['description']) ? $data['description'] : ''); ?>">
    <meta property="og:type" content="website">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/style.css?v=1.5">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top shadow-none">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="<?php echo URLROOT; ?>">
                <i class="bi bi-calculator me-2 text-primary"></i> <span>CalculatorTube</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
                    </li>
                    
                    <!-- Finance Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="financeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Finance
                        </a>
                        <ul class="dropdown-menu p-3 border-0 shadow-lg rounded-4" aria-labelledby="financeDropdown" style="min-width: 240px;">
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/emi">EMI Calculator</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/home_loan">Home Loan Calculator</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/car_loan">Car Loan Calculator</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/personal_loan">Personal Loan Calculator</a></li>
                            <li><hr class="dropdown-divider my-2"></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/sip">SIP Calculator</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/fd">FD Calculator</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/compound_interest">Compound Interest</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/simple_interest">Simple Interest</a></li>
                            <li><hr class="dropdown-divider my-2"></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/income_tax">Income Tax Calculator</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/gst">GST Calculator</a></li>
                        </ul>
                    </li>

                    <!-- Health Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="healthDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Health
                        </a>
                        <ul class="dropdown-menu p-3 border-0 shadow-lg rounded-4" aria-labelledby="healthDropdown" style="min-width: 200px;">
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/bmi">BMI Calculator</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/calorie">Calorie Calculator</a></li>
                        </ul>
                    </li>

                    <!-- Math & Tools Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="mathDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Math &amp; Tools
                        </a>
                        <ul class="dropdown-menu p-3 border-0 shadow-lg rounded-4" aria-labelledby="mathDropdown" style="min-width: 200px;">
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/percentage">Percentage Calculator</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/age">Age Calculator</a></li>
                            <li><a class="dropdown-item rounded-3 py-2" href="<?php echo URLROOT; ?>/calculators/love">Love Calculator</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/blog">Blog</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <button class="btn btn-link nav-link p-2" id="theme-toggle" style="text-decoration: none;">
                        <i class="bi bi-moon-stars"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <main class="main-content">
