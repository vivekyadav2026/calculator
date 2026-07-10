<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Simple Interest Calculator</li>
        </ol>
    </nav>
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-2">Simple Interest Calculator</h1>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Simple Interest Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">Ãƒâ€”</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    <form id="si-calculator-form">
                        <!-- Principal Amount -->
                        <div class="mb-3">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Principal Amount (P)</label>
                            <div class="input-group input-group-sm mt-1">
                                <span class="input-group-text bg-light border-secondary-subtle">Ã¢â€šÂ¹</span>
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="si-p-custom" value="10000" min="0" required>
                            </div>
                        </div>

                        <!-- Rate of Interest -->
                        <div class="mb-3">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Rate of Interest (R) % p.a.</label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="si-r-custom" value="6" step="0.1" min="0" required>
                                <span class="input-group-text bg-light border-secondary-subtle">%</span>
                            </div>
                        </div>

                        <!-- Time Period -->
                        <div class="mb-3">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Time Period (T) in Years</label>
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="si-t-custom" value="5" step="0.5" min="0.1" required>
                                <span class="input-group-text bg-light border-secondary-subtle">Years</span>
                            </div>
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
                        <span class="literal-calc-icon">Ãƒâ€”</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    
                    <div class="row g-2 mb-3">
                        <div class="col-md-4">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Principal Amount</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main  fs-5 text-end" id="res-si-principal">Ã¢â€šÂ¹0</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Interest Earned</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-success fs-5 text-end" id="res-si-interest">Ã¢â€šÂ¹0</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Total Value</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0; background-color: #f8f9ff;">
                                <div class="literal-display-main text-primary fs-5 text-end" id="res-si-total">Ã¢â€šÂ¹0</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Representation: Graphs side-by-side or stacked -->
                    <div class="row g-2 mt-2">
                        <!-- Bar Chart -->
                        <div class="col-md-7 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd; border-right: none;">
                            <h6 class="fw-bold text-center mb-1 " style="font-size: 0.8rem;">Growth Projections</h6>
                            <div style="height: 150px; position: relative;">
                                <canvas id="siBarChart"></canvas>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-md-5 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd;">
                            <h6 class="fw-bold text-center mb-1 " style="font-size: 0.8rem;">Portfolio Split</h6>
                            <div style="height: 150px; position: relative;" class="d-flex justify-content-center">
                                <canvas id="siPieChartCustom"></canvas>
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
                    <h4 class="fw-bold mb-3 text-body">Annual Interest Schedule</h4>
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
                            <tbody id="si-annual-table-body">
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is Simple Interest?</h2>
                    <p class="text-muted">Simple interest is a fundamental, linear method of calculating the interest charge on a loan or the investment returns on a deposit. Unlike compound interest, which calculates interest on both the principal and the accumulated interest from previous periods, simple interest is calculated <strong>solely on the original principal amount</strong>. This means the interest payment remains constant throughout the entire life of the transaction, assuming the interest rate and principal balance do not change. Simple interest is typically used for short-term financial instruments, consumer loans (such as auto loans and student loans), and treasury bills.</p>
                    <p class="text-muted">The main characteristic of simple interest is its linear growth pattern. For example, if you invest $1,000 at a simple interest rate of 5% per year, you will earn exactly $50 in interest every single year. After ten years, your total interest earned is $500. This is highly predictable and makes simple interest loans easier to understand and manage. However, for long-term investments, simple interest lacks the compounding velocity that allows portfolios to grow exponentially, which is why savings accounts and retirement funds almost exclusively use compound interest.</p>
                    <p class="text-muted">When dealing with loans, simple interest is often computed daily. Under this setup, the daily interest charge is determined by dividing the annual interest rate by the number of days in a year and multiplying that by the outstanding principal. As the borrower makes payments that reduce the principal, the interest portion of subsequent payments decreases, while the portion allocated to the principal increases. This is similar to amortization, but without the compounding elements found in mortgages.</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Simple Interest Formulas and Examples</h2>
                    <p class="text-muted">Calculating simple interest involves two primary formulas: one to find the interest component alone, and another to determine the final total maturity value (Principal + Interest).</p>
                    
                    <h4 class="fw-bold h5 text-body mt-4 mb-2">1. Formula for Interest Amount (I)</h4>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">I = (P * R * T) / 100</code>
                    </div>

                    <h4 class="fw-bold h5 text-body mt-4 mb-2">2. Formula for Total Maturity Value (A)</h4>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">A = P * (1 + (R * T) / 100)</code>
                    </div>
                    
                    <div class="p-3 bg-light rounded-3 text-muted mb-3">
                        <ul class="list-unstyled mb-0 small text-start">
                            <li><strong>P:</strong> Principal sum of money (initial loan or deposit amount)</li>
                            <li><strong>R:</strong> Annual interest rate expressed as a percentage (e.g., 6% p.a. means R = 6)</li>
                            <li><strong>T:</strong> Time duration in years. For periods of months, <code>T = Months / 12</code>. For days, <code>T = Days / 365</code>.</li>
                        </ul>
                    </div>

                    <h4 class="fw-bold h5 text-body mt-4 mb-2">Step-by-Step Calculation Example</h4>
                    <p class="text-muted"><strong>Scenario:</strong> You deposit $10,000 into a fixed deposit offering a 6% annual simple interest rate for 3 years. Let us calculate the interest and total value:</p>
                    <div class="p-3 bg-light rounded-3 mb-3">
                        <pre class="mb-0"><code class="text-primary fw-bold">Step 1: Identify the variables
P = $10,000
R = 6
T = 3 years

Step 2: Calculate the Simple Interest (I)
I = (10,000 * 6 * 3) / 100
I = 180,000 / 100 = $1,800

Step 3: Calculate the Total Maturity Value (A)
A = Principal + Interest
A = $10,000 + $1,800 = $11,800</code></pre>
                    </div>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Variations: Exact vs. Ordinary Simple Interest</h2>
                    <p class="text-muted">In commercial banking and finance, two distinct methods are used to define the time factor (T) when calculating interest for partial years:</p>
                    <ul class="text-muted">
                        <li><strong>Exact Simple Interest (365-Day Rule):</strong> Calculates interest using the exact calendar days (365 days in a normal year, 366 in a leap year). This method is widely used by government institutions and for treasury bonds.</li>
                        <li><strong>Ordinary Simple Interest (Banker's Rule / 360-Day Rule):</strong> Assumes every calendar month has exactly 30 days and the year has 360 days. Historically developed to simplify manual arithmetic before the advent of computers, it is still used in many commercial banks because it results in slightly higher daily interest charges, benefiting the lender:
                            <div class="p-2 bg-light rounded-3 text-center my-2">
                                <code class="fw-bold text-danger">Daily Interest Factor (Ordinary) = R / 360 &gt; Daily Interest Factor (Exact) = R / 365</code>
                            </div>
                        </li>
                    </ul>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Historical Origins and Usury Laws</h2>
                    <p class="text-muted">Simple interest is one of the oldest recorded mathematical concepts in human civilization. In ancient Mesopotamia, around 2400 BC, clay tablets reveal that simple interest was computed on loans of seeds, grains, and silver, often capped by regulations such as the famous Code of Hammurabi (circa 1750 BC). Under Hammurabi's code, interest rates were restricted to 33.3% on grain loans and 20% on silver loans. In medieval Europe, the Roman Catholic Church enforced strict bans on usury (charging any interest on loans), arguing that charging for time was unnatural. To bypass these restrictions, merchants developed contracts where they charged fees for the risk of loss (<i>interesse</i>), which eventually evolved into modern, legally sanctioned simple and compound interest systems.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });

    const pInput = document.getElementById('si-p-custom');
    const rInput = document.getElementById('si-r-custom');
    const tInput = document.getElementById('si-t-custom');

    const tableBody = document.getElementById('si-annual-table-body');

    let pieChart = null;
    let barChart = null;

    function calculateSI() {
        const P = parseFloat(pInput.value) || 0;
        const R = parseFloat(rInput.value) || 0;
        const T = parseFloat(tInput.value) || 0;

        const interest = (P * R * T) / 100;
        const total = P + interest;

        // Update Text Results
        document.getElementById('res-si-principal').textContent = formatter.format(P);
        document.getElementById('res-si-interest').textContent = formatter.format(interest);
        document.getElementById('res-si-total').textContent = formatter.format(total);

        // Generate Charts & Schedule
        updateCharts(P, interest, R, T);
        generateSchedule(P, R, T);
    }

    function updateCharts(P, interest, R, T) {
        // Pie Chart
        const pieCtx = document.getElementById('siPieChartCustom').getContext('2d');
        if (pieChart) pieChart.destroy();
        pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Principal Amount', 'Interest Earned'],
                datasets: [{
                    data: [P, interest],
                    backgroundColor: ['#4f46e5', '#ec4899'],
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

        // Bar Chart - Stacked (Cumulative values over the years)
        const barLabels = [];
        const principalData = [];
        const interestData = [];

        // Round up to calculate for whole years
        const yearsCount = Math.ceil(T);
        for (let y = 1; y <= yearsCount; y++) {
            barLabels.push(`Yr ${y}`);
            // Simple interest is linear, earned equally per year
            const currentYearT = (y > T) ? T : y;
            const yearInterest = (P * R * currentYearT) / 100;
            principalData.push(P);
            interestData.push(yearInterest);
        }

        const barCtx = document.getElementById('siBarChart').getContext('2d');
        if (barChart) barChart.destroy();
        barChart = new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [
                    {
                        label: 'Principal Amount',
                        data: principalData,
                        backgroundColor: '#4f46e5'
                    },
                    {
                        label: 'Interest Earned',
                        data: interestData,
                        backgroundColor: '#ec4899'
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

    function generateSchedule(P, R, T) {
        tableBody.innerHTML = '';
        const yearsCount = Math.ceil(T);
        for (let y = 1; y <= yearsCount; y++) {
            const currentYearT = (y > T) ? T : y;
            const yearInterest = (P * R * currentYearT) / 100;
            const totalBalance = P + yearInterest;

            const row = document.createElement('tr');
            row.innerHTML = `
                <td><strong>Year ${y}</strong></td>
                <td>${formatter.format(P)}</td>
                <td>${formatter.format(yearInterest)}</td>
                <td class="text-primary fw-bold">${formatter.format(totalBalance)}</td>
            `;
            tableBody.appendChild(row);
        }
    }

    pInput.addEventListener('input', calculateSI);
    rInput.addEventListener('input', calculateSI);
    tInput.addEventListener('input', calculateSI);

    // Run first calculation
    calculateSI();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
