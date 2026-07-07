<?php require APPROOT . '/views/layouts/header.php'; ?>

<!-- Modernized Hero & Search Section -->
<section class="hero-wrapper">
    <div class="container">
        <div class="row align-items-center gy-5">
            <!-- Left: Tabbed Functional Calculator -->
            <div class="col-lg-6 d-flex justify-content-center justify-content-lg-start flex-column">
                
                <!-- Tabs -->
                <div class="calc-tabs">
                    <button class="calc-tab-btn active" id="tab-scientific" onclick="switchCalcTab('scientific')">Scientific Calculator</button>
                    <button class="calc-tab-btn" id="tab-normal" onclick="switchCalcTab('normal')">Normal Calculator</button>
                </div>

                <!-- Scientific Calculator -->
                <div class="literal-calc-wrapper" id="calc-scientific">
                    <div class="literal-calc-header">
                        <h2 class="literal-calc-title">Scientific Calculator</h2>
                        <div class="literal-calc-controls">
                            <button class="literal-calc-help">Help</button>
                            <span class="literal-calc-icon">_</span>
                            <span class="literal-calc-icon">×</span>
                        </div>
                    </div>
                    <div class="literal-calc-body">
                        <div class="literal-calc-displays">
                            <div class="literal-display-top" id="sci-disp-hist"></div>
                            <div class="literal-display-main" id="sci-disp-main">0</div>
                        </div>
                        
                        <div class="literal-calc-grid">
                            <!-- Row 1 -->
                            <button class="lit-btn" onclick="calcInput('mod')">mod</button>
                            <div class="lit-radio-group lit-col-span-2">
                                <input type="radio" name="angle_unit" id="deg" value="deg" checked>
                                <label for="deg">Deg</label>
                                <input type="radio" name="angle_unit" id="rad" value="rad">
                                <label for="rad">Rad</label>
                            </div>
                            <div style="grid-column: span 3;"></div> <!-- Spacing -->
                            <button class="lit-btn" onclick="calcMem('MC')">MC</button>
                            <button class="lit-btn" onclick="calcMem('MR')">MR</button>
                            <button class="lit-btn" onclick="calcMem('MS')">MS</button>
                            <button class="lit-btn" onclick="calcMem('M+')">M+</button>
                            <button class="lit-btn" onclick="calcMem('M-')">M-</button>

                            <!-- Row 2 -->
                            <button class="lit-btn" onclick="calcFunc('sinh')">sinh</button>
                            <button class="lit-btn" onclick="calcFunc('cosh')">cosh</button>
                            <button class="lit-btn" onclick="calcFunc('tanh')">tanh</button>
                            <button class="lit-btn" onclick="calcFunc('exp')">Exp</button>
                            <button class="lit-btn" onclick="calcInput('(')">(</button>
                            <button class="lit-btn" onclick="calcInput(')')">)</button>
                            <button class="lit-btn lit-btn-red lit-col-span-2" onclick="calcOp('back')">&larr;</button>
                            <button class="lit-btn lit-btn-red" onclick="calcOp('C')">C</button>
                            <button class="lit-btn lit-btn-red" onclick="calcOp('+/-')">+/-</button>
                            <button class="lit-btn" onclick="calcFunc('sqrt')">&radic;</button>

                            <!-- Row 3 -->
                            <button class="lit-btn" onclick="calcFunc('asinh')">sinh<sup>-1</sup></button>
                            <button class="lit-btn" onclick="calcFunc('acosh')">cosh<sup>-1</sup></button>
                            <button class="lit-btn" onclick="calcFunc('atanh')">tanh<sup>-1</sup></button>
                            <button class="lit-btn" onclick="calcFunc('log2')">log<sub>2</sub>x</button>
                            <button class="lit-btn" onclick="calcFunc('ln')">ln</button>
                            <button class="lit-btn" onclick="calcFunc('log')">log</button>
                            <button class="lit-btn" onclick="calcInput('7')">7</button>
                            <button class="lit-btn" onclick="calcInput('8')">8</button>
                            <button class="lit-btn" onclick="calcInput('9')">9</button>
                            <button class="lit-btn" onclick="calcInput('/')">/</button>
                            <button class="lit-btn" onclick="calcInput('%')">%</button>

                            <!-- Row 4 -->
                            <button class="lit-btn" onclick="calcInput('pi')">&pi;</button>
                            <button class="lit-btn" onclick="calcInput('e')">e</button>
                            <button class="lit-btn" onclick="calcFunc('fact')">n!</button>
                            <button class="lit-btn" onclick="calcFunc('logy')">log<sub>y</sub>x</button>
                            <button class="lit-btn" onclick="calcFunc('exp_e')">e<sup>x</sup></button>
                            <button class="lit-btn" onclick="calcFunc('exp_10')">10<sup>x</sup></button>
                            <button class="lit-btn" onclick="calcInput('4')">4</button>
                            <button class="lit-btn" onclick="calcInput('5')">5</button>
                            <button class="lit-btn" onclick="calcInput('6')">6</button>
                            <button class="lit-btn" onclick="calcInput('*')">*</button>
                            <button class="lit-btn" onclick="calcFunc('inv')">1/x</button>

                            <!-- Row 5 -->
                            <button class="lit-btn" onclick="calcFunc('sin')">sin</button>
                            <button class="lit-btn" onclick="calcFunc('cos')">cos</button>
                            <button class="lit-btn" onclick="calcFunc('tan')">tan</button>
                            <button class="lit-btn" onclick="calcInput('^')">x<sup>y</sup></button>
                            <button class="lit-btn" onclick="calcFunc('cube')">x<sup>3</sup></button>
                            <button class="lit-btn" onclick="calcFunc('sqr')">x<sup>2</sup></button>
                            <button class="lit-btn" onclick="calcInput('1')">1</button>
                            <button class="lit-btn" onclick="calcInput('2')">2</button>
                            <button class="lit-btn" onclick="calcInput('3')">3</button>
                            <button class="lit-btn" onclick="calcInput('-')">-</button>
                            <button class="lit-btn lit-btn-green lit-row-span-2" onclick="calcEval()" style="grid-column: 11; grid-row: 5 / span 2;">=</button>

                            <!-- Row 6 -->
                            <button class="lit-btn" onclick="calcFunc('asin')">sin<sup>-1</sup></button>
                            <button class="lit-btn" onclick="calcFunc('acos')">cos<sup>-1</sup></button>
                            <button class="lit-btn" onclick="calcFunc('atan')">tan<sup>-1</sup></button>
                            <button class="lit-btn" onclick="calcInput('yroot')"><sup>y</sup>&radic;x</button>
                            <button class="lit-btn" onclick="calcFunc('cuberoot')"><sup>3</sup>&radic;x</button>
                            <button class="lit-btn" onclick="calcFunc('abs')">|x|</button>
                            <button class="lit-btn lit-col-span-2" onclick="calcInput('0')">0</button>
                            <button class="lit-btn" onclick="calcInput('.')">.</button>
                            <button class="lit-btn" onclick="calcInput('+')">+</button>
                        </div>
                    </div>
                </div>

                <!-- Normal Calculator (Hidden by default) -->
                <div class="literal-calc-wrapper" id="calc-normal" style="display: none; max-width: 350px;">
                    <div class="literal-calc-header">
                        <h2 class="literal-calc-title">Standard Calculator</h2>
                        <div class="literal-calc-controls">
                            <span class="literal-calc-icon">_</span>
                            <span class="literal-calc-icon">×</span>
                        </div>
                    </div>
                    <div class="literal-calc-body">
                        <div class="literal-calc-displays">
                            <div class="literal-display-top" id="norm-disp-hist"></div>
                            <div class="literal-display-main" id="norm-disp-main">0</div>
                        </div>
                        
                        <div class="literal-calc-grid" style="grid-template-columns: repeat(4, 1fr);">
                            <button class="lit-btn" onclick="calcMem('MC')">MC</button>
                            <button class="lit-btn" onclick="calcMem('MR')">MR</button>
                            <button class="lit-btn" onclick="calcMem('MS')">MS</button>
                            <button class="lit-btn" onclick="calcMem('M+')">M+</button>
                            
                            <button class="lit-btn lit-btn-red" onclick="calcOp('back')">&larr;</button>
                            <button class="lit-btn lit-btn-red" onclick="calcOp('CE')">CE</button>
                            <button class="lit-btn lit-btn-red" onclick="calcOp('C')">C</button>
                            <button class="lit-btn lit-btn-red" onclick="calcOp('+/-')">+/-</button>
                            
                            <button class="lit-btn" onclick="calcInput('7')">7</button>
                            <button class="lit-btn" onclick="calcInput('8')">8</button>
                            <button class="lit-btn" onclick="calcInput('9')">9</button>
                            <button class="lit-btn" onclick="calcInput('/')">/</button>
                            
                            <button class="lit-btn" onclick="calcInput('4')">4</button>
                            <button class="lit-btn" onclick="calcInput('5')">5</button>
                            <button class="lit-btn" onclick="calcInput('6')">6</button>
                            <button class="lit-btn" onclick="calcInput('*')">*</button>
                            
                            <button class="lit-btn" onclick="calcInput('1')">1</button>
                            <button class="lit-btn" onclick="calcInput('2')">2</button>
                            <button class="lit-btn" onclick="calcInput('3')">3</button>
                            <button class="lit-btn" onclick="calcInput('-')">-</button>
                            
                            <button class="lit-btn lit-col-span-2" onclick="calcInput('0')">0</button>
                            <button class="lit-btn" onclick="calcInput('.')">.</button>
                            <button class="lit-btn" onclick="calcInput('+')">+</button>
                            
                            <button class="lit-btn lit-btn-green lit-col-span-2" onclick="calcEval()" style="grid-column: span 4;">=</button>
                        </div>
                    </div>
                </div>

            </div>
            
            <!-- Right: Search & Intro -->
            <div class="col-lg-6 ps-lg-5 text-center text-lg-start">
                <h1 class="hero-title display-4 mb-4">Calculate Anything.</h1>
                <p class="hero-subtitle mb-5">Fast, accurate, and beautifully designed calculators for your everyday financial and health needs.</p>
                
                <form action="<?php echo URLROOT; ?>/search" method="GET" class="premium-search d-flex mx-auto mx-lg-0" style="max-width: 450px;">
                    <div class="d-flex w-100 align-items-center px-2">
                        <i class="bi bi-search text-muted ms-2 me-3 fs-5"></i>
                        <input type="text" name="q" class="form-control border-0 shadow-none p-0 bg-transparent" placeholder="Search calculators (e.g., SIP, BMI)..." style="height: 40px;">
                        <button type="submit" class="btn btn-primary ms-2 px-4">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Main Categories Container -->
<section class="container py-5 mt-4 mb-5">
    <div class="row g-4">
        
        <!-- Column 1: Financial & Banking -->
        <div class="col-md-6 col-xl-3">
            <div class="category-card">
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
            <div class="category-card">
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
            <div class="category-card">
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
            <div class="category-card">
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

    <!-- View All Button -->
    <div class="text-center mt-5 pt-3">
        <a href="<?php echo URLROOT; ?>/calculators" class="btn btn-outline-secondary px-5 py-2 fw-medium rounded-pill" style="border-color: var(--border-color); color: var(--text-muted);">View All Calculators <i class="bi bi-arrow-right ms-2"></i></a>
    </div>
</section>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
