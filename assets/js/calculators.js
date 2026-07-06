document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('en-IN', { style: 'currency', currency: 'INR', maximumFractionDigits: 0 });
    
    // --- Age Calculator ---
    const ageForm = document.getElementById('age-form');
    if (ageForm) {
        ageForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const dobEl = document.getElementById('dob');
            const targetEl = document.getElementById('target-date');
            if (!dobEl || !targetEl) return;

            const dob = new Date(dobEl.value);
            const target = new Date(targetEl.value);
            if (dob > target) { alert("Date of birth cannot be after the target date."); return; }
            let years = target.getFullYear() - dob.getFullYear();
            let months = target.getMonth() - dob.getMonth();
            let days = target.getDate() - dob.getDate();
            if (days < 0) {
                months--;
                const prevMonth = new Date(target.getFullYear(), target.getMonth(), 0);
                days += prevMonth.getDate();
            }
            if (months < 0) { years--; months += 12; }
            
            const yrEl = document.getElementById('res-years');
            const moEl = document.getElementById('res-months');
            const dyEl = document.getElementById('res-days');
            if (yrEl) yrEl.textContent = years;
            if (moEl) moEl.textContent = months;
            if (dyEl) dyEl.textContent = days;

            const diffTime = Math.abs(target - dob);
            const totalDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
            
            const totMo = document.getElementById('tot-months');
            const totWe = document.getElementById('tot-weeks');
            const totDy = document.getElementById('tot-days');
            const totHo = document.getElementById('tot-hours');
            
            if (totMo) totMo.textContent = ((years * 12) + months).toLocaleString();
            if (totWe) totWe.textContent = Math.floor(totalDays / 7).toLocaleString();
            if (totDy) totDy.textContent = totalDays.toLocaleString();
            if (totHo) totHo.textContent = (totalDays * 24).toLocaleString();
            
            const resSection = document.getElementById('age-result');
            if (resSection) resSection.classList.remove('d-none');
        });
    }

    // --- EMI Calculator ---
    const emiForm = document.getElementById('emi-form');
    let emiChart = null;
    if (emiForm) {
        const ranges = { amount: document.getElementById('loan-amount'), rate: document.getElementById('interest-rate'), tenure: document.getElementById('loan-tenure') };
        const inputs = { amount: document.getElementById('loan-amount-input'), rate: document.getElementById('interest-rate-input'), tenure: document.getElementById('loan-tenure-input') };
        const labels = { amount: document.getElementById('amount-val'), rate: document.getElementById('interest-val'), tenure: document.getElementById('tenure-val') };
        const tenureType = document.getElementById('tenure-type');
        
        if (ranges.amount && ranges.rate && ranges.tenure && inputs.amount && inputs.rate && inputs.tenure) {
            function calculateEMI() {
                const p = parseFloat(inputs.amount.value) || 0;
                const r = (parseFloat(inputs.rate.value) || 0) / 12 / 100;
                let n = parseFloat(inputs.tenure.value) || 0;
                if (tenureType && tenureType.value === 'years') n = n * 12;
                let emi = 0, totalInterest = 0, totalAmount = p;
                if (p > 0 && r > 0 && n > 0) {
                    emi = p * r * (Math.pow(1 + r, n) / (Math.pow(1 + r, n) - 1));
                    totalAmount = emi * n;
                    totalInterest = totalAmount - p;
                } else if (p > 0 && n > 0) { emi = p / n; }
                
                const emiRes = document.getElementById('emi-result');
                const prinRes = document.getElementById('principal-result');
                const intRes = document.getElementById('interest-total-result');
                const totRes = document.getElementById('total-amount-result');
                
                if (emiRes) emiRes.textContent = formatter.format(emi);
                if (prinRes) prinRes.textContent = formatter.format(p);
                if (intRes) intRes.textContent = formatter.format(totalInterest);
                if (totRes) totRes.textContent = formatter.format(totalAmount);
                
                if (document.getElementById('emiPieChart')) {
                    updateChart('emiPieChart', ['Principal', 'Interest'], [p, totalInterest], emiChart, (chart) => emiChart = chart);
                }
            }
            ['amount', 'rate', 'tenure'].forEach(key => {
                if (ranges[key] && inputs[key]) {
                    ranges[key].addEventListener('input', (e) => { inputs[key].value = e.target.value; updateEMILabels(); calculateEMI(); });
                    inputs[key].addEventListener('input', (e) => { ranges[key].value = e.target.value; updateEMILabels(); calculateEMI(); });
                }
            });
            if (tenureType) {
                tenureType.addEventListener('change', () => { updateEMILabels(); calculateEMI(); });
            }
            function updateEMILabels() {
                if (labels.amount) labels.amount.textContent = formatter.format(inputs.amount.value);
                if (labels.rate) labels.rate.textContent = inputs.rate.value + ' %';
                if (labels.tenure) labels.tenure.textContent = inputs.tenure.value + ' ' + (tenureType && tenureType.value === 'years' ? 'Years' : 'Months');
            }
            updateEMILabels(); calculateEMI();
        }
    }

    // --- BMI Calculator ---
    const bmiForm = document.getElementById('bmi-form');
    if (bmiForm) {
        bmiForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const metricTab = document.getElementById('metric-tab');
            const isMetric = metricTab ? metricTab.classList.contains('active') : true;
            let bmi = 0;
            if (isMetric) {
                const heightEl = document.getElementById('height-cm');
                const weightEl = document.getElementById('weight-kg');
                if (heightEl && weightEl) {
                    const height = parseFloat(heightEl.value) / 100;
                    const weight = parseFloat(weightEl.value);
                    if(height > 0 && weight > 0) bmi = weight / (height * height);
                }
            } else {
                const ftEl = document.getElementById('height-ft');
                const inEl = document.getElementById('height-in');
                const lbsEl = document.getElementById('weight-lbs');
                if (ftEl && inEl && lbsEl) {
                    const ft = parseFloat(ftEl.value) || 0;
                    const inches = parseFloat(inEl.value) || 0;
                    const weight = parseFloat(lbsEl.value);
                    const totalInches = (ft * 12) + inches;
                    if(totalInches > 0 && weight > 0) bmi = 703 * weight / (totalInches * totalInches);
                }
            }
            if (bmi > 0) {
                const scoreEl = document.getElementById('bmi-score');
                if (scoreEl) scoreEl.textContent = bmi.toFixed(1);
                
                const catEl = document.getElementById('bmi-category');
                if (catEl) {
                    if (bmi < 18.5) { catEl.className = 'badge rounded-pill fs-5 mb-4 px-4 py-2 bg-info'; catEl.textContent = 'Underweight'; }
                    else if (bmi < 25) { catEl.className = 'badge rounded-pill fs-5 mb-4 px-4 py-2 bg-success'; catEl.textContent = 'Normal'; }
                    else if (bmi < 30) { catEl.className = 'badge rounded-pill fs-5 mb-4 px-4 py-2 bg-warning text-dark'; catEl.textContent = 'Overweight'; }
                    else { catEl.className = 'badge rounded-pill fs-5 mb-4 px-4 py-2 bg-danger'; catEl.textContent = 'Obese'; }
                }
                const resSection = document.getElementById('bmi-result-section');
                if (resSection) resSection.classList.remove('d-none');
            }
        });
    }

    // --- Percentage Calculator ---
    if(document.getElementById('perc-form-1')) {
        document.getElementById('perc-form-1').addEventListener('submit', (e) => {
            e.preventDefault();
            const x = parseFloat(document.getElementById('perc-x1').value);
            const y = parseFloat(document.getElementById('perc-y1').value);
            const res = (x / 100) * y;
            const el = document.getElementById('perc-res-1');
            if (el) {
                el.textContent = `${x}% of ${y} is ${res}`;
                el.classList.remove('d-none');
            }
        });
        document.getElementById('perc-form-2').addEventListener('submit', (e) => {
            e.preventDefault();
            const x = parseFloat(document.getElementById('perc-x2').value);
            const y = parseFloat(document.getElementById('perc-y2').value);
            const res = (x / y) * 100;
            const el = document.getElementById('perc-res-2');
            if (el) {
                el.textContent = `${x} is ${res.toFixed(2)}% of ${y}`;
                el.classList.remove('d-none');
            }
        });
        document.getElementById('perc-form-3').addEventListener('submit', (e) => {
            e.preventDefault();
            const x = parseFloat(document.getElementById('perc-x3').value);
            const y = parseFloat(document.getElementById('perc-y3').value);
            const diff = y - x;
            const res = (diff / x) * 100;
            const el = document.getElementById('perc-res-3');
            if (el) {
                const type = res >= 0 ? 'Increase' : 'Decrease';
                el.textContent = `${Math.abs(res).toFixed(2)}% ${type}`;
                el.classList.remove('d-none');
            }
        });
    }

    // --- GST Calculator ---
    const gstForm = document.getElementById('gst-form');
    if (gstForm) {
        gstForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const amount = parseFloat(document.getElementById('gst-amount').value);
            const rate = parseFloat(document.getElementById('gst-rate').value);
            const typeRadio = document.querySelector('input[name="gst-type"]:checked');
            const type = typeRadio ? typeRadio.value : 'add';
            let net = 0, gst = 0, gross = 0;
            if (type === 'add') {
                net = amount;
                gst = (amount * rate) / 100;
                gross = net + gst;
            } else {
                gross = amount;
                net = amount * (100 / (100 + rate));
                gst = gross - net;
            }
            const netRes = document.getElementById('res-net');
            const gstRes = document.getElementById('res-gst');
            const grossRes = document.getElementById('res-gross');
            
            if (netRes) netRes.textContent = formatter.format(net);
            if (gstRes) gstRes.textContent = formatter.format(gst);
            if (grossRes) grossRes.textContent = formatter.format(gross);
            
            const resSection = document.getElementById('gst-result');
            if (resSection) resSection.classList.remove('d-none');
        });
    }

    // --- SIP Calculator ---
    const sipForm = document.getElementById('sip-form');
    let sipChart = null;
    if (sipForm) {
        const ranges = { amount: document.getElementById('sip-amount'), rate: document.getElementById('sip-rate'), time: document.getElementById('sip-time') };
        const inputs = { amount: document.getElementById('sip-amount-input'), rate: document.getElementById('sip-rate-input'), time: document.getElementById('sip-time-input') };
        const labels = { amount: document.getElementById('sip-amount-val'), rate: document.getElementById('sip-rate-val'), time: document.getElementById('sip-time-val') };
        
        if (ranges.amount && ranges.rate && ranges.time && inputs.amount && inputs.rate && inputs.time) {
            function calculateSIP() {
                const P = parseFloat(inputs.amount.value) || 0;
                const r = (parseFloat(inputs.rate.value) || 0) / 100 / 12;
                const n = (parseFloat(inputs.time.value) || 0) * 12;
                const investedAmount = P * n;
                const estimatedReturns = P * ((Math.pow(1 + r, n) - 1) / r) * (1 + r);
                const totalReturns = estimatedReturns - investedAmount;
                
                const totVal = document.getElementById('sip-total-value');
                const totInv = document.getElementById('sip-invested');
                const totRet = document.getElementById('sip-returns');
                
                if (totVal) totVal.textContent = formatter.format(estimatedReturns);
                if (totInv) totInv.textContent = formatter.format(investedAmount);
                if (totRet) totRet.textContent = formatter.format(totalReturns);
                
                if (document.getElementById('sipPieChart')) {
                    updateChart('sipPieChart', ['Invested', 'Returns'], [investedAmount, totalReturns], sipChart, (chart) => sipChart = chart);
                }
            }
            
            ['amount', 'rate', 'time'].forEach(key => {
                if (ranges[key] && inputs[key]) {
                    ranges[key].addEventListener('input', (e) => { inputs[key].value = e.target.value; updateSIPLabels(); calculateSIP(); });
                    inputs[key].addEventListener('input', (e) => { ranges[key].value = e.target.value; updateSIPLabels(); calculateSIP(); });
                }
            });
            function updateSIPLabels() {
                if (labels.amount) labels.amount.textContent = formatter.format(inputs.amount.value);
                if (labels.rate) labels.rate.textContent = inputs.rate.value + ' %';
                if (labels.time) labels.time.textContent = inputs.time.value + ' Years';
            }
            updateSIPLabels(); calculateSIP();
        }
    }

    // --- Simple Interest ---
    const siForm = document.getElementById('si-form');
    if (siForm) {
        siForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const p = parseFloat(document.getElementById('si-p').value) || 0;
            const r = parseFloat(document.getElementById('si-r').value) || 0;
            const t = parseFloat(document.getElementById('si-t').value) || 0;
            const interest = (p * r * t) / 100;
            
            const resI = document.getElementById('si-res-i');
            const resA = document.getElementById('si-res-a');
            if (resI) resI.textContent = formatter.format(interest);
            if (resA) resA.textContent = formatter.format(p + interest);
            
            const resSection = document.getElementById('si-result');
            if (resSection) resSection.classList.remove('d-none');
        });
    }

    // --- Compound Interest ---
    const ciForm = document.getElementById('ci-form');
    if (ciForm) {
        ciForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const p = parseFloat(document.getElementById('ci-p').value) || 0;
            const r = (parseFloat(document.getElementById('ci-r').value) || 0) / 100;
            const t = parseFloat(document.getElementById('ci-t').value) || 0;
            const n = parseFloat(document.getElementById('ci-n').value) || 1;
            const amount = p * Math.pow((1 + (r / n)), (n * t));
            const interest = amount - p;
            
            const resI = document.getElementById('ci-res-i');
            const resA = document.getElementById('ci-res-a');
            if (resI) resI.textContent = formatter.format(interest);
            if (resA) resA.textContent = formatter.format(amount);
            
            const resSection = document.getElementById('ci-result');
            if (resSection) resSection.classList.remove('d-none');
        });
    }

    // --- FD Calculator ---
    const fdForm = document.getElementById('fd-form');
    if (fdForm) {
        fdForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const p = parseFloat(document.getElementById('fd-p').value) || 0;
            const r = (parseFloat(document.getElementById('fd-r').value) || 0) / 100;
            let t = parseFloat(document.getElementById('fd-t').value) || 0;
            const tTypeEl = document.getElementById('fd-t-type');
            const tType = tTypeEl ? tTypeEl.value : 'years';
            if(tType === 'months') t = t / 12;
            if(tType === 'days') t = t / 365;
            
            const amount = p * Math.pow((1 + (r / 4)), (4 * t));
            const interest = amount - p;
            
            const resI = document.getElementById('fd-res-i');
            const resA = document.getElementById('fd-res-a');
            if (resI) resI.textContent = formatter.format(interest);
            if (resA) resA.textContent = formatter.format(amount);
            
            const resSection = document.getElementById('fd-result');
            if (resSection) resSection.classList.remove('d-none');
        });
    }

    // --- Love Calculator ---
    const loveForm = document.getElementById('love-form');
    if (loveForm) {
        loveForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const name1 = document.getElementById('love-name1').value.toLowerCase().replace(/\s/g, '');
            const name2 = document.getElementById('love-name2').value.toLowerCase().replace(/\s/g, '');
            let sum = 0;
            const combined = name1 + name2;
            for(let i=0; i<combined.length; i++) { sum += combined.charCodeAt(i); }
            const score = (sum % 101); // 0-100
            
            const scoreEl = document.getElementById('love-score');
            const msgEl = document.getElementById('love-msg');
            if (scoreEl) scoreEl.textContent = score + '%';
            if (msgEl) {
                let msg = '';
                if(score > 80) msg = "A match made in heaven! 💕";
                else if(score > 50) msg = "Looking good! Keep the spark alive. 💖";
                else msg = "Maybe just good friends? 😅";
                msgEl.textContent = msg;
            }
            const resSection = document.getElementById('love-result');
            if (resSection) resSection.classList.remove('d-none');
        });
    }

    // --- Calorie Calculator ---
    const calForm = document.getElementById('calorie-form');
    if (calForm) {
        calForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const age = parseFloat(document.getElementById('cal-age').value) || 0;
            const gender = document.getElementById('cal-gender').value;
            const height = parseFloat(document.getElementById('cal-height').value) || 0;
            const weight = parseFloat(document.getElementById('cal-weight').value) || 0;
            const activity = parseFloat(document.getElementById('cal-activity').value) || 1.2;
            
            let bmr = (10 * weight) + (6.25 * height) - (5 * age);
            if (gender === 'male') bmr += 5;
            else bmr -= 161;
            const maintenance = bmr * activity;
            
            const maintainEl = document.getElementById('cal-maintain');
            const loss1El = document.getElementById('cal-loss1');
            const loss2El = document.getElementById('cal-loss2');
            
            if (maintainEl) maintainEl.textContent = Math.round(maintenance);
            if (loss1El) loss1El.textContent = Math.round(maintenance - 250);
            if (loss2El) loss2El.textContent = Math.round(maintenance - 500);
            
            const resSection = document.getElementById('calorie-result');
            if (resSection) resSection.classList.remove('d-none');
        });
    }

    // --- Income Tax Calculator ---
    const taxForm = document.getElementById('tax-form');
    if (taxForm) {
        taxForm.addEventListener('submit', (e) => {
            e.preventDefault();
            let income = parseFloat(document.getElementById('tax-income').value) || 0;
            let taxable = income - 50000;
            let tax = 0;
            if (taxable <= 700000) {
                tax = 0;
            } else {
                if(taxable > 300000) tax += Math.min(300000, taxable - 300000) * 0.05;
                if(taxable > 600000) tax += Math.min(300000, taxable - 600000) * 0.10;
                if(taxable > 900000) tax += Math.min(300000, taxable - 900000) * 0.15;
                if(taxable > 1200000) tax += Math.min(300000, taxable - 1200000) * 0.20;
                if(taxable > 1500000) tax += (taxable - 1500000) * 0.30;
                tax += tax * 0.04;
            }
            const payableEl = document.getElementById('tax-payable');
            if (payableEl) payableEl.textContent = formatter.format(Math.max(0, tax));
            
            const resSection = document.getElementById('tax-result');
            if (resSection) resSection.classList.remove('d-none');
        });
    }

    // --- Helper function for Chart.js ---
    function updateChart(canvasId, labels, data, chartInstance, setChartCallback) {
        const ctx = document.getElementById(canvasId);
        if(!ctx || typeof Chart === 'undefined') return;
        if (chartInstance) chartInstance.destroy();
        const newChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: data,
                    backgroundColor: ['#4f46e5', '#ec4899'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: { legend: { display: false } }
            }
        });
        setChartCallback(newChart);
    }

    // --- Global Copy Logic ---
    const copyBtns = document.querySelectorAll('#copy-btn');
    copyBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            navigator.clipboard.writeText(window.location.href).then(() => {
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="bi bi-check2"></i> Copied';
                setTimeout(() => { btn.innerHTML = originalHtml; }, 2000);
            });
        });
    });
});
