<?php require APPROOT . '/views/layouts/header.php'; ?>

<main class="container py-5 my-3">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>" class="text-decoration-none nav-hover">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Calculators</li>
        </ol>
    </nav>

    <div class="row mb-5 text-center text-md-start">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-3">All Calculators</h1>
            <p class="text-muted lead">Browse our complete collection of free online calculators for your everyday financial and health needs.</p>
        </div>
    </div>

    <div class="row g-4 mb-5">
        
        <!-- Column 1: Financial & Banking -->
        <div class="col-md-6 col-xl-3">
            <div class="category-card h-100">
                <div class="category-icon-wrapper">
                    <i class="bi bi-bank fs-4"></i>
                </div>
                <h3 class="category-title" id="financial">Financial & Banking</h3>
                <div class="d-flex flex-column gap-2">
                    <a href="<?php echo URLROOT; ?>/calculators/emi" class="category-link">EMI Calculator</a>
                    <a href="<?php echo URLROOT; ?>/calculators/home_loan" class="category-link">Home Loan</a>
                    <a href="<?php echo URLROOT; ?>/calculators/car_loan" class="category-link">Car Loan</a>
                    <a href="<?php echo URLROOT; ?>/calculators/personal_loan" class="category-link">Personal Loan</a>
                    <a href="<?php echo URLROOT; ?>/calculators/fd" class="category-link">FD Calculator</a>
                </div>
            </div>
        </div>
        
        <!-- Column 2: Investment & Tax -->
        <div class="col-md-6 col-xl-3">
            <div class="category-card h-100">
                <div class="category-icon-wrapper">
                    <i class="bi bi-graph-up-arrow fs-4"></i>
                </div>
                <h3 class="category-title">Investment & Tax</h3>
                <div class="d-flex flex-column gap-2">
                    <a href="<?php echo URLROOT; ?>/calculators/sip" class="category-link">SIP Calculator</a>
                    <a href="<?php echo URLROOT; ?>/calculators/compound_interest" class="category-link">Compound Interest</a>
                    <a href="<?php echo URLROOT; ?>/calculators/simple_interest" class="category-link">Simple Interest</a>
                    <a href="<?php echo URLROOT; ?>/calculators/income_tax" class="category-link">Income Tax</a>
                    <a href="<?php echo URLROOT; ?>/calculators/gst" class="category-link">GST Calculator</a>
                </div>
            </div>
        </div>
        
        <!-- Column 3: Health & Fitness -->
        <div class="col-md-6 col-xl-3">
            <div class="category-card h-100">
                <div class="category-icon-wrapper">
                    <i class="bi bi-activity fs-4"></i>
                </div>
                <h3 class="category-title" id="health">Health & Fitness</h3>
                <div class="d-flex flex-column gap-2">
                    <a href="<?php echo URLROOT; ?>/calculators/bmi" class="category-link">BMI Calculator</a>
                    <a href="<?php echo URLROOT; ?>/calculators/calorie" class="category-link">Calorie Calculator</a>
                </div>
            </div>
        </div>
        
        <!-- Column 4: Everyday Math & Other -->
        <div class="col-md-6 col-xl-3">
            <div class="category-card h-100">
                <div class="category-icon-wrapper">
                    <i class="bi bi-calculator fs-4"></i>
                </div>
                <h3 class="category-title" id="math">Math & Others</h3>
                <div class="d-flex flex-column gap-2">
                    <a href="<?php echo URLROOT; ?>/calculators/percentage" class="category-link">Percentage</a>
                    <a href="<?php echo URLROOT; ?>/calculators/age" class="category-link">Age Calculator</a>
                    <a href="<?php echo URLROOT; ?>/calculators/love" class="category-link">Love Calculator</a>
                </div>
            </div>
        </div>
        
    </div>
</main>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
