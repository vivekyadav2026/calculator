<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Personal Loan Calculator</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-2">Personal Loan EMI Calculator</h1>
            
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%; overflow: hidden;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Personal Loan Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">&#8722;</span>
                        <span class="literal-calc-icon">&times;</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px; min-width: unset;">
                    <form id="personal-loan-calculator-form">
                        <!-- Loan Amount -->
                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-between  mb-1" style="font-size: 0.9rem; font-weight: 600;">
                                <span>Personal Loan Amount</span>
                                <span class="text-primary" id="pl-amount-val">&#8377;500,000</span>
                            </label>
                            <input type="range" class="form-range" id="pl-amount" min="10000" max="5000000" step="10000" value="500000">
                            <div class="input-group input-group-sm mt-1">
                                <span class="input-group-text bg-light border-secondary-subtle">&#8377;</span>
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="pl-amount-input" value="500000" min="10000">
                            </div>
                        </div>

                        <!-- Interest Rate -->
                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-between  mb-1" style="font-size: 0.9rem; font-weight: 600;">
                                <span>Interest Rate (p.a.)</span>
                                <span class="text-success" id="pl-rate-val">12.5%</span>
                            </label>
                            <input type="range" class="form-range" id="pl-rate" min="1" max="36" step="0.1" value="12.5">
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="pl-rate-input" value="12.5" step="0.1" min="1" max="36">
                                <span class="input-group-text bg-light border-secondary-subtle">%</span>
                            </div>
                        </div>

                        <!-- Tenure -->
                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-between  mb-1" style="font-size: 0.9rem; font-weight: 600;">
                                <span>Loan Tenure</span>
                                <span class="text-warning" id="pl-tenure-val">3 Years</span>
                            </label>
                            <input type="range" class="form-range" id="pl-tenure" min="1" max="10" step="1" value="3">
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="pl-tenure-input" value="3" min="1" max="10">
                                <select class="form-select bg-light border-secondary-subtle" id="pl-tenure-type" style="max-width: 120px;">
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
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%; overflow: hidden;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Calculation Summary</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">&#8722;</span>
                        <span class="literal-calc-icon">&times;</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px; min-width: unset;">
                    
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Monthly EMI</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-primary fs-5 text-end" id="res-pl-monthly">&#8377;0</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Total Principal</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main  fs-5 text-end" id="res-pl-principal">&#8377;0</div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Total Interest</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-danger fs-5 text-end" id="res-pl-interest">&#8377;0</div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Amount Payable</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0; background-color: #f8f9ff;">
                                <div class="literal-display-main text-success fs-5 text-end" id="res-pl-total">&#8377;0</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Representation: Graphs side-by-side or stacked -->
                    <div class="row g-2 mt-2">
                        <!-- Bar Chart -->
                        <!-- Bar Chart -->
                        <div class="col-7">
                            <div class="p-2 border rounded" style="background: #fdfdfd;">
                                <h6 class="fw-bold text-center mb-1" style="font-size: 0.8rem;">Amortization Growth</h6>
                                <div style="height: 150px; position: relative;">
                                    <canvas id="plBarChartCustom"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-5">
                            <div class="p-2 border rounded" style="background: #fdfdfd;">
                                <h6 class="fw-bold text-center mb-1" style="font-size: 0.8rem;">Payment Breakup</h6>
                                <div style="height: 150px; position: relative;">
                                    <canvas id="plPieChartCustom"></canvas>
                                </div>
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
                            <tbody id="pl-annual-table-body">
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">Everything You Need to Know About Personal Loans</h2>
                    <p class="text-muted">A personal loan is an unsecured form of credit that you can borrow from banks, credit unions, or online lenders. Since it is unsecured, you do not need to provide collateral (like a house or car) to back the loan. This makes it riskier for lenders, resulting in higher interest rates compared to home or car loans. Personal loans are ideal for consolidation, medical emergencies, or renovations.</p>

                    <h3 class="fw-bold h5 mt-4 mb-3 text-body">How Personal Loan EMI is Calculated</h3>
                    <p class="text-muted">The monthly payment formula uses reducing interest rates:</p>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">EMI = [P x R x (1+R)^N] / [(1+R)^N - 1]</code>
                    </div>
                    <ul class="text-muted text-start">
                        <li class="mb-2"><strong>P (Principal):</strong> The total amount borrowed. Usually ranges from &#8377;10,000 to &#8377;40 Lakhs.</li>
                        <li class="mb-2"><strong>R (Rate of Interest):</strong> The monthly interest rate (e.g. 12% annual rate translates to 12 / 12 / 100 = 0.01 per month).</li>
                        <li class="mb-2"><strong>N (Tenure):</strong> The duration in monthly parts (e.g., 3 years = 36 months).</li>
                    </ul>

                    <h3 class="fw-bold h5 mt-4 mb-3 text-body">Step-by-Step Example Calculation</h3>
                    <p class="text-muted">Let's calculate the EMI for a Personal Loan of <strong>&#8377;2 Lakhs</strong> at <strong>12% p.a.</strong> interest rate for a tenure of <strong>3 Years</strong>:</p>
                    <ol class="text-muted text-start">
                        <li class="mb-2"><strong>P</strong> = &#8377;2,00,000</li>
                        <li class="mb-2"><strong>R</strong> = 12% p.a. = 12 / 12 / 100 = 0.01 per month</li>
                        <li class="mb-2"><strong>N</strong> = 3 Years = 36 Months</li>
                        <li class="mb-2">Plugging values into the formula:<br>
                            <code>EMI = [2,00,000 x 0.01 x (1.01)^36] / [(1.01)^36 - 1]</code>
                        </li>
                        <li class="mb-2">This results in a monthly payment of approximately <strong>&#8377;6,643</strong>.</li>
                    </ol>

                    <h3 class="fw-bold h5 mt-4 mb-3 text-body">Personal Loan Pros & Cons</h3>
                    <div class="row g-3 text-start">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 h-100">
                                <h6 class="fw-bold text-body text-success"><i class="bi bi-plus-circle me-1"></i> Advantages</h6>
                                <ul class="small text-muted ps-3 mb-0">
                                    <li>No collateral required.</li>
                                    <li>Quick processing times.</li>
                                    <li>Flexible usage (debt consolidation, travel, home repair).</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-3 h-100">
                                <h6 class="fw-bold text-body text-danger"><i class="bi bi-dash-circle me-1"></i> Disadvantages</h6>
                                <ul class="small text-muted ps-3 mb-0">
                                    <li>Higher interest rates (typically 10% to 24% p.a.).</li>
                                    <li>Impact on credit score if payments are missed.</li>
                                    <li>Processing fees of 1% to 3% apply.</li>
                                </ul>
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

    const amtRange = document.getElementById('pl-amount');
    const amtInput = document.getElementById('pl-amount-input');
    const amtVal = document.getElementById('pl-amount-val');

    const rateRange = document.getElementById('pl-rate');
    const rateInput = document.getElementById('pl-rate-input');
    const rateVal = document.getElementById('pl-rate-val');

    const tenureRange = document.getElementById('pl-tenure');
    const tenureInput = document.getElementById('pl-tenure-input');
    const tenureVal = document.getElementById('pl-tenure-val');
    const tenureType = document.getElementById('pl-tenure-type');

    const tableBody = document.getElementById('pl-annual-table-body');

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
        document.getElementById('res-pl-monthly').textContent = formatter.format(emi);
        document.getElementById('res-pl-principal').textContent = formatter.format(P);
        document.getElementById('res-pl-interest').textContent = formatter.format(totalInterest);
        document.getElementById('res-pl-total').textContent = formatter.format(totalPayable);

        // Generate Charts & Schedule
        updateCharts(P, totalInterest, emi, r, n);
        generateSchedule(P, emi, r, n);
    }

    function updateCharts(P, totalInterest, emi, r, n) {
        // Pie Chart
        const pieCtx = document.getElementById('plPieChartCustom').getContext('2d');
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

        const barCtx = document.getElementById('plBarChartCustom').getContext('2d');
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
