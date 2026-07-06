<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Indian Income Tax Calculator</li>
        </ol>
    </nav>

    <div class="row g-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-6">
            <div class="card calc-card shadow-sm border-0 h-100">
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="icon-circle bg-info-subtle text-info">
                            <i class="bi bi-file-earmark-text fs-3"></i>
                        </div>
                        <div>
                            <h1 class="fw-bold h2 mb-1">Income Tax Calculator</h1>
                            <p class="text-muted small mb-0">Compare Indian New vs. Old Tax Regimes (FY 2023-24)</p>
                        </div>
                    </div>

                    <form id="india-tax-form">
                        <!-- Age Category & Financial Year -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-body">Age Category</label>
                                <select class="form-select border-2" id="tax-age-category">
                                    <option value="individual" selected>Individual (&lt; 60 Years)</option>
                                    <option value="senior">Senior Citizen (60–80 Years)</option>
                                    <option value="super-senior">Super Senior Citizen (&gt; 80 Years)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-body">Financial Year</label>
                                <select class="form-select border-2" id="tax-year">
                                    <option value="2023" selected>FY 2023-24 (AY 2024-25)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Income Details Section -->
                        <div class="p-3 bg-light rounded-4 border mb-4">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <i class="bi bi-cash-stack text-success fs-5"></i>
                                <span class="fw-bold text-body">Income Details</span>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Gross Salary / Wages</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-salary" value="1200000" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Income from House Property (Rent)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-house-rent" value="0" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Interest Income (FD/Savings)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-interest" value="15000" min="0">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Capital Gains</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-capgains" value="0" min="0">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-semibold text-muted">Other Income (Business, Freelance, etc.)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-other" value="0" min="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Deductions & Exemptions (Mainly Old Regime) -->
                        <div class="p-3 bg-light rounded-4 border mb-4">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <i class="bi bi-shield-check text-primary fs-5"></i>
                                <span class="fw-bold text-body">Deductions (Old Regime)</span>
                            </div>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Section 80C Investments</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-80c" value="150000" placeholder="Max ₹1,50,000" min="0" max="150000">
                                    </div>
                                    <div class="form-text extra-small">PPF, EPF, LIC, ELSS, Home Principal</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Section 80D (Health Insurance)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-80d" value="25000" placeholder="e.g. ₹25,000" min="0">
                                    </div>
                                    <div class="form-text extra-small">Mediclaim premiums</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">HRA Exemption Claimed</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-hra" value="120000" placeholder="Rent Exemption" min="0">
                                    </div>
                                    <div class="form-text extra-small">House Rent Allowance exemption</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Home Loan Interest (Sec 24b)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-interest-24b" value="0" placeholder="Max ₹2,00,000" min="0">
                                    </div>
                                    <div class="form-text extra-small">Interest on self-occupied house</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Education Loan (Sec 80E)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-80e" value="0" min="0">
                                    </div>
                                    <div class="form-text extra-small">Interest paid on study loan</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-muted">Other Deductions (Sec 80G, NPS, etc.)</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" class="form-control" id="tax-other-deductions" value="0" min="0">
                                    </div>
                                    <div class="form-text extra-small">Donations, NPS, savings interest</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-info btn-lg text-white rounded-pill fw-bold px-5 shadow-sm">Calculate</button>
                            <button type="reset" class="btn btn-outline-secondary btn-lg rounded-pill px-4" id="btn-reset-tax">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Calculator Results -->
        <div class="col-lg-6">
            <div class="card calc-card shadow-sm border-0 h-100 bg-white">
                <div class="card-body p-4 p-md-5 d-flex flex-column justify-content-between">
                    <div>
                        <h4 class="fw-bold mb-4 text-body border-bottom pb-2">Tax Comparison Result</h4>
                        
                        <!-- Side by Side Regimes -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 border-2 border-info bg-info-subtle text-center position-relative overflow-hidden">
                                    <div class="position-absolute top-0 end-0 bg-info text-white px-2 py-1 small rounded-bottom-start fw-bold">Default</div>
                                    <span class="text-info-emphasis fw-bold d-block small mb-2">NEW REGIME TAX</span>
                                    <h3 class="fw-bold text-info mb-1" id="res-tax-new">₹0</h3>
                                    <span class="text-muted extra-small">with standard deduction</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-4 rounded-4 border-2 border-warning bg-warning-subtle text-center">
                                    <span class="text-warning-emphasis fw-bold d-block small mb-2">OLD REGIME TAX</span>
                                    <h3 class="fw-bold text-warning-emphasis mb-1" id="res-tax-old">₹0</h3>
                                    <span class="text-muted extra-small">after entered deductions</span>
                                </div>
                            </div>
                        </div>

                        <!-- Savings Recommendation Box -->
                        <div class="alert alert-success border-0 rounded-4 p-3 d-none align-items-center gap-3 mb-4" id="tax-recommendation-box">
                            <div class="icon-circle bg-success text-white small shadow-sm">
                                <i class="bi bi-patch-check-fill fs-5"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-success-emphasis d-block" id="tax-rec-title">Regime Recommendation</span>
                                <span class="text-muted small" id="tax-rec-desc">Calculating...</span>
                            </div>
                        </div>

                        <!-- Key Figures Table -->
                        <div class="list-group list-group-flush mb-4">
                            <div class="list-group-item d-flex justify-content-between align-items-center py-2 bg-transparent border-0 px-0">
                                <span class="text-muted">Total Gross Income</span>
                                <span class="fw-semibold text-body" id="res-gross-income">₹0</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center py-2 bg-transparent border-0 px-0">
                                <span class="text-muted">Standard Deduction</span>
                                <span class="fw-semibold text-danger">₹50,000</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center py-2 bg-transparent border-0 px-0">
                                <span class="text-muted">Old Regime Deductions Claimed</span>
                                <span class="fw-semibold text-danger" id="res-old-deductions">₹0</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center py-2 bg-transparent border-0 px-0">
                                <span class="text-muted">Net Taxable Income (New Regime)</span>
                                <span class="fw-bold text-body" id="res-taxable-new">₹0</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between align-items-center py-2 bg-transparent border-0 px-0">
                                <span class="text-muted">Net Taxable Income (Old Regime)</span>
                                <span class="fw-bold text-body" id="res-taxable-old">₹0</span>
                            </div>
                        </div>

                        <!-- Bracket Breakdown Table for New Regime -->
                        <h6 class="fw-bold mb-2 text-body">New Regime – Slab Calculations</h6>
                        <div class="table-responsive rounded-3 border">
                            <table class="table table-hover align-middle mb-0 small text-muted">
                                <thead class="table-light text-body">
                                    <tr>
                                        <th>Tax Slab</th>
                                        <th>Rate</th>
                                        <th class="text-end">Tax Amount</th>
                                    </tr>
                                </thead>
                                <tbody id="tax-slab-breakdown-body">
                                    <!-- Dynamic Rows -->
                                </tbody>
                                <tfoot class="table-light fw-bold text-body">
                                    <tr>
                                        <td colspan="2">Sub-total Tax (New Regime)</td>
                                        <td class="text-end" id="tax-subtotal-new">₹0</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Health &amp; Education Cess (4%)</td>
                                        <td class="text-end text-danger" id="tax-cess-new">₹0</td>
                                    </tr>
                                    <tr class="table-info">
                                        <td colspan="2">Net Tax Payable (New Regime)</td>
                                        <td class="text-end text-primary fs-6" id="tax-net-new">₹0</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===================== EDUCATIONAL CONTENT ===================== -->
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="card shadow-none border rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is Income Tax?</h2>
                    <p class="text-muted">Income tax is a direct tax levied by the government on the income earned by individuals, Hindu Undivided Families (HUFs), companies, firms, and other entities within a financial year. In India, income tax is administered by the Central Board of Direct Taxes (CBDT) under the authority of the Income Tax Act, 1961. It is one of the largest sources of revenue for the Indian government, alongside Goods and Services Tax (GST). The tax collected is used to fund public infrastructure, national defense, social welfare schemes, healthcare, and education.</p>
                    <p class="text-muted">Income for the purposes of taxation is classified under five distinct heads under the Income Tax Act: (1) Salary Income — remuneration received from an employer, including allowances, perquisites, and benefits; (2) Income from House Property — rent received from owned properties, reduced by the municipal taxes paid and a standard deduction of 30%; (3) Profits and Gains from Business or Profession — net profits earned from any trade, commerce, or professional service; (4) Capital Gains — profits realized from the transfer or sale of capital assets like stocks, mutual funds, real estate, or gold; and (5) Income from Other Sources — interest income, dividend income, lottery winnings, and other residual income that doesn't fall under any previous category.</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">New Tax Regime vs. Old Tax Regime</h2>
                    <p class="text-muted">Since Budget 2020, the Indian government introduced a new optional tax regime offering lower slab rates but eliminating most deductions and exemptions. From FY 2023-24 (Assessment Year 2024-25), as announced in Budget 2023, the New Tax Regime has been made the <strong>default regime</strong>. Taxpayers must now explicitly opt out and file a declaration to choose the Old Regime. The following detailed comparison clarifies the key differences:</p>

                    <div class="table-responsive mb-4">
                        <table class="table table-bordered text-muted">
                            <thead class="table-light text-body">
                                <tr>
                                    <th>Feature</th>
                                    <th>New Tax Regime (Default)</th>
                                    <th>Old Tax Regime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tax Slab Rates</td>
                                    <td>Lower (5%, 10%, 15%, 20%, 30%)</td>
                                    <td>Higher (5%, 20%, 30%)</td>
                                </tr>
                                <tr>
                                    <td>Standard Deduction</td>
                                    <td>₹50,000 (from FY 2023-24)</td>
                                    <td>₹50,000</td>
                                </tr>
                                <tr>
                                    <td>Section 80C Deductions</td>
                                    <td class="text-danger">Not Allowed</td>
                                    <td class="text-success">Allowed (up to ₹1.5 Lakh)</td>
                                </tr>
                                <tr>
                                    <td>HRA Exemption</td>
                                    <td class="text-danger">Not Allowed</td>
                                    <td class="text-success">Allowed</td>
                                </tr>
                                <tr>
                                    <td>Section 80D – Health Insurance</td>
                                    <td class="text-danger">Not Allowed</td>
                                    <td class="text-success">Allowed (up to ₹25,000–₹50,000)</td>
                                </tr>
                                <tr>
                                    <td>Home Loan Interest (Sec 24b)</td>
                                    <td class="text-danger">Not Allowed (self-occupied)</td>
                                    <td class="text-success">Allowed (up to ₹2 Lakh)</td>
                                </tr>
                                <tr>
                                    <td>Section 87A Tax Rebate</td>
                                    <td>Up to ₹7,0,000 (Zero Tax)</td>
                                    <td>Up to ₹5,0,000 (Zero Tax)</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">New Tax Regime – Slab Rates (FY 2023-24)</h2>
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered text-muted">
                            <thead class="table-light text-body">
                                <tr>
                                    <th>Annual Income Slab</th>
                                    <th>Tax Rate</th>
                                    <th>Tax on Full Slab Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Up to ₹3,00,000</td><td>0%</td><td>Nil</td></tr>
                                <tr><td>₹3,00,001 – ₹6,00,000</td><td>5%</td><td>₹15,000</td></tr>
                                <tr><td>₹6,00,001 – ₹9,00,000</td><td>10%</td><td>₹30,000</td></tr>
                                <tr><td>₹9,00,001 – ₹12,00,000</td><td>15%</td><td>₹45,000</td></tr>
                                <tr><td>₹12,00,001 – ₹15,00,000</td><td>20%</td><td>₹60,000</td></tr>
                                <tr><td>Above ₹15,00,000</td><td>30%</td><td>30% on amount above ₹15 Lakh</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });

    const taxForm = document.getElementById('india-tax-form');
    const resetBtn = document.getElementById('btn-reset-tax');

    function calculateIndiaTax(e) {
        if(e) e.preventDefault();

        // Inputs
        const ageCategory = document.getElementById('tax-age-category').value;
        const salary = parseFloat(document.getElementById('tax-salary').value) || 0;
        const houseRent = parseFloat(document.getElementById('tax-house-rent').value) || 0;
        const interest = parseFloat(document.getElementById('tax-interest').value) || 0;
        const capGains = parseFloat(document.getElementById('tax-capgains').value) || 0;
        const otherIncome = parseFloat(document.getElementById('tax-other').value) || 0;

        // Deductions (Old Regime)
        const ded80c = Math.min(parseFloat(document.getElementById('tax-80c').value) || 0, 150000);
        const ded80d = parseFloat(document.getElementById('tax-80d').value) || 0;
        const hra = parseFloat(document.getElementById('tax-hra').value) || 0;
        const interest24b = parseFloat(document.getElementById('tax-interest-24b').value) || 0;
        const ded80e = parseFloat(document.getElementById('tax-80e').value) || 0;
        const otherDeds = parseFloat(document.getElementById('tax-other-deductions').value) || 0;

        // 1. Gross Income
        const grossIncome = salary + houseRent + interest + capGains + otherIncome;

        // 2. New Regime Calculation
        const newStdDed = salary > 0 ? 50000 : 0; // standard deduction of 50k for salaried
        const newTaxable = Math.max(0, grossIncome - newStdDed);

        const newSlabs = [
            { from: 0, to: 300000, rate: 0, label: 'Up to ₹3,00,000' },
            { from: 300000, to: 600000, rate: 0.05, label: '₹3,00,001 – ₹6,00,000' },
            { from: 600000, to: 900000, rate: 0.10, label: '₹6,00,001 – ₹9,00,000' },
            { from: 900000, to: 1200000, rate: 0.15, label: '₹9,00,001 – ₹12,00,000' },
            { from: 1200000, to: 1500000, rate: 0.20, label: '₹12,00,001 – ₹15,00,000' },
            { from: 1500000, to: Infinity, rate: 0.30, label: 'Above ₹15,00,000' }
        ];

        let newTaxSubtotal = 0;
        let breakdownHTML = '';

        newSlabs.forEach(slab => {
            if (newTaxable > slab.from) {
                const taxableInSlab = Math.min(newTaxable, slab.to) - slab.from;
                const taxInSlab = taxableInSlab * slab.rate;
                newTaxSubtotal += taxInSlab;
                breakdownHTML += `
                    <tr>
                        <td>${slab.label}</td>
                        <td>${(slab.rate * 100).toFixed(0)}%</td>
                        <td class="text-end">${formatter.format(taxInSlab)}</td>
                    </tr>
                `;
            } else {
                breakdownHTML += `
                    <tr>
                        <td>${slab.label}</td>
                        <td>${(slab.rate * 100).toFixed(0)}%</td>
                        <td class="text-end">₹0</td>
                    </tr>
                `;
            }
        });

        // 87A rebate for New Regime: Income up to ₹7 Lakh (after standard deduction) has zero tax
        if (newTaxable <= 700000) {
            newTaxSubtotal = 0;
        }

        const newCess = newTaxSubtotal * 0.04;
        const newTotalTax = newTaxSubtotal + newCess;

        // 3. Old Regime Calculation
        const oldStdDed = salary > 0 ? 50000 : 0;
        const totalOldDeductions = oldStdDed + ded80c + ded80d + hra + interest24b + ded80e + otherDeds;
        const oldTaxable = Math.max(0, grossIncome - totalOldDeductions);

        // Brackets depend on age
        let oldSlabs = [];
        if (ageCategory === 'super-senior') {
            oldSlabs = [
                { from: 0, to: 500000, rate: 0 },
                { from: 500000, to: 1000000, rate: 0.20 },
                { from: 1000000, to: Infinity, rate: 0.30 }
            ];
        } else if (ageCategory === 'senior') {
            oldSlabs = [
                { from: 0, to: 300000, rate: 0 },
                { from: 300000, to: 500000, rate: 0.05 },
                { from: 500000, to: 1000000, rate: 0.20 },
                { from: 1000000, to: Infinity, rate: 0.30 }
            ];
        } else {
            oldSlabs = [
                { from: 0, to: 250000, rate: 0 },
                { from: 250000, to: 500000, rate: 0.05 },
                { from: 500000, to: 1000000, rate: 0.20 },
                { from: 1000000, to: Infinity, rate: 0.30 }
            ];
        }

        let oldTaxSubtotal = 0;
        oldSlabs.forEach(slab => {
            if (oldTaxable > slab.from) {
                const taxableInSlab = Math.min(oldTaxable, slab.to) - slab.from;
                oldTaxSubtotal += taxableInSlab * slab.rate;
            }
        });

        // 87A rebate for Old Regime: Income up to ₹5 Lakh has zero tax
        if (oldTaxable <= 500000) {
            oldTaxSubtotal = 0;
        }

        const oldCess = oldTaxSubtotal * 0.04;
        const oldTotalTax = oldTaxSubtotal + oldCess;

        // ---- UPDATE UI ----
        document.getElementById('res-tax-new').textContent = formatter.format(newTotalTax);
        document.getElementById('res-tax-old').textContent = formatter.format(oldTotalTax);
        
        document.getElementById('res-gross-income').textContent = formatter.format(grossIncome);
        document.getElementById('res-old-deductions').textContent = formatter.format(totalOldDeductions);
        document.getElementById('res-taxable-new').textContent = formatter.format(newTaxable);
        document.getElementById('res-taxable-old').textContent = formatter.format(oldTaxable);

        document.getElementById('tax-slab-breakdown-body').innerHTML = breakdownHTML;
        document.getElementById('tax-subtotal-new').textContent = formatter.format(newTaxSubtotal);
        document.getElementById('tax-cess-new').textContent = formatter.format(newCess);
        document.getElementById('tax-net-new').textContent = formatter.format(newTotalTax);

        // Recommendations
        const recBox = document.getElementById('tax-recommendation-box');
        const recTitle = document.getElementById('tax-rec-title');
        const recDesc = document.getElementById('tax-rec-desc');

        recBox.classList.remove('d-none');
        recBox.classList.remove('alert-success', 'alert-warning', 'alert-info');

        if (newTotalTax < oldTotalTax) {
            recBox.classList.add('alert-success');
            recTitle.textContent = "New Tax Regime Recommended!";
            recDesc.textContent = `You save ${formatter.format(oldTotalTax - newTotalTax)} by filing under the New Regime.`;
        } else if (oldTotalTax < newTotalTax) {
            recBox.classList.add('alert-success');
            recTitle.textContent = "Old Tax Regime Recommended!";
            recDesc.textContent = `You save ${formatter.format(newTotalTax - oldTotalTax)} by claiming deductions under the Old Regime.`;
        } else {
            recBox.classList.add('alert-info');
            recTitle.textContent = "Both Regimes yield the same tax!";
            recDesc.textContent = "The net tax payable under both schemes is exactly equal.";
        }
    }

    taxForm.addEventListener('submit', calculateIndiaTax);
    
    // Live update calculations as inputs change
    document.querySelectorAll('#india-tax-form input, #india-tax-form select').forEach(input => {
        input.addEventListener('input', () => calculateIndiaTax());
    });

    resetBtn.addEventListener('click', () => {
        document.getElementById('tax-recommendation-box').classList.add('d-none');
        setTimeout(() => calculateIndiaTax(), 50);
    });

    // Run first calculation
    calculateIndiaTax();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
