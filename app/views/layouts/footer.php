<!-- FAQ Section (Clean light background above footer) -->
<section class="site-faq-section py-5">
    <div class="container" style="max-width: 850px;">
        <h2 class="fw-bold mb-2 text-center site-faq-title">Frequently Asked Questions</h2>
        <p class="text-muted text-center mb-4 pb-2 site-faq-desc">Have questions about CalculatorTube? Find quick answers below.</p>
        
        <div class="accordion accordion-flush" id="siteFaqAccordion">
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq-heading-1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-1" aria-expanded="false" aria-controls="faq-collapse-1">
                        Are these calculators free to use?
                    </button>
                </h2>
                <div id="faq-collapse-1" class="accordion-collapse collapse" aria-labelledby="faq-heading-1" data-bs-parent="#siteFaqAccordion">
                    <div class="accordion-body">
                        Yes! All the calculators on CalculatorTube are 100% free. There are no hidden fees, paywalls, or subscription plans. You can use them as much as you like.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faq-heading-2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-2" aria-expanded="false" aria-controls="faq-collapse-2">
                        Is my data secure? Do you store search history or inputs?
                    </button>
                </h2>
                <div id="faq-collapse-2" class="accordion-collapse collapse" aria-labelledby="faq-heading-2" data-bs-parent="#siteFaqAccordion">
                    <div class="accordion-body">
                        Absolutely. We prioritize user privacy. All calculations are performed client-side in your web browser. We do not store, track, or share any of your inputs, search queries, or personal calculation history.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faq-heading-3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-3" aria-expanded="false" aria-controls="faq-collapse-3">
                        How accurate are the calculation results?
                    </button>
                </h2>
                <div id="faq-collapse-3" class="accordion-collapse collapse" aria-labelledby="faq-heading-3" data-bs-parent="#siteFaqAccordion">
                    <div class="accordion-body">
                        Our calculators use standard industry formulas (for EMI, SIP, Interest, and Tax). While they are highly precise and perfect for estimates and budgeting, we advise consulting with a qualified professional before making real-world financial or medical decisions.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faq-heading-4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-4" aria-expanded="false" aria-controls="faq-collapse-4">
                        Do I need to create an account to use the tools?
                    </button>
                </h2>
                <div id="faq-collapse-4" class="accordion-collapse collapse" aria-labelledby="faq-heading-4" data-bs-parent="#siteFaqAccordion">
                    <div class="accordion-body">
                        No registration is required. You can start calculating immediately without providing an email address, name, or phone number.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faq-heading-5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-collapse-5" aria-expanded="false" aria-controls="faq-collapse-5">
                        Can I export or print the calculations?
                    </button>
                </h2>
                <div id="faq-collapse-5" class="accordion-collapse collapse" aria-labelledby="faq-heading-5" data-bs-parent="#siteFaqAccordion">
                    <div class="accordion-body">
                        Yes, all of our primary calculators include options to export the results as a CSV file or print/save them directly as a PDF for offline reference.
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Footer Section -->
<footer class="saas-footer">
    <div class="saas-footer-container">
        <div class="saas-footer-grid">
            <!-- Col 1: Brand & Actions -->
            <div class="saas-footer-brand-col">
                <a class="saas-brand" href="<?php echo URLROOT; ?>">
                    CalculatorTube
                </a>
                <p class="saas-footer-desc">
                    Leading provider of free, beautifully designed financial and health calculators built for speed and precision. No tracking. No registration required.
                </p>
                <a class="saas-footer-about-link" href="<?php echo URLROOT; ?>/pages/about">Learn more About Us</a>
                <!-- <div class="saas-footer-actions">
                    <a href="<?php echo URLROOT; ?>/admin/login" class="saas-footer-btn-outline">Login</a>
                    <span class="saas-footer-actions-or">or</span>
                    <a href="<?php echo URLROOT; ?>/admin/login" class="saas-footer-btn-outline">Create an Account</a>
                </div> -->
            </div>

            <!-- Col 2: Financial & Investment -->
            <div class="saas-footer-col">
                <h5>Finance & Investment</h5>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/emi-calculator">EMI Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/sip-calculator">SIP Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/home-loan-calculator">Home Loan</a></li>
                    <li><a href="<?php echo URLROOT; ?>/personal-loan-calculator">Personal Loan</a></li>
                    <li><a href="<?php echo URLROOT; ?>/income-tax-calculator">Income Tax</a></li>
                    <li><a href="<?php echo URLROOT; ?>/fd-calculator">FD Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/gst-calculator">GST Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/compound-interest-calculator">Compound Interest</a></li>
                    <li><a href="<?php echo URLROOT; ?>/simple-interest-calculator">Simple Interest</a></li>
                </ul>
            </div>

            <!-- Col 3: Health & Math -->
            <div class="saas-footer-col">
                <h5>Health & Math</h5>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/bmi-calculator">BMI Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calorie-calculator">Calorie Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/percentage-calculator">Percentage</a></li>
                    <li><a href="<?php echo URLROOT; ?>/age-calculator">Age Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/date-calculator">Date Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/love-calculator">Love Calculator</a></li>
                </ul>
            </div>

            <!-- Col 4: Company -->
            <div class="saas-footer-col">
                <h5>Company</h5>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/pages/about">About Us</a></li>
                    <li><a href="<?php echo URLROOT; ?>/pages/privacy">Privacy Policy</a></li>
                    <li><a href="<?php echo URLROOT; ?>/pages/terms">Terms of Service</a></li>
                    <li><a href="<?php echo URLROOT; ?>/admin/login">Admin Login</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bottom Strip -->
    <div class="saas-footer-bottom-bar">
        <div class="saas-footer-bottom-container">
            <div>
                Copyright &copy; <?php echo date('Y'); ?> CalculatorTube.com. All rights reserved
            </div>
            <div>
                <a href="<?php echo URLROOT; ?>/pages/privacy">Privacy</a>
                <span class="divider-pipe">|</span>
                <a href="<?php echo URLROOT; ?>/pages/terms">Terms</a>
                <span class="divider-pipe">|</span>
                <a href="#">Cookies</a>
                <span class="divider-pipe">|</span>
                <a href="#">Sitemap</a>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS Bundle (Kept for inner calculators that still rely on it for things like tabs, but not used by header/footer navigation) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- html2pdf for exports -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<!-- Custom JS -->
<script src="<?php echo URLROOT; ?>/assets/js/calc_engine.js?v=3.0"></script>
<script src="<?php echo URLROOT; ?>/assets/js/main.js?v=3.0"></script>
<script src="<?php echo URLROOT; ?>/assets/js/calculators.js?v=3.0"></script>

</body>
</html>
