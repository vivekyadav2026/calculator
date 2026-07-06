    </main>
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold"><i class="bi bi-calculator"></i> CalculatorTube</h5>
                    <p class="text-muted">Your go-to destination for accurate and fast calculations. Built with modern web technologies.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo URLROOT; ?>" class="text-decoration-none text-muted">Home</a></li>
                        <li><a href="<?php echo URLROOT; ?>/blog" class="text-decoration-none text-muted">Blog</a></li>
                        <li><a href="<?php echo URLROOT; ?>/pages/about" class="text-decoration-none text-muted">About Us</a></li>
                        <li><a href="<?php echo URLROOT; ?>/pages/contact" class="text-decoration-none text-muted">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo URLROOT; ?>/pages/privacy" class="text-decoration-none text-muted">Privacy Policy</a></li>
                        <li><a href="<?php echo URLROOT; ?>/pages/terms" class="text-decoration-none text-muted">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-top border-secondary pt-3 text-center text-muted">
                &copy; <?php echo date('Y'); ?> <?php echo SITENAME; ?>. All rights reserved.
            </div>
        </div>
    </footer>
    
    <!-- Mobile Bottom Navigation Bar -->
    <div class="mobile-bottom-nav d-flex d-lg-none justify-content-around align-items-center fixed-bottom bg-white border-top py-2 shadow-sm">
        <a href="<?php echo URLROOT; ?>" class="nav-item-mobile text-center text-decoration-none">
            <i class="bi bi-house fs-5 d-block"></i>
            <span style="font-size: 10px;">Home</span>
        </a>
        <a href="<?php echo URLROOT; ?>#calculators" class="nav-item-mobile text-center text-decoration-none">
            <i class="bi bi-grid fs-5 d-block"></i>
            <span style="font-size: 10px;">Calculators</span>
        </a>
        <a href="<?php echo URLROOT; ?>/blog" class="nav-item-mobile text-center text-decoration-none">
            <i class="bi bi-journals fs-5 d-block"></i>
            <span style="font-size: 10px;">Blog</span>
        </a>
        <a href="#" id="theme-toggle-mobile" class="nav-item-mobile text-center text-decoration-none">
            <i class="bi bi-moon-stars fs-5 d-block"></i>
            <span style="font-size: 10px;">Theme</span>
        </a>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="<?php echo URLROOT; ?>/assets/js/main.js?v=1.2"></script>
    <script src="<?php echo URLROOT; ?>/assets/js/calculators.js"></script>
</body>
</html>
