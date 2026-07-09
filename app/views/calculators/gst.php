<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">GST Calculator</li>
        </ol>
    </nav>

    <div class="row g-4 mb-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" style="max-width: 100%;">
                <div class="literal-calc-header">
                    <h2 class="literal-calc-title">GST Calculator</h2>
                    <div class="literal-calc-controls">
                        <span class="literal-calc-icon">_</span>
                        <span class="literal-calc-icon">×</span>
                    </div>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="background-color: #e5e5e5; border-radius: 0 0 4px 4px;">
                    <form id="gst-calculator-form">
                        <!-- Amount -->
                        <div class="mb-3">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Amount</label>
                            <div class="input-group input-group-sm mt-1">
                                <span class="input-group-text bg-light border-secondary-subtle">₹</span>
                                <input type="number" class="form-control border-secondary-subtle fw-medium" id="gst-amount-custom" value="10000" min="0" required>
                            </div>
                        </div>

                        <!-- GST Rate -->
                        <div class="mb-3">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">GST Rate (%)</label>
                            <select class="form-select form-select-sm border-secondary-subtle fw-medium" id="gst-rate-custom">
                                <option value="5">5%</option>
                                <option value="12">12%</option>
                                <option value="18" selected>18%</option>
                                <option value="28">28%</option>
                            </select>
                        </div>

                        <!-- Add/Remove GST Toggle -->
                        <div class="mb-3 text-center">
                            <label class="form-label d-block  mb-2" style="font-size: 0.9rem; font-weight: 600;">GST Type</label>
                            <div class="btn-group w-100 btn-group-sm" role="group">
                                <input type="radio" class="btn-check" name="gst-type-custom" id="gst-add-custom" value="add" checked>
                                <label class="btn btn-outline-primary fw-semibold" for="gst-add-custom">+ Add GST</label>

                                <input type="radio" class="btn-check" name="gst-type-custom" id="gst-remove-custom" value="remove">
                                <label class="btn btn-outline-danger fw-semibold" for="gst-remove-custom">- Remove GST</label>
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
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Net Amount</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main  fs-5 text-end" id="res-gst-net">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Tax Amount</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0;">
                                <div class="literal-display-main text-danger fs-5 text-end" id="res-gst-tax">₹0</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label  mb-1" style="font-size: 0.9rem; font-weight: 600;">Gross Amount</label>
                            <div class="literal-calc-displays" style="height: auto; padding: 6px 12px; margin-bottom: 0; background-color: #f8f9ff;">
                                <div class="literal-display-main text-success fs-5 text-end" id="res-gst-gross">₹0</div>
                            </div>
                        </div>
                    </div>

                    <!-- Visual Representation: Graphs side-by-side or stacked -->
                    <div class="row g-2 mt-2">
                        <!-- Tax Breakdown Split Table -->
                        <div class="col-md-6 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd; border-right: none;">
                            <h6 class="fw-bold mb-2 " style="font-size: 0.8rem;">Indian Dual GST Split</h6>
                            <div class="list-group list-group-flush border rounded" style="font-size: 0.8rem;">
                                <div class="list-group-item d-flex justify-content-between border-0 border-bottom border-light py-1">
                                    <span class="text-muted">Central GST (CGST 50%)</span>
                                    <span class="fw-semibold " id="res-gst-cgst">₹0</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between border-0 border-bottom border-light py-1">
                                    <span class="text-muted">State GST (SGST 50%)</span>
                                    <span class="fw-semibold " id="res-gst-sgst">₹0</span>
                                </div>
                                <div class="list-group-item d-flex justify-content-between bg-light fw-bold  border-0 py-1">
                                    <span>Integrated GST (IGST 100%)</span>
                                    <span id="res-gst-igst">₹0</span>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-md-6 p-2 border-secondary-subtle" style="border: 1px solid #ccc; background: #fdfdfd;">
                            <h6 class="fw-bold text-center mb-1 " style="font-size: 0.8rem;">Cost Structure</h6>
                            <div style="height: 120px; position: relative;" class="d-flex justify-content-center">
                                <canvas id="gstPieChartCustom"></canvas>
                            </div>
                        </div>
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is Goods and Services Tax (GST)?</h2>
                    <p class="text-muted">Goods and Services Tax (GST) is a comprehensive, multi-stage, destination-based indirect tax levied on the supply of goods and services. It is designed to create a unified domestic market by absorbing multiple layers of state and central taxes—such as Central Excise duty, Service Tax, State Value Added Tax (VAT), purchase tax, entry tax, and luxury tax.</p>
                    <p class="text-muted">The core mechanism of GST is the <strong>Input Tax Credit (ITC)</strong>. GST is levied on every stage of value addition in the supply chain. However, at each stage, businesses can claim a credit for the tax they paid on inputs, offset it against the tax they collect on outputs, and pay only the net difference to the government.</p>

                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">How GST is Calculated</h2>
                    <p class="text-muted">Determining GST involves either adding tax to a net base price or extracting tax from a gross (inclusive) retail price.</p>
                    
                    <h4 class="fw-bold h5 text-body mt-4 mb-2">1. Formula for Adding GST (+ GST)</h4>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">GST Amount = (Net Price * GST Rate) / 100</code>
                    </div>
                    
                    <h4 class="fw-bold h5 text-body mt-4 mb-2">2. Formula for Removing GST (- GST)</h4>
                    <div class="p-3 bg-light rounded-3 text-center mb-3">
                        <code class="fw-bold text-primary fs-5">Net Cost = Gross Price / [1 + (GST Rate / 100)]</code>
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

    const amtInput = document.getElementById('gst-amount-custom');
    const rateSelect = document.getElementById('gst-rate-custom');
    const typeRadios = document.getElementsByName('gst-type-custom');

    let pieChart = null;

    function calculateGST() {
        const amount = parseFloat(amtInput.value) || 0;
        const rate = parseFloat(rateSelect.value) || 0;
        
        let type = 'add';
        typeRadios.forEach(radio => {
            if (radio.checked) type = radio.value;
        });

        let net = 0;
        let gst = 0;
        let gross = 0;

        if (type === 'add') {
            net = amount;
            gst = (amount * rate) / 100;
            gross = net + gst;
        } else {
            gross = amount;
            net = amount * (100 / (100 + rate));
            gst = gross - net;
        }

        const cgst = gst / 2;
        const sgst = gst / 2;

        // Update Text Results
        document.getElementById('res-gst-net').textContent = formatter.format(net);
        document.getElementById('res-gst-tax').textContent = formatter.format(gst);
        document.getElementById('res-gst-gross').textContent = formatter.format(gross);

        document.getElementById('res-gst-cgst').textContent = formatter.format(cgst);
        document.getElementById('res-gst-sgst').textContent = formatter.format(sgst);
        document.getElementById('res-gst-igst').textContent = formatter.format(gst);

        // Update Chart
        updateChart(net, gst);
    }

    function updateChart(net, tax) {
        const pieCtx = document.getElementById('gstPieChartCustom').getContext('2d');
        if (pieChart) pieChart.destroy();
        pieChart = new Chart(pieCtx, {
            type: 'doughnut',
            data: {
                labels: ['Net Amount', 'GST Tax'],
                datasets: [{
                    data: [net, tax],
                    backgroundColor: ['#3b82f6', '#ef4444'],
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
    }

    // Event listeners
    amtInput.addEventListener('input', calculateGST);
    rateSelect.addEventListener('change', calculateGST);
    typeRadios.forEach(radio => {
        radio.addEventListener('change', calculateGST);
    });

    // Run first calculation
    calculateGST();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
