<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">FD Calculator</li>
        </ol>
    </nav>

    <div class="row g-4 mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">FD Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    <form id="fd-calculator-form">
                        <!-- Deposit Amount -->
                        <div class="mb-3">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Deposit Amount</label>
                            <div class="input-group input-group-sm mt-1">
                                <span class="input-group-text bg-light border-secondary-subtle">₹</span>
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="fd-p-custom" value="100000" min="0" required>
                            </div>
                        </div>

                        <!-- Interest Rate -->
                        <div class="mb-3">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Rate of Interest (%)</label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="fd-r-custom" value="7" step="0.1" min="0" required>
                                <span class="input-group-text bg-light border-secondary-subtle">%</span>
                            </div>
                        </div>

                        <!-- Time Period -->
                        <div class="mb-3">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Time Period</label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="fd-t-custom" value="5" step="1" min="1" required>
                                <select class="form-select bg-light border-secondary-subtle" id="fd-t-type-custom" style="max-width: 120px;">
                                    <option value="years" selected>Years</option>
                                    <option value="months">Months</option>
                                    <option value="days">Days</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Calculator Results & Graphs -->
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
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Invested Amount</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-dark fs-5 text-end" id="res-fd-principal">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Interest Earned</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-success fs-5 text-end" id="res-fd-interest">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Maturity Value</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0; background-color: #f8f9ff;">
                                <div class="literal-display-main text-warning fs-5 text-end" id="res-fd-total">₹0</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Representation: Graphs side-by-side or stacked -->
                    <div class="row g-2 mt-2">
                        <!-- Bar Chart -->
                        <div class="col-md-7 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd; border-right: none;">
                            <h6 class="fw-bold text-center mb-1 text-dark" style="font-size: 0.8rem;">Maturity Projection</h6>
                            <div style="height: 150px; position: relative;">
                                <canvas id="fdBarChart"></canvas>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-md-5 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd;">
                            <h6 class="fw-bold text-center mb-1 text-dark" style="font-size: 0.8rem;">Investment Split</h6>
                            <div style="height: 150px; position: relative;" class="d-flex justify-content-center">
                                <canvas id="fdPieChartCustom"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Annual Schedule Table -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-3 text-body">Maturity Schedule (Yearly)</h4>
                    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hover align-middle mb-0 text-muted">
                            <thead class="table-light text-body sticky-top">
                                <tr>
                                    <th>Year</th>
                                    <th>Principal Amount</th>
                                    <th>Interest Accumulated</th>
                                    <th>Total Balance</th>
                                </tr>
                            </thead>
                            <tbody id="fd-annual-table-body">
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">Understanding Fixed Deposits (FD)</h2>
                    <p class="text-muted">A Fixed Deposit (FD) is a financial instrument provided by banks or non-banking financial companies (NBFCs) which offers investors a higher rate of interest than a regular savings account, until a given maturity date. FDs are highly secure, risk-free investments.</p>
                    <p class="text-muted">Most commercial banks calculate FD returns using quarterly compounding interest. This means interest earned is added back to your principal balance every three months, so you earn interest on your interest during the tenure. This compounding rate yields a higher effective return compared to simple interest options.</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">FD Compounding Formula</h2>
                    <p class="text-muted">The mathematical formula to determine the maturity amount of a quarterly compounding Fixed Deposit is:</p>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">A = P * (1 + R / 400)^(4 * N)</code>
                    </div>
                    <ul class="text-muted text-start">
                        <li><strong>A:</strong> Maturity amount of the deposit</li>
                        <li><strong>P:</strong> Principal investment amount</li>
                        <li><strong>R:</strong> Rate of interest (%) per annum</li>
                        <li><strong>N:</strong> Total number of quarters (e.g. 5 years = 20 quarters)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });

    const pInput = document.getElementById('fd-p-custom');
    const rInput = document.getElementById('fd-r-custom');
    const tInput = document.getElementById('fd-t-custom');
    const tType = document.getElementById('fd-t-type-custom');

    const tableBody = document.getElementById('fd-annual-table-body');

    let pieChart = null;
    let barChart = null;

    function calculateFD() {
        const P = parseFloat(pInput.value) || 0;
        const R = parseFloat(rInput.value) || 0;
        let T = parseFloat(tInput.value) || 0;
        const type = tType.value;

        let years = T;
        if (type === 'months') {
            years = T / 12;
        } else if (type === 'days') {
            years = T / 365;
        }

        // Quarterly compounding is standard for FD: n = 4
        const rate = R / 100;
        const maturity = P * Math.pow(1 + rate / 4, 4 * years);
        const interest = Math.max(0, maturity - P);

        // Update Text Results
        document.getElementById('res-fd-principal').textContent = formatter.format(P);
        document.getElementById('res-fd-interest').textContent = formatter.format(interest);
        document.getElementById('res-fd-total').textContent = formatter.format(maturity);

        // Generate Charts & Schedule
        updateCharts(P, interest, R, years);
        generateSchedule(P, R, years);
    }

    function updateCharts(P, interest, R, years) {
        // Pie Chart
        const pieCtx = document.getElementById('fdPieChartCustom').getContext('2d');
        if (pieChart) pieChart.destroy();
        pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Principal Invested', 'Interest Earned'],
                datasets: [{
                    data: [P, interest],
                    backgroundColor: ['#eab308', '#3b82f6'],
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

        const yearsCount = Math.ceil(years);
        for (let y = 1; y <= yearsCount; y++) {
            barLabels.push(`Yr ${y}`);
            const currentYearT = (y > years) ? years : y;
            const currentMaturity = P * Math.pow(1 + (R/100)/4, 4 * currentYearT);
            const currentInterest = Math.max(0, currentMaturity - P);
            
            principalData.push(P);
            interestData.push(currentInterest);
        }

        const barCtx = document.getElementById('fdBarChart').getContext('2d');
        if (barChart) barChart.destroy();
        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [
                    {
                        label: 'Principal Invested',
                        data: principalData,
                        backgroundColor: '#eab308'
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

    function generateSchedule(P, R, years) {
        tableBody.innerHTML = '';
        const yearsCount = Math.ceil(years);
        for (let y = 1; y <= yearsCount; y++) {
            const currentYearT = (y > years) ? years : y;
            const currentMaturity = P * Math.pow(1 + (R/100)/4, 4 * currentYearT);
            const currentInterest = Math.max(0, currentMaturity - P);

            const row = document.createElement('tr');
            row.innerHTML = `
                <td><strong>Year ${y}</strong></td>
                <td>${formatter.format(P)}</td>
                <td>${formatter.format(currentInterest)}</td>
                <td class="text-warning-emphasis fw-bold">${formatter.format(currentMaturity)}</td>
            `;
            tableBody.appendChild(row);
        }
    }

    pInput.addEventListener('input', calculateFD);
    rInput.addEventListener('input', calculateFD);
    tInput.addEventListener('input', calculateFD);
    tType.addEventListener('change', calculateFD);

    // Run first calculation
    calculateFD();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
