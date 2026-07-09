<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">EMI Calculator</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-2">EMI Calculator</h1>
            
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">EMI Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    <form id="emi-calculator-form">
                        <!-- Loan Amount -->
                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-between  mb-1" style="font-size: 0.9rem; font-weight: 600;">
                                <span>Loan Amount</span>
                                <span class="text-primary" id="emi-amount-val">₹1,000,000</span>
                            </label>
                            <input type="range" class="form-range" id="emi-amount" min="10000" max="50000000" step="10000" value="1000000">
                            <div class="input-group input-group-sm mt-1">
                                <span class="input-group-text bg-light border-secondary-subtle">₹</span>
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="emi-amount-input" value="1000000" min="10000">
                            </div>
                        </div>

                        <!-- Interest Rate -->
                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-between  mb-1" style="font-size: 0.9rem; font-weight: 600;">
                                <span>Interest Rate (p.a.)</span>
                                <span class="text-success" id="emi-rate-val">8.5%</span>
                            </label>
                            <input type="range" class="form-range" id="emi-rate" min="1" max="25" step="0.1" value="8.5">
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="emi-rate-input" value="8.5" step="0.1" min="1" max="25">
                                <span class="input-group-text bg-light border-secondary-subtle">%</span>
                            </div>
                        </div>

                        <!-- Tenure -->
                        <div class="mb-3">
                            <label class="form-label d-flex justify-content-between  mb-1" style="font-size: 0.9rem; font-weight: 600;">
                                <span>Loan Tenure</span>
                                <span class="text-warning" id="emi-tenure-val">10 Years</span>
                            </label>
                            <input type="range" class="form-range" id="emi-tenure" min="1" max="30" step="1" value="10">
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="emi-tenure-input" value="10" min="1" max="30">
                                <select class="form-select bg-light border-secondary-subtle" id="emi-tenure-type" style="max-width: 120px;">
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
                <div class="literal-calc-body flex-grow-1 p-3" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Monthly EMI</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-primary fs-5 text-end" id="res-emi-monthly">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Total Principal</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main  fs-5 text-end" id="res-emi-principal">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Total Interest</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-danger fs-5 text-end" id="res-emi-interest">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Amount Payable</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0; background-color: #f8f9ff;">
                                <div class="literal-display-main text-success fs-5 text-end" id="res-emi-total">₹0</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Representation: Graphs side-by-side or stacked -->
                    <div class="row g-2 mt-2">
                        <!-- Bar Chart -->
                        <div class="col-md-7 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd; border-right: none;">
                            <h6 class="fw-bold text-center mb-1 " style="font-size: 0.8rem;">Amortization Growth</h6>
                            <div style="height: 150px; position: relative;">
                                <canvas id="emiBarChartCustom"></canvas>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-md-5 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd;">
                            <h6 class="fw-bold text-center mb-1 " style="font-size: 0.8rem;">Payment Breakup</h6>
                            <div style="height: 150px; position: relative;" class="d-flex justify-content-center">
                                <canvas id="emiPieChartCustom"></canvas>
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
                            <tbody id="emi-annual-table-body">
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is an Equated Monthly Installment (EMI)?</h2>
                    <p class="text-muted">An Equated Monthly Installment (EMI) is a fixed payment amount made by a borrower to a lender at a specified date each calendar month. EMIs are applied to both interest and principal each month, so that over a specified number of years, the loan is paid off in full. In the early stages of the loan tenure, a larger portion of the EMI goes toward paying the interest. As time progresses and the outstanding balance reduces, a larger proportion is allocated toward the principal repayment. This process of spreading loan payments over time is known as amortization.</p>
                    <p class="text-muted">The exact calculation of an EMI depends on three primary factors: the principal amount borrowed, the annual interest rate, and the loan tenure. Understanding how EMIs are structured helps borrowers plan their monthly budgets, compare loan offers from different financial institutions, and decide whether to prepay their loan to save on interest. Lenders typically offer two types of EMI repayment schemes: reducing balance interest rates (standard for home, car, and personal loans) and flat rate interest rates (common in some retail finance offers).</p>
                    <p class="text-muted">When evaluating loans, it is crucial to understand the debt-to-income (DTI) ratio. Most financial advisers recommend that a borrower's total monthly EMI payments (across all active loans) should not exceed 35% to 40% of their net monthly income. Exceeding this threshold can lead to severe financial strain and increases the default risk, which can damage the borrower's credit score and limit future borrowing capacity.</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">The Mathematical Formula for EMI</h2>
                    <p class="text-muted">For reducing balance loans, the monthly EMI is calculated using the following mathematical formula:</p>
                    
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">EMI = [P * r * (1 + r)^n] / [(1 + r)^n - 1]</code>
                    </div>
                    
                    <div class="p-3 bg-light rounded-3 text-muted mb-3">
                        <ul class="list-unstyled mb-0 small text-start">
                            <li><strong>P:</strong> Principal loan amount (the original sum borrowed)</li>
                            <li><strong>r:</strong> Monthly interest rate (calculated as: Annual Interest Rate / 12 / 100)</li>
                            <li><strong>n:</strong> Loan tenure in months (number of installments)</li>
                        </ul>
                    </div>

                    <h4 class="fw-bold h5 text-body mt-4 mb-2">Step-by-Step Calculation Example</h4>
                    <p class="text-muted">Suppose you borrow ₹100,000 at an annual interest rate of 12% p.a. for a tenure of 1 year (12 months):</p>
                    <div class="p-3 bg-light rounded-3 mb-3">
                        <pre class="mb-0"><code class="text-primary fw-bold">Step 1: Calculate the monthly interest rate (r)
r = 12% / 12 / 100 = 0.01 per month

Step 2: Determine the number of monthly installments (n)
n = 12 months

Step 3: Plug values into the EMI formula
EMI = [100,000 * 0.01 * (1 + 0.01)^12] / [(1 + 0.01)^12 - 1]
EMI = [1,000 * (1.01)^12] / [(1.01)^12 - 1]
Since (1.01)^12 ≈ 1.126825:
EMI = [1,000 * 1.126825] / [1.126825 - 1]
EMI = 1,126.825 / 0.126825 ≈ ₹8,884.88 per month

Step 4: Understand the Month 1 amortization breakdown
- Monthly Interest Component = P * r = 100,000 * 0.01 = ₹1,000
- Principal Repayment Component = EMI - Interest = 8,884.88 - 1,000 = ₹7,884.88
- Remaining Loan Balance for Month 2 = 100,000 - 7,884.88 = ₹92,115.12</code></pre>
                    </div>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Reducing Balance vs. Flat Rate Interest</h2>
                    <p class="text-muted">It is essential to distinguish between reducing balance and flat rate calculations, as the difference significantly affects the total interest payable:</p>
                    <ul class="text-muted">
                        <li><strong>Reducing Balance EMI:</strong> The interest is calculated monthly on the outstanding loan balance. As you pay off the principal, the interest charge drops, making this method much cheaper for the borrower.</li>
                        <li><strong>Flat Rate EMI:</strong> The interest is calculated on the initial principal throughout the entire tenure. For example, a 12% flat interest rate on a ₹100,000 loan for 1 year means you pay ₹12,000 in interest, resulting in an EMI of:
                            <div class="p-2 bg-light rounded-3 text-center my-2">
                                <code class="fw-bold text-danger">Flat EMI = (100,000 + 12,000) / 12 = ₹9,333.33</code>
                            </div>
                            This is significantly higher than the reducing balance EMI of ₹8,884.88, even though the nominal rates are the same.
                        </li>
                    </ul>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Historical Context of Consumer Amortization</h2>
                    <p class="text-muted">The mathematical concepts behind amortization and equated installments date back to French mathematicians in the 17th and 18th centuries (the word "amortize" comes from the Vulgar Latin "admortire," meaning "to kill" or deaden the debt over time). However, structured EMI repayment options became widely popular in the mid-19th and early 20th centuries as building societies in England and savings and loan associations in the United States sought to make homeownership accessible to the working class. Today, automated EMIs form the cornerstone of modern consumer retail banking, allowing borrowers to budget with absolute predictability.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });

    const amtRange = document.getElementById('emi-amount');
    const amtInput = document.getElementById('emi-amount-input');
    const amtVal = document.getElementById('emi-amount-val');

    const rateRange = document.getElementById('emi-rate');
    const rateInput = document.getElementById('emi-rate-input');
    const rateVal = document.getElementById('emi-rate-val');

    const tenureRange = document.getElementById('emi-tenure');
    const tenureInput = document.getElementById('emi-tenure-input');
    const tenureVal = document.getElementById('emi-tenure-val');
    const tenureType = document.getElementById('emi-tenure-type');

    const tableBody = document.getElementById('emi-annual-table-body');

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
        document.getElementById('res-emi-monthly').textContent = formatter.format(emi);
        document.getElementById('res-emi-principal').textContent = formatter.format(P);
        document.getElementById('res-emi-interest').textContent = formatter.format(totalInterest);
        document.getElementById('res-emi-total').textContent = formatter.format(totalPayable);

        // Generate Charts & Schedule
        updateCharts(P, totalInterest, emi, r, n);
        generateSchedule(P, emi, r, n);
    }

    function updateCharts(P, totalInterest, emi, r, n) {
        // Pie Chart
        const pieCtx = document.getElementById('emiPieChartCustom').getContext('2d');
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

        const barCtx = document.getElementById('emiBarChartCustom').getContext('2d');
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
