<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">SIP Calculator</li>
        </ol>
    </nav>

    <div class="row g-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="card calc-card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="icon-circle bg-success-subtle text-success">
                            <i class="bi bi-graph-up-arrow fs-3"></i>
                        </div>
                        <div>
                            <h1 class="fw-bold h3 mb-1">SIP Calculator</h1>
                            <p class="text-muted small mb-0">Systematic Investment Plan calculator</p>
                        </div>
                    </div>

                    <form id="sip-calculator-form">
                        <!-- Monthly Investment -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <label class="form-label fw-bold mb-0">Monthly Investment</label>
                                <span class="text-primary fw-bold" id="sip-amount-val-custom">₹5,000</span>
                            </div>
                            <input type="range" class="form-range" id="sip-amount-custom" min="500" max="100000" step="500" value="5000">
                            <div class="input-group mt-2">
                                <span class="input-group-text">₹</span>
                                <input type="number" class="form-control" id="sip-amount-input-custom" value="5000" min="500">
                            </div>
                        </div>

                        <!-- Expected Return Rate -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <label class="form-label fw-bold mb-0">Expected Return Rate (p.a.)</label>
                                <span class="text-success fw-bold" id="sip-rate-val-custom">12%</span>
                            </div>
                            <input type="range" class="form-range" id="sip-rate-custom" min="1" max="30" step="0.5" value="12">
                            <div class="input-group mt-2">
                                <input type="number" class="form-control" id="sip-rate-input-custom" value="12" step="0.5" min="1" max="30">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>

                        <!-- Time Period -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-2">
                                <label class="form-label fw-bold mb-0">Time Period</label>
                                <span class="text-warning fw-bold" id="sip-time-val-custom">10 Years</span>
                            </div>
                            <input type="range" class="form-range" id="sip-time-custom" min="1" max="40" step="1" value="10">
                            <div class="input-group mt-2">
                                <input type="number" class="form-control" id="sip-time-input-custom" value="10" min="1" max="40">
                                <span class="input-group-text">Years</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Calculator Results, Charts and Graphs -->
        <div class="col-lg-7">
            <div class="card calc-card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3 text-body">Calculation Summary</h4>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3 text-center">
                                <span class="text-muted d-block small mb-1">Invested Amount</span>
                                <span class="fw-bold fs-5 text-body" id="res-sip-invested">₹0</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3 text-center">
                                <span class="text-muted d-block small mb-1">Est. Returns</span>
                                <span class="fw-bold fs-5 text-success" id="res-sip-returns">₹0</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-success-subtle rounded-3 text-center">
                                <span class="text-success-emphasis d-block small mb-1">Total Value</span>
                                <span class="fw-bold fs-5 text-success" id="res-sip-total">₹0</span>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Representation: Graphs side-by-side or stacked -->
                    <div class="row g-4 align-items-center">
                        <!-- Bar Chart -->
                        <div class="col-md-7">
                            <h6 class="fw-bold text-center mb-2">Yearly Growth Projections</h6>
                            <div style="height: 220px; position: relative;">
                                <canvas id="sipBarChart"></canvas>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-md-5">
                            <h6 class="fw-bold text-center mb-2">Portfolio Split</h6>
                            <div style="height: 180px; position: relative;" class="d-flex justify-content-center">
                                <canvas id="sipPieChartCustom"></canvas>
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
                    <h4 class="fw-bold mb-3 text-body">Annual Wealth Schedule</h4>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hover align-middle mb-0 text-muted">
                            <thead class="table-light text-body sticky-top">
                                <tr>
                                    <th>Year</th>
                                    <th>Invested Amount</th>
                                    <th>Estimated Returns</th>
                                    <th>Total Maturity Value</th>
                                </tr>
                            </thead>
                            <tbody id="sip-annual-table-body">
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is a Systematic Investment Plan (SIP)?</h2>
                    <p class="text-muted">A Systematic Investment Plan (SIP) is a structured investment methodology that allows individuals to invest a fixed sum of money regularly into mutual funds, exchange-traded funds (ETFs), or other investment portfolios. Rather than attempting to "time the market" and invest a large lump sum when prices are perceived to be low, a SIP investor commits to a disciplined approach—typically weekly, monthly, or quarterly. This system is highly favored by retail investors because it democratizes wealth creation, enabling individuals to participate in stock and bond market growth with small, manageable contributions.</p>
                    <p class="text-muted">The two main pillars of SIP investing are <strong>Rupee Cost Averaging</strong> (or Dollar Cost Averaging) and the <strong>Power of Compounding</strong>. Rupee Cost Averaging is a natural defense mechanism against market volatility. Because the investment amount is fixed, the calculator automatically buys more units of a mutual fund when the Net Asset Value (NAV) is low, and fewer units when the NAV is high. Over long horizons, this averages out the cost of acquisition per unit, often yielding better risk-adjusted returns than trying to pick market bottoms.</p>
                    <p class="text-muted">Compounding represents the mathematical process where the returns generated by an investment are reinvested to generate their own returns. In a SIP, as you purchase more mutual fund units, any dividend payouts or capital gains increase the underlying value of your holdings. Over a 10, 20, or 30-year period, this compounding effect operates on an exponential curve. Early on, the growth appears linear, but in the latter stages of the tenure, the accumulated interest begins to dwarf the total principal invested.</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">The SIP Maturity Formula: Annuity Due</h2>
                    <p class="text-muted">Since SIP contributions are typically paid at the beginning of each monthly interval, they are mathematically calculated using the future value of an ordinary annuity due. The mathematical formula is represented as follows:</p>
                    
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-success fs-5">M = P * [((1 + i)^n - 1) / i] * (1 + i)</code>
                    </div>
                    
                    <div class="p-3 bg-light rounded-3 text-muted mb-3">
                        <ul class="list-unstyled mb-0 small text-start">
                            <li><strong>M:</strong> Maturity amount (the future value of all periodic investments)</li>
                            <li><strong>P:</strong> Periodic investment amount paid per month</li>
                            <li><strong>i:</strong> Periodic (monthly) expected return rate (Annual return rate / 12 / 100)</li>
                            <li><strong>n:</strong> Total number of compounding periods or monthly installments (Years * 12)</li>
                        </ul>
                    </div>

                    <h4 class="fw-bold h5 text-body mt-4 mb-2">Step-by-Step SIP Calculation Example</h4>
                    <p class="text-muted">Let us compute the maturity value of a monthly SIP of ₹5,000 at a 12% p.a. expected return rate for a tenure of 10 years:</p>
                    <div class="p-3 bg-light rounded-3 mb-3">
                        <pre class="mb-0"><code class="text-primary fw-bold">Step 1: Convert the annual interest rate to monthly decimal rate (i)
i = 12% / 12 / 100 = 0.01 per month

Step 2: Determine the total number of monthly payments (n)
n = 10 years * 12 months/year = 120 payments

Step 3: Plug values into the formula
M = 5,000 * [((1 + 0.01)^120 - 1) / 0.01] * (1 + 0.01)

Step 4: Compute the growth factor (1.01)^120
(1.01)^120 ≈ 3.30038689

Step 5: Apply the annuity formula components
M = 5,000 * [(3.30038689 - 1) / 0.01] * 1.01
M = 5,000 * [2.30038689 / 0.01] * 1.01
M = 5,000 * 230.038689 * 1.01
M = 1,150,193.45 * 1.01 ≈ ₹1,161,695

Maturity Analysis:
- Total Invested Capital = ₹5,000 * 120 = ₹600,000
- Total Estimated Returns = ₹1,161,695 - ₹600,000 = ₹561,695</code></pre>
                    </div>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Strategic SIP Rules: The 15-15-15 Rule</h2>
                    <p class="text-muted">Financial planners often use the **15-15-15 Rule** to illustrate the long-term wealth potential of compounding to young investors. The rule states that:</p>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-success fs-5">₹15,000 Monthly SIP @ 15% rate of return for 15 Years = ₹1 Crore (~₹10 Million)</code>
                    </div>
                    <p class="text-muted">Under this scenario, the investor contributes a total principal of ₹27 Lakhs (₹2.7 Million), while the accumulated compound returns yield an additional ₹73 Lakhs (₹7.3 Million), making the total portfolio value reach ₹1 Crore. If the investor leaves the portfolio to compound for another 15 years (total 30 years) without increasing the monthly payment, the final corpus grows to over ₹9 Crores (₹90 Million) due to the steepening compounding curve.</p>
                    
                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">SIP Variations: Step-Up SIPs</h2>
                    <p class="text-muted">To maximize financial planning, investors can utilize several advanced SIP features:</p>
                    <ul class="text-muted">
                        <li><strong>Step-Up (Top-Up) SIP:</strong> Allows you to automatically increase your monthly investment by a fixed percentage or amount every year (e.g., matching a 10% annual salary hike). This significantly accelerates the time required to reach your financial goals.</li>
                        <li><strong>Flexible SIP:</strong> Allows investors to alter the monthly contribution amount based on their cash flow or market valuation indicators.</li>
                        <li><strong>Trigger SIP:</strong> Executes transactions when specific market indices reach pre-set levels, taking advantage of short-term market drops.</li>
                    </ul>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Historical Context: Benjamin Graham and Dollar Cost Averaging</h2>
                    <p class="text-muted">The philosophy of periodic mechanical investing was popularized by the legendary investor and economist Benjamin Graham, often referred to as the "father of value investing." In his classic 1949 book, <i>The Intelligent Investor</i>, Graham introduced "Dollar Cost Averaging," noting that "no matter how the market behaves, the investor who buys stock systematically will obtain satisfactory results." In India, the Systematic Investment Plan (SIP) was formally introduced in the late 1990s by the Association of Mutual Funds in India (AMFI) and has since transformed household savings from traditional physical assets like gold and real estate into financial markets.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });

    const amtRange = document.getElementById('sip-amount-custom');
    const amtInput = document.getElementById('sip-amount-input-custom');
    const amtVal = document.getElementById('sip-amount-val-custom');

    const rateRange = document.getElementById('sip-rate-custom');
    const rateInput = document.getElementById('sip-rate-input-custom');
    const rateVal = document.getElementById('sip-rate-val-custom');

    const timeRange = document.getElementById('sip-time-custom');
    const timeInput = document.getElementById('sip-time-input-custom');
    const timeVal = document.getElementById('sip-time-val-custom');

    const tableBody = document.getElementById('sip-annual-table-body');

    let pieChart = null;
    let barChart = null;

    function calculateSIP() {
        const P = parseFloat(amtInput.value) || 0;
        const annualRate = parseFloat(rateInput.value) || 0;
        const years = parseFloat(timeInput.value) || 0;

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

        // Update Text Results
        document.getElementById('res-sip-invested').textContent = formatter.format(totalInvested);
        document.getElementById('res-sip-returns').textContent = formatter.format(estReturns);
        document.getElementById('res-sip-total').textContent = formatter.format(maturityValue);

        // Generate Charts & Schedule
        updateCharts(totalInvested, estReturns, P, monthlyRate, years);
        generateSchedule(P, monthlyRate, years);
    }

    function updateCharts(invested, returns, P, monthlyRate, years) {
        // Pie Chart
        const pieCtx = document.getElementById('sipPieChartCustom').getContext('2d');
        if (pieChart) pieChart.destroy();
        pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Invested Amount', 'Est. Returns'],
                datasets: [{
                    data: [invested, returns],
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

        // Bar Chart - Stacked (Cumulative Invested vs Cumulative Value)
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

        const barCtx = document.getElementById('sipBarChart').getContext('2d');
        if (barChart) barChart.destroy();
        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [
                    {
                        label: 'Invested Capital',
                        data: investedData,
                        backgroundColor: '#10b981'
                    },
                    {
                        label: 'Estimated Returns',
                        data: returnsData,
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

    function generateSchedule(P, monthlyRate, years) {
        tableBody.innerHTML = '';
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

            const row = document.createElement('tr');
            row.innerHTML = `
                <td><strong>Year ${y}</strong></td>
                <td>${formatter.format(cumInvested)}</td>
                <td>${formatter.format(cumReturns)}</td>
                <td class="text-success fw-bold">${formatter.format(cumMaturity)}</td>
            `;
            tableBody.appendChild(row);
        }
    }

    // Connect slider + input bindings
    function setupBinding(rangeEl, inputEl, valEl, suffix) {
        rangeEl.addEventListener('input', (e) => {
            inputEl.value = e.target.value;
            valEl.textContent = rangeEl.value + suffix;
            calculateSIP();
        });
        inputEl.addEventListener('input', (e) => {
            rangeEl.value = e.target.value;
            valEl.textContent = rangeEl.value + suffix;
            calculateSIP();
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
    setupBinding(timeRange, timeInput, timeVal, ' Years');

    // Run first calculation
    amtVal.textContent = formatter.format(amtRange.value);
    calculateSIP();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
