<?php require APPROOT . '/views/layouts/header.php'; ?>

<main class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <h1 class="display-5 fw-bold mb-2">Contact Us</h1>
            <p class="text-muted">Have a question, suggestion, or found a bug? We'd love to hear from you!</p>
        </div>
    </div>

    <div class="row g-4">
        <!-- Contact Form -->
        <div class="col-12 col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                <h2 class="fw-bold h4 mb-4">Send Us a Message</h2>

                <!-- Success Message (hidden by default) -->
                <div id="contact-success" class="alert alert-success d-none" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <strong>Message sent!</strong> Thank you for reaching out. We'll get back to you within 1–2 business days.
                </div>

                <form id="contact-form" novalidate>
                    <div class="row g-3">
                        <div class="col-12 col-sm-6">
                            <label for="contact-name" class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="contact-name" placeholder="Rahul Sharma" required minlength="2">
                            <div class="invalid-feedback">Please enter your name (at least 2 characters).</div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="contact-email" class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="contact-email" placeholder="rahul@example.com" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                        <div class="col-12">
                            <label for="contact-subject" class="form-label fw-semibold">Subject <span class="text-danger">*</span></label>
                            <select class="form-select" id="contact-subject" required>
                                <option value="" selected disabled>Select a subject...</option>
                                <option value="bug">🐛 Bug Report</option>
                                <option value="feature">💡 Feature Request</option>
                                <option value="general">💬 General Inquiry</option>
                                <option value="feedback">⭐ Feedback / Suggestion</option>
                                <option value="business">🤝 Business / Partnership</option>
                                <option value="other">📩 Other</option>
                            </select>
                            <div class="invalid-feedback">Please select a subject.</div>
                        </div>
                        <div class="col-12">
                            <label for="contact-message" class="form-label fw-semibold">Message <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="contact-message" rows="6" placeholder="Describe your query or suggestion in detail..." required minlength="20"></textarea>
                            <div class="d-flex justify-content-between align-items-center mt-1">
                                <div class="invalid-feedback d-block" id="message-error" style="visibility:hidden;">Message must be at least 20 characters.</div>
                                <small class="text-muted ms-auto"><span id="char-count">0</span> / 1000</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary fw-semibold px-5 py-2" id="contact-submit" style="background: #4285F4; border-color: #4285F4;">
                                <i class="bi bi-send-fill me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contact Info Sidebar -->
        <div class="col-12 col-lg-5">
            <!-- Get In Touch -->
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <h2 class="fw-bold h5 mb-4">Get In Touch</h2>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3" style="width:44px;height:44px;background:#e8f0fe;">
                        <i class="bi bi-envelope-fill" style="color:#4285F4; font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <div class="fw-semibold">Email</div>
                        <a href="mailto:support@calculatortube.com" class="text-muted text-decoration-none">support@calculatortube.com</a>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3" style="width:44px;height:44px;background:#e6f4ea;">
                        <i class="bi bi-clock-fill" style="color:#34a853; font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <div class="fw-semibold">Response Time</div>
                        <span class="text-muted">1–2 business days</span>
                    </div>
                </div>
                <div class="d-flex align-items-start gap-3">
                    <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-3" style="width:44px;height:44px;background:#fef3c7;">
                        <i class="bi bi-geo-alt-fill" style="color:#f59e0b; font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <div class="fw-semibold">Based In</div>
                        <span class="text-muted">India 🇮🇳</span>
                    </div>
                </div>
            </div>

            <!-- FAQ -->
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <h2 class="fw-bold h5 mb-4">Frequently Asked</h2>
                <div class="accordion accordion-flush" id="contact-faq">
                    <div class="accordion-item border-bottom">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed px-0 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Are your calculators free?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#contact-faq">
                            <div class="accordion-body px-0 text-muted">
                                Yes! All calculators on CalculatorTube are completely free to use with no registration required.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-bottom">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed px-0 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                How do I report an incorrect result?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#contact-faq">
                            <div class="accordion-body px-0 text-muted">
                                Use the form on this page, select "Bug Report" as the subject, and describe the issue with the inputs you used and the expected result.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed px-0 fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Can I request a new calculator?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#contact-faq">
                            <div class="accordion-body px-0 text-muted">
                                Absolutely! Select "Feature Request" and describe the calculator you'd like. We review all suggestions and prioritize popular ones.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contact-form');
    const messageInput = document.getElementById('contact-message');
    const charCount = document.getElementById('char-count');
    const messageError = document.getElementById('message-error');
    const successBox = document.getElementById('contact-success');
    const submitBtn = document.getElementById('contact-submit');

    // Character counter
    messageInput.addEventListener('input', function () {
        const len = this.value.length;
        charCount.textContent = len;
        if (len > 1000) {
            this.value = this.value.substring(0, 1000);
            charCount.textContent = 1000;
        }
    });

    // Form submit
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        e.stopPropagation();

        // Custom message validation
        if (messageInput.value.trim().length < 20) {
            messageError.style.visibility = 'visible';
            messageError.style.display = 'block';
            messageInput.classList.add('is-invalid');
        } else {
            messageError.style.visibility = 'hidden';
            messageInput.classList.remove('is-invalid');
        }

        form.classList.add('was-validated');

        if (form.checkValidity() && messageInput.value.trim().length >= 20) {
            // Simulate sending (no backend)
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Sending...';

            setTimeout(function () {
                form.reset();
                form.classList.remove('was-validated');
                charCount.textContent = '0';
                successBox.classList.remove('d-none');
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="bi bi-send-fill me-2"></i>Send Message';
                window.scrollTo({ top: successBox.offsetTop - 100, behavior: 'smooth' });
            }, 1200);
        }
    });

    // Reset invalid state on input
    messageInput.addEventListener('input', function () {
        if (this.value.trim().length >= 20) {
            messageError.style.visibility = 'hidden';
            this.classList.remove('is-invalid');
        }
    });
});
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
