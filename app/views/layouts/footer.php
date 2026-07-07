<footer class="bg-white border-top py-5 mt-auto">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5 pe-lg-5">
                <a class="d-flex align-items-center gap-2 text-decoration-none mb-3" href="<?php echo URLROOT; ?>">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" rx="6" fill="#4F46E5"/>
                        <path d="M7 16H17M7 12H17M7 8H11" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span class="fw-bold fs-5 text-dark" style="letter-spacing: -0.5px;">CalculatorTube</span>
                </a>
                <p class="text-muted small" style="line-height: 1.6;">
                    CalculatorTube's sole focus is to provide fast, comprehensive, convenient, and beautifully designed free online calculators. We want to be your go-to platform to "do the math" quickly in finance, health, and everyday life.
                </p>
                <p class="text-muted small" style="line-height: 1.6;">
                    We have coded and developed each calculator individually and put them through strict testing. Our tools are completely free to use with no registration required.
                </p>
            </div>
            
            <div class="col-lg-2 col-6">
                <h6 class="text-dark fw-bold mb-4 fs-6">Financial</h6>
                <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                    <li><a href="<?php echo URLROOT; ?>/calculators/emi" class="text-muted text-decoration-none small hover-text-main">EMI Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/sip" class="text-muted text-decoration-none small hover-text-main">SIP Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/home_loan" class="text-muted text-decoration-none small hover-text-main">Home Loan</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/income_tax" class="text-muted text-decoration-none small hover-text-main">Income Tax</a></li>
                </ul>
            </div>
            
            <div class="col-lg-2 col-6">
                <h6 class="text-dark fw-bold mb-4 fs-6">Health & Math</h6>
                <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                    <li><a href="<?php echo URLROOT; ?>/calculators/bmi" class="text-muted text-decoration-none small hover-text-main">BMI Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/calorie" class="text-muted text-decoration-none small hover-text-main">Calories</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/percentage" class="text-muted text-decoration-none small hover-text-main">Percentage</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/age" class="text-muted text-decoration-none small hover-text-main">Age</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-12">
                <h6 class="text-dark fw-bold mb-4 fs-6">Legal</h6>
                <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                    <li><a href="#" class="text-muted text-decoration-none small hover-text-main">About Us</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small hover-text-main">Terms of Use</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small hover-text-main">Privacy Policy</a></li>
                    <li><a href="#" class="text-muted text-decoration-none small hover-text-main">Sitemap</a></li>
                </ul>
            </div>
        </div>
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-5 pt-4 border-top">
            <p class="text-muted small mb-3 mb-md-0">&copy; <?php echo date('Y'); ?> CalculatorTube. All rights reserved.</p>
            <div class="d-flex gap-4">
                <a href="#" class="text-muted text-decoration-none hover-text-main"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="text-muted text-decoration-none hover-text-main"><i class="bi bi-github"></i></a>
                <a href="#" class="text-muted text-decoration-none hover-text-main"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
<style>
.hover-text-main { transition: color 0.2s ease; }
.hover-text-main:hover { color: var(--text-main) !important; }
</style>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- html2pdf for exports -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- Custom JS -->
<script src="<?php echo URLROOT; ?>/assets/js/calc_engine.js?v=3.0"></script>
<script src="<?php echo URLROOT; ?>/assets/js/main.js?v=3.0"></script>
<script src="<?php echo URLROOT; ?>/assets/js/calculators.js?v=3.0"></script>

<script>
    // Simple Dark Mode Toggle Logic
    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('theme-toggle');
        if(toggle) {
            const icon = document.getElementById('theme-icon');
            const html = document.documentElement;
            
            toggle.addEventListener('click', () => {
                const isDark = html.getAttribute('data-bs-theme') === 'dark';
                if(isDark) {
                    html.setAttribute('data-bs-theme', 'light');
                    icon.classList.remove('bi-sun-fill');
                    icon.classList.add('bi-moon-stars-fill');
                } else {
                    html.setAttribute('data-bs-theme', 'dark');
                    icon.classList.remove('bi-moon-stars-fill');
                    icon.classList.add('bi-sun-fill');
                }
            });
        }
    });
</script>
</body>
</html>
