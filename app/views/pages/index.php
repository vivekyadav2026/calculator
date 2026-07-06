<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Hero Section -->
<div class="hero-section py-5 mb-5 bg-transparent">
    <div class="container py-4 text-center">
        <h1 class="display-5 fw-bold mb-2 text-body">Calculate Anything, Instantly.</h1>
        <p class="lead text-muted mb-4">Fast, accurate, and beautifully designed calculators for everyday needs.</p>
        
        <div class="row justify-content-center">
            <div class="col-md-6 position-relative">
                <div class="input-group input-group-lg search-container shadow-none">
                    <span class="input-group-text bg-transparent border-0 text-muted"><i class="bi bi-search"></i></span>
                    <input type="text" id="calc-search" class="form-control bg-transparent border-0 shadow-none text-body" placeholder="Search calculators (e.g., BMI, EMI)...">
                </div>
                <div id="search-results" class="position-absolute w-100 shadow rounded-3 mt-2 d-none text-start z-3 border" style="max-height: 250px; overflow-y: auto;">
                    <!-- Live AJAX search results injected here -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Featured Section -->
    <div class="row mb-5 text-center">
        <div class="col-12">
            <span class="badge bg-primary-subtle text-primary px-3 py-1.5 rounded-pill fw-bold mb-2">FEATURES</span>
            <h2 class="fw-bold h3 text-body">Popular & Featured Calculators</h2>
            <p class="text-muted">Our most frequently used tools to solve your math, finance, and health questions.</p>
        </div>
    </div>

    <!-- Category Sections -->
    <div class="row g-5">
        <!-- Finance & Investments -->
        <div class="col-12">
            <div class="d-flex align-items-center mb-4">
                <div class="icon-circle bg-primary-subtle text-primary me-3"><i class="bi bi-cash-coin fs-4"></i></div>
                <h3 class="fw-bold h4 mb-0 text-body">Finance & Investments</h3>
            </div>
            <div class="row g-3">
                <!-- EMI Calculator -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">EMI Calculator</h5>
                            <p class="card-text text-muted small mb-3">Calculate monthly instalments for any loan amount.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/emi" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- SIP Calculator -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">SIP Calculator</h5>
                            <p class="card-text text-muted small mb-3">Estimate future returns on mutual fund investments.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/sip" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- GST Calculator -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">GST Calculator</h5>
                            <p class="card-text text-muted small mb-3">Calculate Inclusive/Exclusive Goods and Services Tax.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/gst" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- Compound Interest -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">Compound Interest</h5>
                            <p class="card-text text-muted small mb-3">Calculate compound interest returns with intervals.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/compound_interest" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- Simple Interest -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">Simple Interest</h5>
                            <p class="card-text text-muted small mb-3">Quickly estimate standard interest on principals.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/simple_interest" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- Fixed Deposit (FD) -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">FD Calculator</h5>
                            <p class="card-text text-muted small mb-3">Calculate standard returns on Fixed Deposits.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/fd" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- Income Tax Calculator -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">Income Tax (India)</h5>
                            <p class="card-text text-muted small mb-3">Estimate your income tax liability under the New Regime.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/income_tax" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- Loan Variants -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">Home Loan Calculator</h5>
                            <p class="card-text text-muted small mb-3">Specific EMI breakdowns for property purchases.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/home_loan" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">Car Loan Calculator</h5>
                            <p class="card-text text-muted small mb-3">Plan your vehicle purchase EMI and budgets.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/car_loan" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Health & Everyday Math -->
        <div class="col-12 mt-5">
            <div class="d-flex align-items-center mb-4">
                <div class="icon-circle bg-primary-subtle text-primary me-3"><i class="bi bi-heart-pulse-fill fs-4"></i></div>
                <h3 class="fw-bold h4 mb-0 text-body">Health & Everyday Tools</h3>
            </div>
            <div class="row g-3">
                <!-- BMI Calculator -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">BMI Calculator</h5>
                            <p class="card-text text-muted small mb-3">Calculate Body Mass Index and health zones.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/bmi" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- Calorie Calculator -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">Calorie Calculator</h5>
                            <p class="card-text text-muted small mb-3">Determine daily maintenance calories needed.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/calorie" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- Age Calculator -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">Age Calculator</h5>
                            <p class="card-text text-muted small mb-3">Calculate your exact age in days, months, years.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/age" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- Percentage Calculator -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-body">Percentage Calculator</h5>
                            <p class="card-text text-muted small mb-3">Quick ratios, percentage changes, and distributions.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/percentage" class="btn btn-sm btn-outline-primary rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
                <!-- Love Calculator -->
                <div class="col-md-4 col-6">
                    <div class="card h-100 calc-card shadow-none">
                        <div class="card-body p-4">
                            <h5 class="fw-bold h6 mb-1 text-danger">Love Calculator <i class="bi bi-heart-fill"></i></h5>
                            <p class="card-text text-muted small mb-3">A fun tool to match compatibility by name.</p>
                            <a href="<?php echo URLROOT; ?>/calculators/love" class="btn btn-sm btn-outline-danger rounded-pill stretched-link">Calculate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <h3 class="fw-bold h4 mb-4 text-center text-body">Frequently Asked Questions</h3>
            <div class="accordion shadow-none border rounded-3 overflow-hidden" id="faqAccordion">
                <div class="accordion-item border-0">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-semibold text-body bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Are these calculators free to use?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted bg-transparent border-top">
                            Yes, all the calculator tools provided on our platform are 100% free, responsive, and available without registration.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-0 border-top">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-semibold text-body bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            How accurate are the results?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body text-muted bg-transparent border-top">
                            Our calculators utilize standardized mathematical formulas (like the Mifflin-St Jeor equation for calories, standard compound interest matrices, and the Indian Government slab rules for tax). While they are highly accurate, please consult with certified financial or health specialists for real-world decisions.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
