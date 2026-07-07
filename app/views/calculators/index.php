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
                <div class="category-icon-wrapper" style="color: #4F46E5;">
                    <i class="bi bi-bank fs-4"></i>
                </div>
                <h3 class="category-title" id="financial" style="color: #000000; font-weight: 700;">Financial & Banking</h3>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="<?php echo URLROOT; ?>/emi-calculator" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">EMI Calculator</a>
                    <a href="<?php echo URLROOT; ?>/home-loan" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">Home Loan</a>
                    <a href="<?php echo URLROOT; ?>/car-loan" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">Car Loan</a>
                    <a href="<?php echo URLROOT; ?>/personal-loan" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">Personal Loan</a>
                    <a href="<?php echo URLROOT; ?>/fd-calculator" class="btn btn-sm btn-outline-primary rounded-pill px-3 py-1">FD Calculator</a>
                </div>
            </div>
        </div>
        
        <!-- Column 2: Investment & Tax -->
        <div class="col-md-6 col-xl-3">
            <div class="category-card h-100">
                <div class="category-icon-wrapper" style="color: #10B981;">
                    <i class="bi bi-graph-up-arrow fs-4"></i>
                </div>
                <h3 class="category-title" style="color: #000000; font-weight: 700;">Investment & Tax</h3>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="<?php echo URLROOT; ?>/sip-calculator" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1">SIP Calculator</a>
                    <a href="<?php echo URLROOT; ?>/compound-interest" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1">Compound Interest</a>
                    <a href="<?php echo URLROOT; ?>/simple-interest" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1">Simple Interest</a>
                    <a href="<?php echo URLROOT; ?>/income-tax" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1">Income Tax</a>
                    <a href="<?php echo URLROOT; ?>/gst-calculator" class="btn btn-sm btn-outline-success rounded-pill px-3 py-1">GST Calculator</a>
                </div>
            </div>
        </div>
        
        <!-- Column 3: Health & Fitness -->
        <div class="col-md-6 col-xl-3">
            <div class="category-card h-100">
                <div class="category-icon-wrapper" style="color: #EF4444;">
                    <i class="bi bi-activity fs-4"></i>
                </div>
                <h3 class="category-title" id="health" style="color: #000000; font-weight: 700;">Health & Fitness</h3>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="<?php echo URLROOT; ?>/bmi-calculator" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1">BMI Calculator</a>
                    <a href="<?php echo URLROOT; ?>/calorie-calculator" class="btn btn-sm btn-outline-danger rounded-pill px-3 py-1">Calorie Calculator</a>
                </div>
            </div>
        </div>
        
        <!-- Column 4: Everyday Math & Other -->
        <div class="col-md-6 col-xl-3">
            <div class="category-card h-100">
                <div class="category-icon-wrapper" style="color: #F59E0B;">
                    <i class="bi bi-calculator fs-4"></i>
                </div>
                <h3 class="category-title" id="math" style="color: #000000; font-weight: 700;">Math & Others</h3>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="<?php echo URLROOT; ?>/percentage-calculator" class="btn btn-sm btn-outline-warning rounded-pill px-3 py-1">Percentage</a>
                    <a href="<?php echo URLROOT; ?>/age-calculator" class="btn btn-sm btn-outline-warning rounded-pill px-3 py-1">Age Calculator</a>
                    <a href="<?php echo URLROOT; ?>/date-calculator" class="btn btn-sm btn-outline-warning rounded-pill px-3 py-1">Date Calculator</a>
                </div>
            </div>
        </div>
        
    </div>
</main>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
