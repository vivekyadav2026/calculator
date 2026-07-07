<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($data['seo']->meta_title) ? $data['seo']->meta_title : (isset($data['title']) ? $data['title'] . ' - ' . SITENAME : SITENAME); ?></title>
    <meta name="description" content="<?php echo isset($data['seo']->meta_description) ? $data['seo']->meta_description : (isset($data['description']) ? $data['description'] : ''); ?>">
    
    <!-- Bootstrap 5 CSS (kept for calculator core structure until fully removed, but NOT used in header/footer) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/style.css?v=3.0">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/assets/css/saas-layout.css?v=1.0">
</head>
<body>

<header class="saas-header">
    <div class="saas-header-container">
        <!-- Brand Logo -->
        <a class="saas-brand" href="<?php echo URLROOT; ?>">
            CalculatorTube
        </a>

        <!-- Desktop Navigation -->
        <nav class="saas-desktop-nav" aria-label="Main Navigation">
            <ul class="saas-nav-list">
                <!-- Financial Mega Menu -->
                <li class="saas-nav-item">
                    <a href="#" class="saas-nav-link" aria-haspopup="true" aria-expanded="false">
                        Financial <i class="bi bi-chevron-down saas-nav-icon"></i>
                    </a>
                    <div class="saas-mega-menu">
                        <div class="saas-mega-grid" style="grid-template-columns: 1fr 1fr; width: 600px;">
                            <a href="<?php echo URLROOT; ?>/calculators/emi" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-bank"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">EMI Calculator <span class="saas-badge-popular">Popular</span></span>
                                    <span class="saas-mega-desc">Plan your loan repayment schedule instantly.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/home_loan" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-house-door"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Home Loan</span>
                                    <span class="saas-mega-desc">Calculate housing loan EMIs and interest.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/car_loan" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-car-front"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Car Loan</span>
                                    <span class="saas-mega-desc">Estimate vehicle financing costs.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/personal_loan" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-person"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Personal Loan</span>
                                    <span class="saas-mega-desc">Check EMIs for unsecured loans.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/sip" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-graph-up-arrow"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">SIP Returns</span>
                                    <span class="saas-mega-desc">Project your mutual fund wealth growth.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/income_tax" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-receipt"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Income Tax</span>
                                    <span class="saas-mega-desc">Estimate your tax liability accurately.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/fd" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-safe"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Fixed Deposit</span>
                                    <span class="saas-mega-desc">Calculate maturity values for term deposits.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/compound_interest" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-graph-up"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Compound Interest</span>
                                    <span class="saas-mega-desc">See the power of compounding on savings.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/simple_interest" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-cash-stack"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Simple Interest</span>
                                    <span class="saas-mega-desc">Quickly find flat interest amounts.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/gst" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-percent"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">GST Calculator</span>
                                    <span class="saas-mega-desc">Add or remove GST from product prices.</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Health Mega Menu -->
                <li class="saas-nav-item">
                    <a href="#" class="saas-nav-link" aria-haspopup="true" aria-expanded="false">
                        Health <i class="bi bi-chevron-down saas-nav-icon"></i>
                    </a>
                    <div class="saas-mega-menu">
                        <div class="saas-mega-grid">
                            <a href="<?php echo URLROOT; ?>/calculators/bmi" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-person-bounding-box"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">BMI Calculator</span>
                                    <span class="saas-mega-desc">Check your Body Mass Index and ideal weight.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/calorie" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-fire"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Calorie Calculator</span>
                                    <span class="saas-mega-desc">Estimate daily caloric needs for your goals.</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Math Mega Menu -->
                <li class="saas-nav-item">
                    <a href="#" class="saas-nav-link" aria-haspopup="true" aria-expanded="false">
                        Math <i class="bi bi-chevron-down saas-nav-icon"></i>
                    </a>
                    <div class="saas-mega-menu">
                        <div class="saas-mega-grid">
                            <a href="<?php echo URLROOT; ?>/calculators/percentage" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-calculator"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Percentage Calculator</span>
                                    <span class="saas-mega-desc">Calculate proportions and growth rates quickly.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/age" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-calendar3"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Age Calculator</span>
                                    <span class="saas-mega-desc">Find exact age in years, months, and days.</span>
                                </div>
                            </a>
                            <a href="<?php echo URLROOT; ?>/calculators/love" class="saas-mega-item">
                                <div class="saas-mega-icon"><i class="bi bi-heart"></i></div>
                                <div class="saas-mega-content">
                                    <span class="saas-mega-title">Love Calculator <span class="saas-badge-popular" style="background:#FCE7F3; color:#BE185D;">Fun</span></span>
                                    <span class="saas-mega-desc">Check your compatibility score instantly.</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Actions -->
        <div class="saas-header-actions">
            <div class="saas-desktop-search position-relative d-none d-lg-block">
                <input type="text" class="saas-search-input form-control bg-light border-0" placeholder="Search..." style="border-radius:20px; padding: 6px 16px; width: 220px; font-size:0.875rem;">
                <div class="saas-search-results position-absolute bg-white shadow-lg rounded w-100 mt-2 d-none" style="z-index: 1050; max-height:300px; overflow-y:auto; border:1px solid var(--border-subtle);"></div>
            </div>
            
            <button class="saas-btn-icon" id="theme-toggle" aria-label="Toggle dark mode">
                <i class="bi bi-moon-stars-fill" id="theme-icon"></i>
            </button>
            <button class="saas-mobile-toggle" id="mobile-menu-trigger" aria-label="Open menu">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Slide Panel -->
<div class="saas-mobile-menu" id="mobile-menu">
    <div class="saas-mobile-header">
        <a class="saas-brand" href="<?php echo URLROOT; ?>">
            CalculatorTube
        </a>
        <button class="saas-mobile-close" id="mobile-menu-close" aria-label="Close menu">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    
    <div class="saas-mobile-body">
        <div class="saas-mobile-search position-relative">
            <i class="bi bi-search" style="position: absolute; left: 12px; top: 14px; color: var(--text-tertiary);"></i>
            <input type="text" class="saas-search-input form-control bg-light border-0" placeholder="Search calculators..." style="padding: 10px 16px 10px 40px; border-radius: 8px;">
            <div class="saas-search-results position-absolute bg-white shadow-lg rounded w-100 mt-1 d-none" style="z-index: 1050; max-height: 250px; overflow-y:auto; border:1px solid var(--border-subtle);"></div>
        </div>

        <nav>
            <div class="saas-mobile-group">
                <div class="saas-mobile-group-title">Financial</div>
                <a href="<?php echo URLROOT; ?>/calculators/emi" class="saas-mobile-link"><i class="bi bi-bank"></i> EMI Calculator</a>
                <a href="<?php echo URLROOT; ?>/calculators/home_loan" class="saas-mobile-link"><i class="bi bi-house-door"></i> Home Loan</a>
                <a href="<?php echo URLROOT; ?>/calculators/car_loan" class="saas-mobile-link"><i class="bi bi-car-front"></i> Car Loan</a>
                <a href="<?php echo URLROOT; ?>/calculators/personal_loan" class="saas-mobile-link"><i class="bi bi-person"></i> Personal Loan</a>
                <a href="<?php echo URLROOT; ?>/calculators/sip" class="saas-mobile-link"><i class="bi bi-graph-up-arrow"></i> SIP Calculator</a>
                <a href="<?php echo URLROOT; ?>/calculators/fd" class="saas-mobile-link"><i class="bi bi-safe"></i> Fixed Deposit</a>
                <a href="<?php echo URLROOT; ?>/calculators/compound_interest" class="saas-mobile-link"><i class="bi bi-graph-up"></i> Compound Interest</a>
                <a href="<?php echo URLROOT; ?>/calculators/simple_interest" class="saas-mobile-link"><i class="bi bi-cash-stack"></i> Simple Interest</a>
                <a href="<?php echo URLROOT; ?>/calculators/income_tax" class="saas-mobile-link"><i class="bi bi-receipt"></i> Income Tax</a>
                <a href="<?php echo URLROOT; ?>/calculators/gst" class="saas-mobile-link"><i class="bi bi-percent"></i> GST Calculator</a>
            </div>

            <div class="saas-mobile-group" style="margin-top: 32px;">
                <div class="saas-mobile-group-title">Health</div>
                <a href="<?php echo URLROOT; ?>/calculators/bmi" class="saas-mobile-link"><i class="bi bi-person-bounding-box"></i> BMI Calculator</a>
                <a href="<?php echo URLROOT; ?>/calculators/calorie" class="saas-mobile-link"><i class="bi bi-fire"></i> Calorie Calculator</a>
            </div>

            <div class="saas-mobile-group" style="margin-top: 32px;">
                <div class="saas-mobile-group-title">Math</div>
                <a href="<?php echo URLROOT; ?>/calculators/percentage" class="saas-mobile-link"><i class="bi bi-calculator"></i> Percentage Calculator</a>
                <a href="<?php echo URLROOT; ?>/calculators/age" class="saas-mobile-link"><i class="bi bi-calendar3"></i> Age Calculator</a>
                <a href="<?php echo URLROOT; ?>/calculators/love" class="saas-mobile-link"><i class="bi bi-heart"></i> Love Calculator</a>
            </div>
            
            <div class="saas-mobile-group" style="margin-top: 32px;">
                <div class="saas-mobile-group-title">Preferences</div>
                <button class="saas-mobile-link" style="width: 100%; border:none; background:none; cursor:pointer;" id="theme-toggle-mobile">
                    <i class="bi bi-moon-stars-fill" id="theme-icon-mobile"></i> Toggle Dark Mode
                </button>
            </div>
        </nav>
        
        <div style="margin-top: auto; display: flex; gap: 16px;">
            <button class="saas-btn-primary" style="display: block; flex: 1;">Get Started</button>
        </div>
    </div>
</div>
