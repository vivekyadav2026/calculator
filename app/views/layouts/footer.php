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
                <h4>Lightning Fast. Always Free.</h4>
                <p style="margin-bottom: 12px;">We believe in providing professional-grade calculation tools without the clutter. No intrusive ads, no paywalls, and absolutely no data tracking.</p>
                <div style="display: flex; gap: 16px; margin-top: 16px;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="bi bi-lightning-charge-fill" style="color: #F59E0B;"></i>
                        <span style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">Instant Results</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <i class="bi bi-shield-check" style="color: #10B981;"></i>
                        <span style="font-size: 0.875rem; font-weight: 600; color: var(--text-primary);">Privacy First</span>
                    </div>
                </div>
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
                <h5>Investment & Tax</h5>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/calculators/fd">FD Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/gst">GST Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/compound_interest">Compound Interest</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/simple_interest">Simple Interest</a></li>
                </ul>
            </div>

            <div class="saas-footer-col">
                <h5>Health & Math</h5>
                <ul>
                    <li><a href="<?php echo URLROOT; ?>/calculators/bmi">BMI Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/calorie">Calorie Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/percentage">Percentage</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/age">Age Calculator</a></li>
                    <li><a href="<?php echo URLROOT; ?>/calculators/love">Love Calculator</a></li>
                </ul>
            </div>

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
