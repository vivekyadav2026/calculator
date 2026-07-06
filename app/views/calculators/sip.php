<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators" class="text-decoration-none">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">SIP Calculator</li>
        </ol>
    </nav>

    <!-- Header Actions Section -->
    <div class="d-flex justify-content-between align-items-start mb-5 flex-wrap gap-3">
        <div>
            <h1 class="fw-bold text-body">SIP Calculator</h1>
            <p class="lead text-muted mb-0">Estimate future returns of your Systematic Investment Plan (SIP) investments.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary rounded-circle p-2" style="width: 42px; height: 42px;" id="btn-fav" title="Favorite"><i class="bi bi-heart"></i></button>
            <button class="btn btn-outline-secondary rounded-circle p-2" style="width: 42px; height: 42px;" id="btn-share" title="Share"><i class="bi bi-share"></i></button>
        </div>
    </div>

    <!-- Main Layout Grid -->
    <div class="row g-4 mb-5">
        <!-- Input panel (Left) -->
        <div class="col-lg-5">
            <div class="card calc-card border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-4 border-bottom pb-3">
                        <div class="icon-circle">
                            <i class="bi bi-graph-up-arrow fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0 text-body">Investment Parameters</h5>
                            <span class="text-muted extra-small">Adjust sliders or click +/- buttons</span>
                        </div>
                    </div>

                    <form id="sip-form-redesign">
                        <!-- Monthly Investment -->
                        <div class="premium-slider-container">
                            <div class="slider-header">
                                <span class="slider-label">Monthly Investment</span>
                                <span class="slider-value" id="val-sip-amt">₹ 5,000</span>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <button type="button" class="slider-btn-minus" id="btn-amt-minus">-</button>
                                <input type="range" class="premium-slider-input flex-grow-1" id="slide-sip-amt" min="500" max="100000" step="500" value="5000" data-value-id="val-sip-amt">
                                <button type="button" class="slider-btn-plus" id="btn-amt-plus">+</button>
                            </div>
                            <div class="premium-input-group">
                                <i class="bi bi-currency-rupee"></i>
                                <input type="number" id="input-sip-amt" value="5000" min="500" max="100000" step="500" placeholder=" " required>
                                <label for="input-sip-amt">Investment Amount</label>
                            </div>
                        </div>

                        <!-- Expected Return Rate -->
                        <div class="premium-slider-container">
                            <div class="slider-header">
                                <span class="slider-label">Expected Return Rate (p.a)</span>
                                <span class="slider-value" id="val-sip-rate">12 %</span>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <button type="button" class="slider-btn-minus" id="btn-rate-minus">-</button>
                                <input type="range" class="premium-slider-input flex-grow-1" id="slide-sip-rate" min="1" max="30" step="0.5" value="12" data-value-id="val-sip-rate">
                                <button type="button" class="slider-btn-plus" id="btn-rate-plus">+</button>
                            </div>
                            <div class="premium-input-group">
                                <i class="bi bi-percent"></i>
                                <input type="number" id="input-sip-rate" value="12" min="1" max="30" step="0.5" placeholder=" " required>
                                <label for="input-sip-rate">Expected Return Rate</label>
                            </div>
                        </div>

                        <!-- Time Period -->
                        <div class="premium-slider-container">
                            <div class="slider-header">
                                <span class="slider-label">Time Period</span>
                                <span class="slider-value" id="val-sip-time">10 Yr</span>
                            </div>
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <button type="button" class="slider-btn-minus" id="btn-time-minus">-</button>
                                <input type="range" class="premium-slider-input flex-grow-1" id="slide-sip-time" min="1" max="40" step="1" value="10" data-value-id="val-sip-time">
                                <button type="button" class="slider-btn-plus" id="btn-time-plus">+</button>
                            </div>
                            <div class="premium-input-group">
                                <i class="bi bi-calendar3"></i>
                                <input type="number" id="input-sip-time" value="10" min="1" max="40" placeholder=" " required>
                                <label for="input-sip-time">Time Period (Years)</label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Output summary & Charts (Right) -->
        <div class="col-lg-7">
            <div class="card calc-card border-0 h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4 text-body">Maturity Projections</h4>
                    
                    <!-- Main value indicator -->
                    <div class="premium-results-card p-4 text-center mb-4">
                        <span class="text-muted d-block small mb-1 fw-semibold">TOTAL MATURITY VALUE</span>
                        <h2 class="result-highlight-text mb-0" id="text-sip-maturity">₹ 11,61,695</h2>
                    </div>

                    <!-- Stats rows -->
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div class="p-3 bg-light rounded-4 border">
                                <span class="text-muted d-block small mb-1">Total Invested</span>
                                <h4 class="fw-bold mb-0 text-body" id="text-sip-principal">₹ 6,00,000</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 bg-light rounded-4 border">
                                <span class="text-muted d-block small mb-1">Est. Returns</span>
                                <h4 class="fw-bold mb-0 text-success" id="text-sip-profit">₹ 5,61,695</h4>
                            </div>
                        </div>
                    </div>

                    <!-- Charts container -->
                    <div class="row g-4 align-items-center">
                        <div class="col-md-7">
                            <h6 class="fw-bold text-center mb-3">Yearly Portfolio Growth</h6>
                            <div style="height: 260px; position: relative;">
                                <canvas id="sipBarChartRedesign"></canvas>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h6 class="fw-bold text-center mb-3">Portfolio Distribution</h6>
                            <div style="height: 180px; position: relative;" class="d-flex justify-content-center">
                                <canvas id="sipDoughnutChartRedesign"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Insights section -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card calc-card border-0 h-100">
                <div class="card-body p-4 text-center">
                    <div class="icon-circle mx-auto mb-3"><i class="bi bi-cash"></i></div>
                    <h5 class="fw-bold mb-2">Total Invested</h5>
                    <p class="text-muted small mb-0" id="insight-invested">You invested a total of ₹ 6,00,000 over a 10 year period.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card calc-card border-0 h-100">
                <div class="card-body p-4 text-center">
                    <div class="icon-circle mx-auto mb-3 text-success"><i class="bi bi-arrow-up-circle"></i></div>
                    <h5 class="fw-bold mb-2">Wealth Multiplier</h5>
                    <p class="text-muted small mb-0" id="insight-multiplier">Your investment earned ₹ 5,61,695 in compounding returns.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card calc-card border-0 h-100">
                <div class="card-body p-4 text-center">
                    <div class="icon-circle mx-auto mb-3 text-warning"><i class="bi bi-clock-history"></i></div>
                    <h5 class="fw-bold mb-2">Doubling Horizon</h5>
                    <p class="text-muted small mb-0" id="insight-doubling">It takes approximately 6 years to double your initial capital under this model.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Annual Wealth Projections Layout (Responsive Table vs. Cards) -->
    <div class="card calc-card border-0 mb-5">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <h4 class="fw-bold mb-0 text-body">Annual Wealth Schedule</h4>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="exportTableToCSV('sip-projection-table', 'sip_projection.csv')"><i class="bi bi-download"></i> CSV</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" onclick="exportTableToPDF()"><i class="bi bi-printer"></i> Print / PDF</button>
                </div>
            </div>
            
            <!-- Desktop Layout: Sticky Table -->
            <div class="d-none d-md-block premium-table-container">
                <div class="table-responsive" style="max-height: 400px;">
                    <table class="premium-table" id="sip-projection-table">
                        <thead>
                            <tr>
                                <th>Year</th>
                                <th>Invested Amount</th>
                                <th>Estimated Returns</th>
                                <th>Total Maturity Value</th>
                            </tr>
                        </thead>
                        <tbody id="sip-table-body-redesign">
                            <!-- Injected dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile Layout: Cards Stack -->
            <div class="d-block d-md-none" id="sip-mobile-cards-container">
                <!-- Injected dynamically as mobile cards -->
            </div>
        </div>
    </div>

    <!-- Formula section -->
    <div class="card calc-card border-0 mb-5">
        <div class="card-body p-4">
            <h3 class="fw-bold mb-4 text-body border-bottom pb-2">The SIP Maturity Formula: Annuity Due</h3>
            <p class="text-muted">SIP contributions are invested at the start of each month, representing an annuity due. The mathematical formula is:</p>
            <div class="p-4 bg-light rounded-4 text-center mb-4">
                <code class="fw-bold text-primary fs-4">M = P * [((1 + i)^n - 1) / i] * (1 + i)</code>
            </div>
            <h6 class="fw-bold mb-3">Formula Variables:</h6>
            <div class="table-responsive mb-4">
                <table class="table table-bordered text-muted small">
                    <thead class="table-light text-body">
                        <tr>
                            <th>Variable</th>
                            <th>Description</th>
                            <th>Current Case Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>M</strong></td>
                            <td>Maturity amount (the future value of periodic investments)</td>
                            <td id="var-val-maturity">₹ 1,161,695</td>
                        </tr>
                        <tr>
                            <td><strong>P</strong></td>
                            <td>Periodic contribution amount paid per month</td>
                            <td id="var-val-p">₹ 5,000</td>
                        </tr>
                        <tr>
                            <td><strong>i</strong></td>
                            <td>Monthly interest rate (Annual Return Rate / 12 / 100)</td>
                            <td id="var-val-i">0.01 (1%)</td>
                        </tr>
                        <tr>
                            <td><strong>n</strong></td>
                            <td>Total number of periodic investments (Tenure Years * 12)</td>
                            <td id="var-val-n">120 Months</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SEO FAQ Accordion -->
    <div class="card calc-card border-0 mb-5">
        <div class="card-body p-4">
            <h3 class="fw-bold mb-4 text-body text-center">Frequently Asked Questions</h3>
            <div class="accordion accordion-flush" id="faqAccordionSIP">
                <div class="accordion-item border-bottom py-2 bg-transparent">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-body bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqSIP1">
                            What is the difference between SIP and Lumpsum?
                        </button>
                    </h2>
                    <div id="faqSIP1" class="accordion-collapse collapse" data-bs-parent="#faqAccordionSIP">
                        <div class="accordion-body text-muted small">
                            A Systematic Investment Plan (SIP) involves investing a fixed sum of money at regular intervals (monthly/quarterly), helping average out market risks via Rupee Cost Averaging. A Lumpsum investment, conversely, is a one-time single investment of a larger capital amount.
                        </div>
                    </div>
                </div>
                <div class="accordion-item border-bottom py-2 bg-transparent">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold text-body bg-transparent shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#faqSIP2">
                            Can I edit or stop my SIP at any time?
                        </button>
                    </h2>
                    <div id="faqSIP2" class="accordion-collapse collapse" data-bs-parent="#faqAccordionSIP">
                        <div class="accordion-body text-muted small">
                            Yes, SIPs are highly flexible. You can pause, modify, or stop your SIP investments through your mutual fund platform with no penalty fees.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Calculators - Horizontal Scrolling Cards on Mobile -->
    <div class="mb-5">
        <h4 class="fw-bold mb-4 text-body">Related Tools</h4>
        <div class="horizontal-scroll-container">
            <div class="horizontal-scroll-item">
                <a href="<?php echo URLROOT; ?>/calculators/emi" class="card calc-card p-3 text-center text-decoration-none h-100 d-flex flex-column justify-content-between align-items-center">
                    <i class="bi bi-calculator text-primary fs-3 mb-2"></i>
                    <span class="fw-bold small text-body">EMI Calculator</span>
                    <span class="btn btn-sm btn-premium rounded-pill py-1 px-3 mt-2 text-white">Go</span>
                </a>
            </div>
            <div class="horizontal-scroll-item">
                <a href="<?php echo URLROOT; ?>/calculators/fd" class="card calc-card p-3 text-center text-decoration-none h-100 d-flex flex-column justify-content-between align-items-center">
                    <i class="bi bi-wallet2 text-primary fs-3 mb-2"></i>
                    <span class="fw-bold small text-body">FD Calculator</span>
                    <span class="btn btn-sm btn-premium rounded-pill py-1 px-3 mt-2 text-white">Go</span>
                </a>
            </div>
            <div class="horizontal-scroll-item">
                <a href="<?php echo URLROOT; ?>/calculators/compound_interest" class="card calc-card p-3 text-center text-decoration-none h-100 d-flex flex-column justify-content-between align-items-center">
                    <i class="bi bi-percent text-primary fs-3 mb-2"></i>
                    <span class="fw-bold small text-body">Compound Interest</span>
                    <span class="btn btn-sm btn-premium rounded-pill py-1 px-3 mt-2 text-white">Go</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Mobile Bottom Sticky Action Bar -->
<div class="mobile-action-bar d-flex d-md-none">
    <button class="btn btn-premium flex-grow-1 fw-bold py-2.5 rounded-pill" id="mobile-btn-calc-sip">Calculate</button>
    <button class="btn btn-outline-secondary fw-bold px-3 rounded-pill" id="mobile-btn-reset-sip">Reset</button>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });

    const slideAmt = document.getElementById('slide-sip-amt');
    const inputAmt = document.getElementById('input-sip-amt');
    const valAmt = document.getElementById('val-sip-amt');
    const btnAmtMinus = document.getElementById('btn-amt-minus');
    const btnAmtPlus = document.getElementById('btn-amt-plus');

    const slideRate = document.getElementById('slide-sip-rate');
    const inputRate = document.getElementById('input-sip-rate');
    const valRate = document.getElementById('val-sip-rate');
    const btnRateMinus = document.getElementById('btn-rate-minus');
    const btnRatePlus = document.getElementById('btn-rate-plus');

    const slideTime = document.getElementById('slide-sip-time');
    const inputTime = document.getElementById('input-sip-time');
    const valTime = document.getElementById('val-sip-time');
    const btnTimeMinus = document.getElementById('btn-time-minus');
    const btnTimePlus = document.getElementById('btn-time-plus');

    const tableBody = document.getElementById('sip-table-body-redesign');
    const cardsContainer = document.getElementById('sip-mobile-cards-container');

    const mobileBtnCalc = document.getElementById('mobile-btn-calc-sip');
    const mobileBtnReset = document.getElementById('mobile-btn-reset-sip');

    let pieChart = null;
    let barChart = null;

    let lastInvested = 0;
    let lastReturns = 0;
    let lastTotal = 0;

    function calculateSIP() {
        const P = parseFloat(inputAmt.value) || 0;
        const annualRate = parseFloat(inputRate.value) || 0;
        const years = parseFloat(inputTime.value) || 0;

        const monthlyRate = annualRate / 100 / 12;
        const totalMonths = years * 12;
        
        const totalInvested = P * totalMonths;
        let maturityValue = 0;
        
        if (monthlyRate > 0) {
            maturityValue = P * ((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate) * (1 + monthlyRate);
        } else {
            maturityValue = totalInvested;
        }

        const estReturns = Math.max(0, maturityValue - totalInvested);

        // Animate count-up transition
        animateNumber(document.getElementById('text-sip-principal'), lastInvested, totalInvested, 800, val => formatter.format(val));
        animateNumber(document.getElementById('text-sip-profit'), lastReturns, estReturns, 800, val => formatter.format(val));
        animateNumber(document.getElementById('text-sip-maturity'), lastTotal, maturityValue, 800, val => formatter.format(val));

        // Update insight elements
        document.getElementById('insight-invested').textContent = `You invested a total of ${formatter.format(totalInvested)} over a ${years} year period.`;
        document.getElementById('insight-multiplier').textContent = `Your investment earned ${formatter.format(estReturns)} in compounding returns, yielding ${((maturityValue/totalInvested)).toFixed(1)}x capital growth.`;
        
        const yrsToDouble = annualRate > 0 ? (72 / annualRate).toFixed(1) : 'N/A';
        document.getElementById('insight-doubling').textContent = `It takes approximately ${yrsToDouble} years to double your initial capital under a steady ${annualRate}% return model.`;

        // Update Formula variables
        document.getElementById('var-val-maturity').textContent = formatter.format(maturityValue);
        document.getElementById('var-val-p').textContent = formatter.format(P);
        document.getElementById('var-val-i').textContent = `${(monthlyRate * 100).toFixed(3)}% (${monthlyRate.toFixed(4)})`;
        document.getElementById('var-val-n').textContent = `${totalMonths} Months`;

        // Update charts & schedule formats
        updateCharts(totalInvested, estReturns, P, monthlyRate, years);
        generateSchedule(P, monthlyRate, years);

        // Save last state
        lastInvested = totalInvested;
        lastReturns = estReturns;
        lastTotal = maturityValue;
    }

    function updateCharts(invested, returns, P, monthlyRate, years) {
        // Doughnut Chart
        const pieCtx = document.getElementById('sipDoughnutChartRedesign').getContext('2d');
        if (pieChart) pieChart.destroy();
        pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Invested Capital', 'Est. Returns'],
                datasets: [{
                    data: [invested, returns],
                    backgroundColor: ['#4F46E5', '#10B981'],
                    borderColor: '#ffffff',
                    borderWidth: 2,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 10, font: { family: 'Inter', size: 11, weight: 600 } }
                    }
                },
                cutout: '70%'
            }
        });

        // Stacked Bar Chart with Gradients
        const barLabels = [];
        const investedData = [];
        const returnsData = [];

        for (let y = 1; y <= years; y++) {
            barLabels.push(`Yr ${y}`);
            const m = y * 12;
            const cumInvested = P * m;
            let cumMaturity = 0;
            if (monthlyRate > 0) {
                cumMaturity = P * ((Math.pow(1 + monthlyRate, m) - 1) / monthlyRate) * (1 + monthlyRate);
            } else {
                cumMaturity = cumInvested;
            }
            const cumReturns = Math.max(0, cumMaturity - cumInvested);
            investedData.push(cumInvested);
            returnsData.push(cumReturns);
        }

        const barCtx = document.getElementById('sipBarChartRedesign').getContext('2d');
        if (barChart) barChart.destroy();
        
        const gradPrimary = barCtx.createLinearGradient(0, 0, 0, 300);
        gradPrimary.addColorStop(0, '#4F46E5');
        gradPrimary.addColorStop(1, '#818cf8');

        const gradSuccess = barCtx.createLinearGradient(0, 0, 0, 300);
        gradSuccess.addColorStop(0, '#10B981');
        gradSuccess.addColorStop(1, '#a7f3d0');

        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [
                    {
                        label: 'Invested Capital',
                        data: investedData,
                        backgroundColor: gradPrimary,
                        borderRadius: 4
                    },
                    {
                        label: 'Estimated Returns',
                        data: returnsData,
                        backgroundColor: gradSuccess,
                        borderRadius: 4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { stacked: true, grid: { display: false } },
                    y: { stacked: true, grid: { color: '#f1f5f9' } }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 10, font: { family: 'Inter', size: 11, weight: 600 } }
                    }
                }
            }
        });
    }

    function generateSchedule(P, monthlyRate, years) {
        tableBody.innerHTML = '';
        cardsContainer.innerHTML = '';

        for (let y = 1; y <= years; y++) {
            const m = y * 12;
            const cumInvested = P * m;
            let cumMaturity = 0;
            if (monthlyRate > 0) {
                cumMaturity = P * ((Math.pow(1 + monthlyRate, m) - 1) / monthlyRate) * (1 + monthlyRate);
            } else {
                cumMaturity = cumInvested;
            }
            const cumReturns = Math.max(0, cumMaturity - cumInvested);

            // Populate Desktop Table Row
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><strong>Year ${y}</strong></td>
                <td>${formatter.format(cumInvested)}</td>
                <td>${formatter.format(cumReturns)}</td>
                <td class="text-success fw-bold">${formatter.format(cumMaturity)}</td>
            `;
            tableBody.appendChild(row);

            // Populate Mobile Cards Stack
            const mCard = document.createElement('div');
            mCard.className = 'mobile-table-card';
            mCard.innerHTML = `
                <div class="d-flex justify-content-between border-bottom pb-2 mb-2">
                    <strong class="text-body">Year ${y}</strong>
                    <span class="badge bg-success-subtle text-success">Maturity: ${formatter.format(cumMaturity)}</span>
                </div>
                <div class="d-flex justify-content-between small mb-1">
                    <span class="text-muted">Invested Capital:</span>
                    <span class="fw-semibold text-body">${formatter.format(cumInvested)}</span>
                </div>
                <div class="d-flex justify-content-between small">
                    <span class="text-muted">Estimated Returns:</span>
                    <span class="fw-semibold text-success">${formatter.format(cumReturns)}</span>
                </div>
            `;
            cardsContainer.appendChild(mCard);
        }
    }

    // Two-way bindings for sliders & floating inputs
    function linkInputs(slider, textInput, indicator, suffix, isCurrency = false) {
        slider.addEventListener('input', () => {
            textInput.value = slider.value;
            indicator.textContent = isCurrency ? formatter.format(slider.value) : slider.value + suffix;
            calculateSIP();
        });
        textInput.addEventListener('input', () => {
            if (parseFloat(textInput.value) >= parseFloat(slider.min) && parseFloat(textInput.value) <= parseFloat(slider.max)) {
                slider.value = textInput.value;
            }
            indicator.textContent = isCurrency ? formatter.format(textInput.value) : textInput.value + suffix;
            calculateSIP();
        });
    }

    linkInputs(slideAmt, inputAmt, valAmt, '', true);
    linkInputs(slideRate, inputRate, valRate, ' %');
    linkInputs(slideTime, inputTime, valTime, ' Yr');

    // Plus/Minus Button Click Handlers
    function setupPlusMinusButtons(minusBtn, plusBtn, slider, textInput, valIndicator, suffix, isCurrency) {
        minusBtn.addEventListener('click', () => {
            let val = parseFloat(slider.value) - parseFloat(slider.step);
            val = Math.max(parseFloat(slider.min), val);
            slider.value = val;
            textInput.value = val;
            valIndicator.textContent = isCurrency ? formatter.format(val) : val + suffix;
            calculateSIP();
        });
        plusBtn.addEventListener('click', () => {
            let val = parseFloat(slider.value) + parseFloat(slider.step);
            val = Math.min(parseFloat(slider.max), val);
            slider.value = val;
            textInput.value = val;
            valIndicator.textContent = isCurrency ? formatter.format(val) : val + suffix;
            calculateSIP();
        });
    }

    setupPlusMinusButtons(btnAmtMinus, btnAmtPlus, slideAmt, inputAmt, valAmt, '', true);
    setupPlusMinusButtons(btnRateMinus, btnRatePlus, slideRate, inputRate, valRate, ' %', false);
    setupPlusMinusButtons(btnTimeMinus, btnTimePlus, slideTime, inputTime, valTime, ' Yr', false);

    // Mobile Action triggers
    mobileBtnCalc.addEventListener('click', calculateSIP);
    mobileBtnReset.addEventListener('click', () => {
        slideAmt.value = 5000;
        inputAmt.value = 5000;
        valAmt.textContent = formatter.format(5000);

        slideRate.value = 12;
        inputRate.value = 12;
        valRate.textContent = '12 %';

        slideTime.value = 10;
        inputTime.value = 10;
        valTime.textContent = '10 Yr';

        calculateSIP();
    });

    // Run first calculation
    calculateSIP();
});
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
