<?php require APPROOT . '/views/layouts/header.php'; ?>

<main class="container py-5 my-3">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>" class="text-decoration-none nav-hover">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#financial" class="text-decoration-none nav-hover">Financial Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">SIP Calculator</li>
        </ol>
    </nav>

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-2">SIP Calculator</h1>
            <p class="text-muted lead">Calculate your mutual fund returns through Systematic Investment Plan (SIP).</p>
        </div>
    </div>
    
    <div class="row g-4 mb-5">
        <!-- Left Column: Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">SIP Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    <form id="modern-sip-form">
                        <div class="mb-3">
                            <label for="input-sip-amt" class="form-label d-flex justify-content-between text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">
                                <span>Monthly Investment</span>
                                <span class="text-primary" id="label-sip-amt">₹5,000</span>
                            </label>
                            <input type="range" class="form-range" id="slide-sip-amt" min="500" max="100000" step="500" value="5000">
                            <div class="input-group input-group-sm mt-1">
                                <span class="input-group-text bg-light border-secondary-subtle">₹</span>
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="input-sip-amt" value="5000" min="500">
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="input-sip-rate" class="form-label d-flex justify-content-between text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">
                                <span>Expected Return Rate</span>
                                <span class="text-primary" id="label-sip-rate">12%</span>
                            </label>
                            <input type="range" class="form-range" id="slide-sip-rate" min="1" max="30" step="0.5" value="12">
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="input-sip-rate" value="12" step="0.1">
                                <span class="input-group-text bg-light border-secondary-subtle">% p.a.</span>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="input-sip-time" class="form-label d-flex justify-content-between text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">
                                <span>Time Period</span>
                                <span class="text-primary" id="label-sip-time">10 Yr</span>
                            </label>
                            <input type="range" class="form-range" id="slide-sip-time" min="1" max="40" step="1" value="10">
                            <div class="input-group input-group-sm mt-1">
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="input-sip-time" value="10" min="1">
                                <span class="input-group-text bg-light border-secondary-subtle">Years</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Right Column: Outputs -->
        <div class="col-lg-7">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Investment Summary</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    
                    <div class="row g-2 mb-3">
                        <div class="col-md-12">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Total Invested</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-dark fs-5 text-end" id="res-invested">₹ 6,00,000</div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Est. Returns</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-success fs-5 text-end" id="res-returns">₹ 5,61,695</div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label class="form-label text-dark mb-1" style="font-size: 0.9rem; font-weight: 600;">Total Maturity Value</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0; background-color: #f8f9ff;">
                                <div class="literal-display-main text-primary fs-4 text-end" id="res-maturity">₹ 11,61,695</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex align-items-center mb-0 mt-3 p-2 bg-light border-secondary-subtle" style="border: 1px solid #ccc; font-size: 0.85rem;">
                        <i class="bi bi-info-circle-fill text-primary me-2"></i>
                        <p class="mb-0 text-dark">By investing <strong id="txt-invested">₹5,000</strong> monthly for <strong id="txt-years">10 years</strong>, your wealth grows by <strong class="text-success" id="txt-growth">93.6%</strong> thanks to compounding.</p>
                    </div>
                    
                    <div class="mt-3 p-2 border-secondary-subtle d-flex justify-content-center" style="border: 1px solid #ccc; background: #fdfdfd;">
                        <div style="height: 180px; width: 100%; max-width: 250px;">
                            <canvas id="sipPieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Projection Table -->
    <div class="row">
        <div class="col-12">
            <div class="literal-calc-wrapper mx-0 d-flex flex-column mb-5" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">Year-by-Year Projection</h2>
                    <div class="literal-calc-controls d-none d-md-flex">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body p-0" style="background-color: #fff; border-radius: 0 0 4px 4px; border: 1px solid #ccc; border-top: none;">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" id="sip-table">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4 py-3 border-bottom-0">Year</th>
                                    <th class="py-3 border-bottom-0">Amount Invested</th>
                                    <th class="py-3 border-bottom-0">Wealth Gained</th>
                                    <th class="pe-4 text-end py-3 border-bottom-0">Total Maturity Value</th>
                                </tr>
                            </thead>
                            <tbody id="sip-tbody">
                                <!-- Populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Informational Section -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card bg-light border-0 rounded-4 p-4 p-md-5">
                <h3 class="fs-4 fw-bold mb-4 text-dark">About the SIP Calculator</h3>
                
                <div class="mb-4">
                    <h5 class="fw-bold">What is a SIP?</h5>
                    <p class="text-muted">A Systematic Investment Plan (SIP) allows you to invest a fixed amount regularly in mutual funds. It's an excellent tool to build wealth over time by leveraging the power of compounding and rupee cost averaging, which reduces the impact of market volatility.</p>
                </div>
                
                <div>
                    <h5 class="fw-bold">How does compounding work in SIP?</h5>
                    <p class="text-muted mb-0">Compounding means earning interest on your principal as well as on the accumulated interest. In a SIP, your monthly investments generate returns, which are reinvested to generate more returns. Over long periods (like 10-20 years), compounding leads to exponential growth of your capital.</p>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let sipChartInstance = null;
    
    // Sync sliders and inputs
    function setupSync(inputId, sliderId, labelId, suffix = '') {
        const input = document.getElementById(inputId);
        const slider = document.getElementById(sliderId);
        const label = document.getElementById(labelId);
        const formatter = new Intl.NumberFormat('en-IN', { maximumFractionDigits: 1 });
        
        const update = (val) => {
            input.value = val;
            slider.value = val;
            if (inputId.includes('amt')) {
                label.innerText = '₹' + formatter.format(val);
            } else {
                label.innerText = val + suffix;
            }
            calculateModernSIP();
        };

        input.addEventListener('input', (e) => update(e.target.value));
        slider.addEventListener('input', (e) => update(e.target.value));
    }

    document.addEventListener('DOMContentLoaded', () => {
        setupSync('input-sip-amt', 'slide-sip-amt', 'label-sip-amt');
        setupSync('input-sip-rate', 'slide-sip-rate', 'label-sip-rate', '%');
        setupSync('input-sip-time', 'slide-sip-time', 'label-sip-time', ' Yr');
        calculateModernSIP();
    });

    function calculateModernSIP() {
        const p = parseFloat(document.getElementById('input-sip-amt').value) || 0;
        const r = parseFloat(document.getElementById('input-sip-rate').value) || 0;
        const t = parseFloat(document.getElementById('input-sip-time').value) || 0;
        
        const i = r / 12 / 100;
        const n = t * 12;
        
        let maturity = p * ((Math.pow(1 + i, n) - 1) / i) * (1 + i);
        let invested = p * n;
        
        if (r === 0) {
            maturity = invested;
        }
        
        let returns = maturity - invested;
        
        const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });
        
        document.getElementById('res-invested').innerText = formatter.format(invested);
        document.getElementById('res-returns').innerText = formatter.format(returns);
        document.getElementById('res-maturity').innerText = formatter.format(maturity);
        
        // Update insight text
        document.getElementById('txt-invested').innerText = formatter.format(p);
        document.getElementById('txt-years').innerText = t + (t === 1 ? ' year' : ' years');
        let growthPercent = invested > 0 ? ((returns / invested) * 100).toFixed(1) : 0;
        document.getElementById('txt-growth').innerText = growthPercent + '%';
        
        // Generate table
        const tbody = document.getElementById('sip-tbody');
        tbody.innerHTML = '';
        
        for (let year = 1; year <= t; year++) {
            let months = year * 12;
            let currentMaturity = p * ((Math.pow(1 + i, months) - 1) / i) * (1 + i);
            let currentInvested = p * 12 * year;
            if (r === 0) currentMaturity = currentInvested;
            let currentReturns = currentMaturity - currentInvested;
            
            tbody.innerHTML += `
                <tr>
                    <td class="ps-4 fw-medium">${year}</td>
                    <td>${formatter.format(currentInvested)}</td>
                    <td class="text-success">+ ${formatter.format(currentReturns)}</td>
                    <td class="pe-4 text-end fw-bold">${formatter.format(currentMaturity)}</td>
                </tr>
            `;
        }
        
        // Update Chart
        const ctx = document.getElementById('sipPieChart').getContext('2d');
        if (sipChartInstance) {
            sipChartInstance.data.datasets[0].data = [invested, returns];
            sipChartInstance.update();
        } else {
            sipChartInstance = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Amount Invested', 'Est. Returns'],
                    datasets: [{
                        data: [invested, returns],
                        backgroundColor: ['#4F46E5', '#10B981'],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                font: {
                                    family: "'Inter', sans-serif",
                                    size: 13
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 }).format(context.parsed);
                                    }
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        }
    }
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
