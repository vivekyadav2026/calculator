<footer class="saas-footer">
    <div class="saas-footer-container">
        
        <!-- Top Section (Brand, Trust, Newsletter) -->
        <div class="saas-footer-top">
            <div class="saas-footer-brand-col">
                <a class="saas-brand" href="<?php echo URLROOT; ?>">
                    CalculatorTube
                </a>
                <p class="saas-footer-desc">
                    Comprehensive, beautifully designed financial and health calculators built for speed and precision. No tracking. No registration required.
                </p>
                <div class="saas-footer-trust">
                    <div class="saas-trust-avatars">
                        <img src="https://i.pravatar.cc/100?img=1" alt="User">
                        <img src="https://i.pravatar.cc/100?img=2" alt="User">
                        <img src="https://i.pravatar.cc/100?img=3" alt="User">
                        <img src="https://i.pravatar.cc/100?img=4" alt="User">
                    </div>
                    <span>Trusted by 50,000+ users</span>
                </div>
            </div>
            
            <div class="saas-footer-newsletter">
                <h4>Stay Updated</h4>
                <p>Subscribe to our newsletter for the latest calculator releases and financial guides. No spam, ever.</p>
                <form class="saas-newsletter-form">
                    <input type="email" class="saas-newsletter-input" placeholder="you@company.com" required>
                    <button type="submit" class="saas-newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- Middle Section (Links Grid) -->
        <div class="saas-footer-links">
            <div class="saas-footer-col">
                <h5>Financial</h5>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/calculators/emi">EMI Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/sip">SIP Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/home_loan">Home Loan</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/personal_loan">Personal Loan</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/income_tax">Income Tax</a></li>
                </ul>
            </div>
            
            <div class="saas-footer-col">
                <h5>Health</h5>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/calculators/bmi">BMI Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/calorie">Calorie Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/macro">Macro Calculator</a></li>
                </ul>
            </div>

            <div class="saas-footer-col">
                <h5>Math</h5>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/calculators/percentage">Percentage</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/age">Age Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/scientific">Scientific</a></li>
                </ul>
            </div>

            <div class="saas-footer-col">
                <h5>Company</h5>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/pages/about">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="saas-footer-col">
                <h5>Resources</h5>
                <ul>
                    <li><a href="#">API Documentation</a></li>
                    <li><a href="#">Widget Embed</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">System Status</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="saas-footer-bottom">
            <div class="saas-footer-legal-links">
                <span>&copy; <?php echo date('Y'); ?> CalculatorTube.</span>
                <a href="<?php echo URLROOT; ?>/pages/privacy">Privacy</a>
                <a href="<?php echo URLROOT; ?>/pages/terms">Terms</a>
                <a href="#">Cookies</a>
                <a href="#">Sitemap</a>
            </div>
            <div style="font-weight: 500;">
                Version 3.0 &nbsp;&middot;&nbsp; Built with ❤️
            </div>
            <div class="saas-footer-socials">
                <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" aria-label="GitHub"><i class="bi bi-github"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                <a href="#" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
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
