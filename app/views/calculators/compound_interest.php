<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Compound Interest Calculator</li>
        </ol>
    </nav>

    <div class="row g-4 mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Compound Interest Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    <form id="ci-calculator-form">
                        <!-- Principal Amount -->
                        <div class="mb-3">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Principal Amount (P)</label>
                            <div class="input-group input-group-sm mt-1">
                                <span class="input-group-text bg-light border-secondary-subtle">₹</span>
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="ci-p-custom" value="10000" min="0" required>
                            </div>
                        </div>

                        <!-- Rate of Interest -->
                        <div class="mb-3">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Rate of Interest (R) % p.a.</label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="ci-r-custom" value="8" step="0.1" min="0" required>
                                <span class="input-group-text bg-light border-secondary-subtle">%</span>
                            </div>
                        </div>

                        <!-- Time Period -->
                        <div class="mb-3">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Time Period (t) in Years</label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="ci-t-custom" value="5" step="1" min="1" required>
                                <span class="input-group-text bg-light border-secondary-subtle">Years</span>
                            </div>
                        </div>

                        <!-- Compounding Frequency -->
                        <div class="mb-3">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Compounding Frequency (n)</label>
                            <select class="form-select form-select-sm bg-light border-secondary-subtle" id="ci-n-custom">
                                <option value="1">Annually</option>
                                <option value="2">Semi-Annually</option>
                                <option value="4" selected>Quarterly</option>
                                <option value="12">Monthly</option>
                                <option value="365">Daily</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Calculator Results, Charts and Graphs -->
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
                        <div class="col-md-4">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Principal Amount</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-dark fs-5 text-end" id="res-ci-principal">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Interest Earned</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-success fs-5 text-end" id="res-ci-interest">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Total Value</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0; background-color: #f8f9ff;">
                                <div class="literal-display-main text-primary fs-5 text-end" id="res-ci-total">₹0</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Representation: Graphs side-by-side or stacked -->
                    <div class="row g-2 mt-2">
                        <!-- Bar Chart -->
                        <div class="col-md-7 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd; border-right: none;">
                            <h6 class="fw-bold text-center mb-1 text-dark" style="font-size: 0.8rem;">Growth Projections</h6>
                            <div style="height: 150px; position: relative;">
                                <canvas id="ciBarChart"></canvas>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-md-5 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd;">
                            <h6 class="fw-bold text-center mb-1 text-dark" style="font-size: 0.8rem;">Portfolio Split</h6>
                            <div style="height: 150px; position: relative;" class="d-flex justify-content-center">
                                <canvas id="ciPieChartCustom"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Annual Amortization Table -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3 text-body">Annual Compounding Schedule</h4>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hover align-middle mb-0 text-muted">
                            <thead class="table-light text-body sticky-top">
                                <tr>
                                    <th>Year</th>
                                    <th>Principal Amount</th>
                                    <th>Interest Earned</th>
                                    <th>Total Balance</th>
                                </tr>
                            </thead>
                            <tbody id="ci-annual-table-body">
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is Compound Interest?</h2>
                    <p class="text-muted">Interest is the cost of borrowing money or, more specifically, the amount a lender receives for lending money. When paying interest, the borrower will typically pay a percentage of the principal (the borrowed amount). The concepts of interest can be categorized into simple interest and compound interest.</p>
                    <p class="text-muted">Simple interest refers to interest payments only on the principal, commonly represented as a specified percentage of the principal. To determine interest payments, simply multiply principal by the interest rate and the number of periods for which the loan remains active. For example, if one borrows $100 from a bank at a simple interest rate of 10% per year for two years, at the end of the two years, the interest would come out to:</p>
                    
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary">$100 x 10% x 2 years = $20</code>
                    </div>

                    <p class="text-muted">Compound interest is interest earned on the principal, plus any interest that has accumulated from previous periods. Change in interest is steadily computed. Compound interest is interest accrued on interest, causing assets to grow exponentially over time. For instance, if one deposits $100 into a savings account with a compound interest rate of 10% per year for two years, at the end of the first year, the interest would come out to:</p>

                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary">$100 x 10% x 1 year = $10</code>
                    </div>

                    <p class="text-muted">At the end of the first year, the savings account balance is the principal of $100 + interest of $10 = $110. The interest accrued for the second year is calculated based on the balance of $110 instead of the principal of $100. Thus, the interest of the second year which is accrued is:</p>

                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary">$110 x 10% x 1 year = $11</code>
                    </div>

                    <p class="text-muted">The total compound interest after 2 years is $10 + $11 = $21, versus $20 for the simple interest calculation. Compound interest is interest earned on interest, causing compound interest to grow over time. Because compounding growth is exponential, the longer assets compound, the larger the compounding benefits become.</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Different Compounding Frequencies</h2>
                    <p class="text-muted">Interest can compound on any given frequency schedule but will typically compound semi-annually, quarterly, monthly, daily, or continuously. Interest rate compounding increases interest accrued on a loan. For example, a loan with a 10% interest rate compounding semi-annually has an interest rate of 5% per half year. For every $100 borrowed, the interest of the first half of the year comes out to:</p>

                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary">$100 x 5% = $5</code>
                    </div>

                    <p class="text-muted">For the second half of the year, the interest is computed as:</p>

                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary">($100 + $5) x 5% = $5.25</code>
                    </div>

                    <p class="text-muted">The total interest is $5 + $5.25 = $10.25. Therefore, a 10% interest rate compounding semi-annually is equivalent to a 10.25% interest rate compounding annually. The annual rate of savings accounts and Certificates of Deposits (CDs) tend to compound quarterly, monthly, daily, or continuously. Credit cards tend to compound daily. For this reason, lenders display the Annual Percentage Rate (APR) alongside the Annual Percentage Yield (APY) to represent actual interest accrued over a year.</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Compound Interest Formulas</h2>
                    <p class="text-muted">The equations to determine compound interest can be complicated. Our calculator provides a simplified result. However, those who want to gain a deeper understanding of these calculations can reference the formulas below.</p>
                    
                    <h4 class="fw-bold h5 text-body mt-4 mb-2">Basic Compound Interest Formula</h4>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">A = P * (1 + r / n)^(n * t)</code>
                    </div>
                    <div class="p-3 bg-light rounded-3 text-muted mb-3">
                        <ul class="list-unstyled mb-0 small text-start">
                            <li><strong>A:</strong> final amount including principal and interest</li>
                            <li><strong>P:</strong> principal amount or initial investment</li>
                            <li><strong>r:</strong> annual interest rate (decimal)</li>
                            <li><strong>n:</strong> compounding frequency per year</li>
                            <li><strong>t:</strong> number of years the money is invested</li>
                        </ul>
                    </div>
                    <p class="text-muted"><strong>Example:</strong> An investor deposits $1,000 into a savings account that offers a 6% annual rate compounded monthly. After 2 years, the calculation would be:</p>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary">A = 1,000 * (1 + 0.06 / 12)^(12 * 2) = $1,127.16</code>
                    </div>

                    <h4 class="fw-bold h5 text-body mt-4 mb-2">Continuous Compounding Formula</h4>
                    <p class="text-muted">Continuously compounding interest represents the mathematical limit that compound interest can reach when compounding occurs an infinite number of times per period. The equation is represented by:</p>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">A = P * e^(r * t)</code>
                    </div>
                    <div class="p-3 bg-light rounded-3 text-muted mb-3">
                        <ul class="list-unstyled mb-0 small text-start">
                            <li><strong>e:</strong> mathematical constant (~2.71828)</li>
                            <li><strong>r:</strong> annual interest rate (decimal)</li>
                            <li><strong>t:</strong> number of years</li>
                        </ul>
                    </div>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">The Rule of 72</h2>
                    <p class="text-muted">The Rule of 72 is a quick shortcut to estimate how long it will take for an investment to double in value, given a fixed annual rate of interest. Divide 72 by the annual rate of interest to get the approximate number of years for doubling:</p>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">Years to Double ≈ 72 / Interest Rate</code>
                    </div>
                    <p class="text-muted">For example, an investment with a 6% fixed interest rate will take approximately <code>72 / 6 = 12 years</code> to double in value.</p>
                    
                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">History of Compound Interest</h2>
                    <p class="text-muted">Ancient texts indicate that compound interest was used in ancient Babylon and Rome as early as 2400 BC. In ancient Roman law, compound interest was heavily regulated and sometimes banned to protect borrowers from predatory lending. In the Florentine merchant guides of the 14th century, compound interest tables were published to aid traders in determining investment growths. In modern finance, compounding remains the absolute baseline for all bank deposits, savings accounts, bonds, and mutual funds calculations.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });

    const pInput = document.getElementById('ci-p-custom');
    const rInput = document.getElementById('ci-r-custom');
    const tInput = document.getElementById('ci-t-custom');
    const nInput = document.getElementById('ci-n-custom');

    const tableBody = document.getElementById('ci-annual-table-body');

    let pieChart = null;
    let barChart = null;

    function calculateCI() {
        const P = parseFloat(pInput.value) || 0;
        const R = parseFloat(rInput.value) || 0;
        const T = parseFloat(tInput.value) || 0;
        const n = parseFloat(nInput.value) || 1;

        const rate = R / 100;
        const amount = P * Math.pow(1 + (rate / n), n * T);
        const interest = Math.max(0, amount - P);

        // Update Text Results
        document.getElementById('res-ci-principal').textContent = formatter.format(P);
        document.getElementById('res-ci-interest').textContent = formatter.format(interest);
        document.getElementById('res-ci-total').textContent = formatter.format(amount);

        // Generate Charts & Schedule
        updateCharts(P, interest, R, T, n);
        generateSchedule(P, R, T, n);
    }

    function updateCharts(P, interest, R, T, n) {
        // Pie Chart
        const pieCtx = document.getElementById('ciPieChartCustom').getContext('2d');
        if (pieChart) pieChart.destroy();
        pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Principal Invested', 'Interest Earned'],
                datasets: [{
                    data: [P, interest],
                    backgroundColor: ['#10b981', '#3b82f6'],
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

        // Bar Chart - Stacked
        const barLabels = [];
        const principalData = [];
        const interestData = [];

        const yearsCount = Math.ceil(T);
        for (let y = 1; y <= yearsCount; y++) {
            barLabels.push(`Yr ${y}`);
            const currentYearT = (y > T) ? T : y;
            const currentMaturity = P * Math.pow(1 + (R / 100) / n, n * currentYearT);
            const currentInterest = Math.max(0, currentMaturity - P);
            
            principalData.push(P);
            interestData.push(currentInterest);
        }

        const barCtx = document.getElementById('ciBarChart').getContext('2d');
        if (barChart) barChart.destroy();
        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [
                    {
                        label: 'Principal Invested',
                        data: principalData,
                        backgroundColor: '#10b981'
                    },
                    {
                        label: 'Interest Earned',
                        data: interestData,
                        backgroundColor: '#3b82f6'
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

    function generateSchedule(P, R, T, n) {
        tableBody.innerHTML = '';
        const yearsCount = Math.ceil(T);
        for (let y = 1; y <= yearsCount; y++) {
            const currentYearT = (y > T) ? T : y;
            const currentMaturity = P * Math.pow(1 + (R / 100) / n, n * currentYearT);
            const currentInterest = Math.max(0, currentMaturity - P);

            const row = document.createElement('tr');
            row.innerHTML = `
                <td><strong>Year ${y}</strong></td>
                <td>${formatter.format(P)}</td>
                <td>${formatter.format(currentInterest)}</td>
                <td class="text-success fw-bold">${formatter.format(currentMaturity)}</td>
            `;
            tableBody.appendChild(row);
        }
    }

    pInput.addEventListener('input', calculateCI);
    rInput.addEventListener('input', calculateCI);
    tInput.addEventListener('input', calculateCI);
    nInput.addEventListener('change', calculateCI);

    // Run first calculation
    calculateCI();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
