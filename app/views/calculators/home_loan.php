<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Home Loan Calculator</li>
        </ol>
    </nav>

    <div class="row g-4 mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Home Loan EMI</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-4" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    <form id="home-loan-calculator-form">
                        <!-- Loan Amount -->
                        <div class="mb-4 bg-white p-3 border rounded shadow-sm">
                            <div class="d-flex justify-content-between mb-2">
                                <label class="form-label fw-bold mb-0 text-dark">Home Loan Amount</label>
                                <span class="text-primary fw-bold" id="hl-amount-val">₹3,500,000</span>
                            </div>
                            <input type="range" class="form-range mb-2" id="hl-amount" min="100000" max="100000000" step="50000" value="3500000">
                            <div class="input-group">
                                <span class="input-group-text bg-light">₹</span>
                                <input type="number" class="form-control" id="hl-amount-input" value="3500000" min="100000">
                            </div>
                        </div>

                        <!-- Interest Rate -->
                        <div class="mb-4 bg-white p-3 border rounded shadow-sm">
                            <div class="d-flex justify-content-between mb-2">
                                <label class="form-label fw-bold mb-0 text-dark">Interest Rate (p.a.)</label>
                                <span class="text-success fw-bold" id="hl-rate-val">8.5%</span>
                            </div>
                            <input type="range" class="form-range mb-2" id="hl-rate" min="1" max="25" step="0.1" value="8.5">
                            <div class="input-group">
                                <input type="number" class="form-control" id="hl-rate-input" value="8.5" step="0.1" min="1" max="25">
                                <span class="input-group-text bg-light">%</span>
                            </div>
                        </div>

                        <!-- Tenure -->
                        <div class="mb-0 bg-white p-3 border rounded shadow-sm">
                            <div class="d-flex justify-content-between mb-2">
                                <label class="form-label fw-bold mb-0 text-dark">Loan Tenure</label>
                                <span class="text-warning fw-bold" id="hl-tenure-val">20 Years</span>
                            </div>
                            <input type="range" class="form-range mb-2" id="hl-tenure" min="1" max="30" step="1" value="20">
                            <div class="input-group">
                                <input type="number" class="form-control" id="hl-tenure-input" value="20" min="1" max="30">
                                <select class="form-select bg-light" id="hl-tenure-type" style="max-width: 120px;">
                                    <option value="years" selected>Years</option>
                                    <option value="months">Months</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Results & Graphs -->
        <div class="col-lg-7">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Calculation Summary</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-4" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-white border rounded shadow-sm text-center">
                                <span class="text-muted fw-bold d-block small text-uppercase mb-1">Monthly Home EMI</span>
                                <span class="fw-bold fs-4 text-primary" id="res-hl-monthly">₹0</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-white border rounded shadow-sm text-center">
                                <span class="text-muted fw-bold d-block small text-uppercase mb-1">Total Principal</span>
                                <span class="fw-bold fs-5 text-dark" id="res-hl-principal">₹0</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-white border rounded shadow-sm text-center">
                                <span class="text-muted fw-bold d-block small text-uppercase mb-1">Total Interest</span>
                                <span class="fw-bold fs-5 text-danger" id="res-hl-interest">₹0</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-white border rounded shadow-sm text-center">
                                <span class="text-muted fw-bold d-block small text-uppercase mb-1">Total Amount Payable</span>
                                <span class="fw-bold fs-5 text-success" id="res-hl-total">₹0</span>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Representation: Graphs side-by-side or stacked -->
                    <div class="row g-4 bg-white border rounded shadow-sm mx-0 p-3 align-items-center">
                        <!-- Bar Chart -->
                        <div class="col-md-7 border-end">
                            <h6 class="fw-bold text-center mb-3 text-dark">Loan Amortization Growth</h6>
                            <div style="height: 200px; position: relative;">
                                <canvas id="hlBarChartCustom"></canvas>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-md-5">
                            <h6 class="fw-bold text-center mb-3 text-dark">Payment Breakup</h6>
                            <div style="height: 180px; position: relative;" class="d-flex justify-content-center">
                                <canvas id="hlPieChartCustom"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Amortization Table -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3 text-body">Loan Amortization Schedule (Yearly)</h4>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hover align-middle mb-0 text-muted">
                            <thead class="table-light text-body sticky-top">
                                <tr>
                                    <th>Year</th>
                                    <th>Opening Balance</th>
                                    <th>Principal Paid</th>
                                    <th>Interest Paid</th>
                                    <th>Closing Balance</th>
                                </tr>
                            </thead>
                            <tbody id="hl-annual-table-body">
                                <!-- Generated Dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== EDUCATIONAL CONTENT ===================== -->
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <div class="card shadow-none border rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">Understanding Home Loans and EMI Calculations</h2>
                    <p class="text-muted">A home loan is a secured loan that you take from a bank or financial institution to purchase, construct, or renovate a residential property. Since properties are capital-intensive, home loans are structured to spread the cost over a long period (often 15 to 30 years). Calculating your Equated Monthly Installment (EMI) helps you plan your monthly household budget securely.</p>

                    <h3 class="fw-bold h5 mt-4 mb-3 text-body">How Home Loan EMI is Calculated</h3>
                    <p class="text-muted">The mathematical formula to determine your home loan EMI is:</p>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">EMI = [P x R x (1+R)^N] / [(1+R)^N - 1]</code>
                    </div>
                    <ul class="text-muted text-start">
                        <li class="mb-2"><strong>P (Principal):</strong> The actual amount you borrow. The home loan amount is usually up to 80-90% of the property's market value.</li>
                        <li class="mb-2"><strong>R (Rate of Interest):</strong> The monthly interest rate, which is the annual interest rate divided by 12 and divided by 100 (e.g. 8.5% annual rate translates to 8.5 / 12 / 100 = 0.007083 monthly).</li>
                        <li class="mb-2"><strong>N (Tenure):</strong> The duration of the loan in terms of monthly installments (e.g., 20 years = 240 months).</li>
                    </ul>

                    <h3 class="fw-bold h5 mt-4 mb-3 text-body">Step-by-Step Example Calculation</h3>
                    <p class="text-muted">Let's calculate the EMI for a Home Loan of <strong>₹35 Lakhs</strong> at <strong>8.5% p.a.</strong> interest rate for a tenure of <strong>20 Years</strong>:</p>
                    <ol class="text-muted text-start">
                        <li class="mb-2"><strong>P</strong> = ₹35,00,000</li>
                        <li class="mb-2"><strong>R</strong> = 8.5% p.a. = 8.5 / 12 / 100 = 0.007083 per month</li>
                        <li class="mb-2"><strong>N</strong> = 20 Years = 240 Months</li>
                        <li class="mb-2">Plugging values into the formula:<br>
                            <code>EMI = [35,00,000 x 0.007083 x (1.007083)^240] / [(1.007083)^240 - 1]</code>
                        </li>
                        <li class="mb-2">This results in a monthly payment of approximately <strong>₹30,386</strong>.</li>
                    </ol>

                    <h3 class="fw-bold h5 mt-4 mb-3 text-body">Home Loan Tax Benefits (India)</h3>
                    <p class="text-muted">Home loan borrowers are eligible for significant tax deductions under the Income Tax Act in India:</p>
                    <div class="row g-3 text-start">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 h-100">
                                <h6 class="fw-bold text-body">Section 24(b) (Interest)</h6>
                                <p class="small text-muted mb-0">Claim deductions on the interest component up to <strong>₹2 Lakhs per annum</strong> for a self-occupied property.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 h-100">
                                <h6 class="fw-bold text-body">Section 80C (Principal)</h6>
                                <p class="small text-muted mb-0">Claim deductions on the principal repayment component up to <strong>₹1.5 Lakhs per annum</strong> (subject to overall Section 80C limits).</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });

    const amtRange = document.getElementById('hl-amount');
    const amtInput = document.getElementById('hl-amount-input');
    const amtVal = document.getElementById('hl-amount-val');

    const rateRange = document.getElementById('hl-rate');
    const rateInput = document.getElementById('hl-rate-input');
    const rateVal = document.getElementById('hl-rate-val');

    const tenureRange = document.getElementById('hl-tenure');
    const tenureInput = document.getElementById('hl-tenure-input');
    const tenureVal = document.getElementById('hl-tenure-val');
    const tenureType = document.getElementById('hl-tenure-type');

    const tableBody = document.getElementById('hl-annual-table-body');

    let pieChart = null;
    let barChart = null;

    function calculateEMI() {
        const P = parseFloat(amtInput.value) || 0;
        const r = (parseFloat(rateInput.value) || 0) / 12 / 100;
        let n = parseFloat(tenureInput.value) || 0;
        if (tenureType.value === 'years') {
            n = n * 12;
        }

        let emi = 0;
        let totalPayable = P;
        let totalInterest = 0;

        if (P > 0 && n > 0) {
            if (r > 0) {
                emi = P * r * (Math.pow(1 + r, n) / (Math.pow(1 + r, n) - 1));
                totalPayable = emi * n;
                totalInterest = totalPayable - P;
            } else {
                emi = P / n;
                totalPayable = P;
                totalInterest = 0;
            }
        }

        // Update Text Results
        document.getElementById('res-hl-monthly').textContent = formatter.format(emi);
        document.getElementById('res-hl-principal').textContent = formatter.format(P);
        document.getElementById('res-hl-interest').textContent = formatter.format(totalInterest);
        document.getElementById('res-hl-total').textContent = formatter.format(totalPayable);

        // Generate Charts & Schedule
        updateCharts(P, totalInterest, emi, r, n);
        generateSchedule(P, emi, r, n);
    }

    function updateCharts(P, totalInterest, emi, r, n) {
        // Pie Chart
        const pieCtx = document.getElementById('hlPieChartCustom').getContext('2d');
        if (pieChart) pieChart.destroy();
        pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Principal Amount', 'Total Interest'],
                datasets: [{
                    data: [P, totalInterest],
                    backgroundColor: ['#10b981', '#ef4444'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 12, font: { size: 11 } }
                    }
                }
            }
        });

        // Bar Chart - Amortization (Yearly breakdown)
        const barLabels = [];
        const principalPaidData = [];
        const interestPaidData = [];

        let balance = P;
        let yearlyPrincipal = 0;
        let yearlyInterest = 0;
        let yearNum = 1;

        for (let m = 1; m <= n; m++) {
            const interestForMonth = balance * r;
            const principalForMonth = emi - interestForMonth;
            
            yearlyPrincipal += principalForMonth;
            yearlyInterest += interestForMonth;
            balance -= principalForMonth;

            if (m % 12 === 0 || m === n) {
                barLabels.push(`Yr ${yearNum}`);
                principalPaidData.push(yearlyPrincipal);
                interestPaidData.push(yearlyInterest);
                
                yearlyPrincipal = 0;
                yearlyInterest = 0;
                yearNum++;
            }
        }

        const barCtx = document.getElementById('hlBarChartCustom').getContext('2d');
        if (barChart) barChart.destroy();
        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [
                    {
                        label: 'Principal Paid',
                        data: principalPaidData,
                        backgroundColor: '#10b981'
                    },
                    {
                        label: 'Interest Paid',
                        data: interestPaidData,
                        backgroundColor: '#ef4444'
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { stacked: true },
                    y: { stacked: true }
                },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { boxWidth: 12, font: { size: 11 } }
                    }
                }
            }
        });
    }

    function generateSchedule(P, emi, r, n) {
        tableBody.innerHTML = '';
        let balance = P;
        let yearlyPrincipal = 0;
        let yearlyInterest = 0;
        let yearNum = 1;
        let openingBalance = P;

        for (let m = 1; m <= n; m++) {
            const interestForMonth = balance * r;
            const principalForMonth = emi - interestForMonth;
            
            yearlyPrincipal += principalForMonth;
            yearlyInterest += interestForMonth;
            balance -= principalForMonth;

            if (m % 12 === 0 || m === n) {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td><strong>Year ${yearNum}</strong></td>
                    <td>${formatter.format(openingBalance)}</td>
                    <td>${formatter.format(yearlyPrincipal)}</td>
                    <td>${formatter.format(yearlyInterest)}</td>
                    <td class="text-success fw-bold">${formatter.format(Math.max(0, balance))}</td>
                `;
                tableBody.appendChild(row);
                
                openingBalance = balance;
                yearlyPrincipal = 0;
                yearlyInterest = 0;
                yearNum++;
            }
        }
    }

    // Connect slider + input bindings
    function setupBinding(rangeEl, inputEl, valEl, suffix) {
        rangeEl.addEventListener('input', (e) => {
            inputEl.value = e.target.value;
            valEl.textContent = rangeEl.value + suffix;
            calculateEMI();
        });
        inputEl.addEventListener('input', (e) => {
            rangeEl.value = e.target.value;
            valEl.textContent = rangeEl.value + suffix;
            calculateEMI();
        });
    }

    setupBinding(amtRange, amtInput, amtVal, '');
    // Adjust values to formatting on startup/changes
    amtRange.addEventListener('input', () => {
        amtVal.textContent = formatter.format(amtRange.value);
    });
    amtInput.addEventListener('input', () => {
        amtVal.textContent = formatter.format(amtInput.value);
    });

    setupBinding(rateRange, rateInput, rateVal, '%');

    tenureRange.addEventListener('input', (e) => {
        tenureInput.value = e.target.value;
        updateTenureText();
        calculateEMI();
    });
    tenureInput.addEventListener('input', (e) => {
        tenureRange.value = e.target.value;
        updateTenureText();
        calculateEMI();
    });
    tenureType.addEventListener('change', () => {
        updateTenureText();
        calculateEMI();
    });

    function updateTenureText() {
        const type = tenureType.value === 'years' ? ' Years' : ' Months';
        tenureVal.textContent = tenureInput.value + type;
    }

    // Run first calculation
    amtVal.textContent = formatter.format(amtRange.value);
    calculateEMI();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
