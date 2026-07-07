<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data['seo']->meta_title) ? $data['seo']->meta_title : (isset($data['title']) ? $data['title'] . ' - ' . SITENAME : SITENAME); ?></title>
    <meta name="description" content="<?php echo isset($data['seo']->meta_description) ? $data['seo']->meta_description : (isset($data['description']) ? $data['description'] : ''); ?>">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/style.css?v=3.0">
</head>
<body>

<header class="modern-header border-bottom bg-white shadow-sm sticky-top">
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="<?php echo URLROOT; ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="24" height="24" rx="6" fill="#4F46E5"/>
                    <path d="M7 16H17M7 12H17M7 8H11" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span class="fw-bold fs-5 text-dark" style="letter-spacing: -0.5px;">CalculatorTube</span>
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center gap-2 gap-lg-3">
                    
                    <!-- Financial Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Financial
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-3 mt-2">
                            <li><h6 class="dropdown-header fw-bold text-dark">Banking</h6></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/emi">EMI Calculator</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/home_loan">Home Loan</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/car_loan">Car Loan</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/personal_loan">Personal Loan</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/fd">FD Calculator</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header fw-bold text-dark">Investment & Tax</h6></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/sip">SIP Calculator</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/compound_interest">Compound Interest</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/simple_interest">Simple Interest</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/income_tax">Income Tax</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/gst">GST Calculator</a></li>
                        </ul>
                    </li>

                    <!-- Health Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Health
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-3 mt-2">
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/bmi">BMI Calculator</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/calorie">Calorie Calculator</a></li>
                        </ul>
                    </li>

                    <!-- Math Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Math
                        </a>
                        <ul class="dropdown-menu border-0 shadow-sm rounded-3 mt-2">
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/percentage">Percentage Calculator</a></li>
                            <li><a class="dropdown-item py-2" href="<?php echo URLROOT; ?>/calculators/age">Age Calculator</a></li>
                            <li><a class="dropdown-item py-2 d-flex align-items-center justify-content-between" href="<?php echo URLROOT; ?>/calculators/love">Love Calculator <span class="badge bg-danger rounded-pill ms-2" style="font-size:0.65rem;">Fun</span></a></li>
                        </ul>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <button class="btn btn-link nav-link p-0" id="theme-toggle" aria-label="Toggle dark mode">
                            <i class="bi bi-moon-stars-fill" id="theme-icon"></i>
                        </button>
                    </li>
                    <li class="nav-item ms-lg-2 mt-3 mt-lg-0">
                        <a class="btn btn-dark px-4 py-2 fw-medium rounded-3 shadow-sm" style="font-size: 0.9rem;" href="#">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
