<?php require APPROOT . '/views/layouts/header.php'; ?>

<main class="container py-5 my-3">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>" class="text-decoration-none nav-hover">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>/calculators" class="text-decoration-none nav-hover">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Date Calculator</li>
        </ol>
    </nav>

    <!-- Page Heading -->
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold mb-2">Date Calculator</h1>
            
        </div>
    </div>

    <!-- Tab Switcher -->
    <div class="calc-tabs mb-4">
        <button class="calc-tab-btn active" id="tab-diff" onclick="switchDateTab('diff')">Difference Between Dates</button>
        <button class="calc-tab-btn" id="tab-addsub" onclick="switchDateTab('addsub')">Add / Subtract Days</button>
    </div>

    <div class="row g-4 mb-5">
        <!-- Input Panel -->
        <div class="col-lg-6">
            <!-- Tab 1: Difference -->
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" id="panel-diff" style="max-width: 100%;">
                <div class="literal-calc-header" style="background-color: #4F46E5;">
                    <h2 class="literal-calc-title">Date Difference Inputs</h2>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    <form id="date-diff-form">
                        <div class="mb-3">
                            <label for="start-date" class="form-label  mb-1 fw-bold">Start Date</label>
                            <input type="date" class="form-control border-secondary-subtle" id="start-date" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="end-date" class="form-label  mb-1 fw-bold">End Date</label>
                            <input type="date" class="form-control border-secondary-subtle" id="end-date" value="<?php echo date('Y-m-d', strtotime('+7 days')); ?>" required>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="include-end-date" value="1">
                            <label class="form-check-label  fw-medium" for="include-end-date">
                                Include end date in calculation (adds 1 day)
                            </label>
                        </div>
                        <button type="button" class="btn btn-primary w-100 mt-2 py-2 fw-bold" onclick="calculateDateDifference()">Calculate Difference</button>
                    </form>
                </div>
            </div>

            <!-- Tab 2: Add/Subtract (Hidden by default) -->
            <div class="literal-calc-wrapper mx-0 h-100 d-none flex-column" id="panel-addsub" style="max-width: 100%;">
                <div class="literal-calc-header" style="background-color: #4F46E5;">
                    <h2 class="literal-calc-title">Add or Subtract Days</h2>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    <form id="date-addsub-form">
                        <div class="mb-3">
                            <label for="start-date-as" class="form-label  mb-1 fw-bold">Start Date</label>
                            <input type="date" class="form-control border-secondary-subtle" id="start-date-as" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label  mb-1 fw-bold">Operation</label>
                            <div class="d-flex gap-3 mt-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="date_op" id="op-add" value="add" checked>
                                    <label class="form-check-label  fw-medium" for="op-add">Add</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="date_op" id="op-sub" value="sub">
                                    <label class="form-check-label  fw-medium" for="op-sub">Subtract</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label for="as-years" class="form-label  mb-1 fw-bold">Years</label>
                                <input type="number" class="form-control border-secondary-subtle" id="as-years" min="0" value="0">
                            </div>
                            <div class="col-6">
                                <label for="as-months" class="form-label  mb-1 fw-bold">Months</label>
                                <input type="number" class="form-control border-secondary-subtle" id="as-months" min="0" value="0">
                            </div>
                            <div class="col-6 mt-2">
                                <label for="as-weeks" class="form-label  mb-1 fw-bold">Weeks</label>
                                <input type="number" class="form-control border-secondary-subtle" id="as-weeks" min="0" value="0">
                            </div>
                            <div class="col-6 mt-2">
                                <label for="as-days" class="form-label  mb-1 fw-bold">Days</label>
                                <input type="number" class="form-control border-secondary-subtle" id="as-days" min="0" value="0">
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary w-100 mt-2 py-2 fw-bold" onclick="calculateDateAddSub()">Calculate New Date</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Output Panel -->
        <div class="col-lg-6">
            <!-- Tab 1 Output: Difference Summary -->
            <div class="literal-calc-wrapper mx-0 h-100 d-flex flex-column" id="outpanel-diff" style="max-width: 100%;">
                <div class="literal-calc-header" style="background-color: #10B981;">
                    <h2 class="literal-calc-title">Difference Results</h2>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    <div class="mb-3">
                        <label class="form-label  mb-1 fw-bold">Date Range Duration</label>
                        <div class="literal-calc-displays" style="height: auto; padding: 12px; margin-bottom: 0;">
                            <div class="literal-display-main  fs-5 text-start fw-bold" id="res-diff-main" style="font-family: inherit; text-align: left !important;">0 Days</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label  mb-1 fw-bold">Alternative Breakdown</label>
                        <ul class="list-group border border-secondary-subtle">
                            <li class="list-group-item d-flex justify-content-between " style="background-color: #f8fafc;">
                                <span>Total Days</span>
                                <strong id="res-diff-total-days">0 days</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between " style="background-color: #f8fafc;">
                                <span>Total Weeks & Days</span>
                                <strong id="res-diff-weeks-days">0 weeks, 0 days</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between " style="background-color: #f8fafc;">
                                <span>Total Months & Days</span>
                                <strong id="res-diff-months-days">0 months, 0 days</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tab 2 Output: Add/Subtract Summary (Hidden by default) -->
            <div class="literal-calc-wrapper mx-0 h-100 d-none flex-column" id="outpanel-addsub" style="max-width: 100%;">
                <div class="literal-calc-header" style="background-color: #10B981;">
                    <h2 class="literal-calc-title">New Date Result</h2>
                </div>
                <div class="literal-calc-body flex-grow-1 p-3" style="border-radius: 0 0 4px 4px;">
                    <div class="mb-3">
                        <label class="form-label  mb-1 fw-bold">Resulting Date</label>
                        <div class="literal-calc-displays" style="height: auto; padding: 12px; margin-bottom: 0;">
                            <div class="literal-display-main  fs-5 text-start fw-bold" id="res-addsub-main" style="font-family: inherit; text-align: left !important;">-</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label  mb-1 fw-bold">Details</label>
                        <ul class="list-group border border-secondary-subtle">
                            <li class="list-group-item d-flex justify-content-between " style="background-color: #f8fafc;">
                                <span>Day of Week</span>
                                <strong id="res-addsub-dayofweek">-</strong>
                            </li>
                            <li class="list-group-item d-flex justify-content-between " style="background-color: #f8fafc;">
                                <span>Days Remaining in Year</span>
                                <strong id="res-addsub-remaining-days">-</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Educational/Informational Section -->
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="card shadow-none border rounded-4">
                <div class="card-body p-4 p-md-5">
                    <h2 class="fw-bold h3 mb-4  border-bottom pb-2">Understanding Time Durations & Calendar Calculations</h2>
                    <p class="text-muted" style=" line-height: 1.7;">Working with dates is a crucial task in project planning, financial calculations, age tracking, and scheduling events. Unlike normal base-10 numerical calculations, date math has unique complexities due to varying month lengths (28, 29, 30, or 31 days) and leap years occurring every 4 years.</p>
                    <p class="text-muted" style=" line-height: 1.7;">Our Date Calculator makes these computations effortless. The **Difference Between Dates** calculator computes the exact duration between a starting and ending date. You can choose whether to count only the gap days or to include the end date itself (useful for calculating working days in employment or project tasks). The output is dynamically converted into years/months/days, weeks, and total days so you get the complete analytical view.</p>
                    
                    <h3 class="fw-bold h4 mt-4 mb-3 ">Add or Subtract Days from Date</h3>
                    <p class="text-muted" style=" line-height: 1.7;">Need to know the exact deadline 45 days from today? Or what the date was 3 months ago? The **Add / Subtract Days** tool allows you to add or subtract years, months, weeks, and days relative to any date. The engine correctly carries over changes across months and years while adjusting for leap years dynamically, returning the target date along with the corresponding day of the week.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function switchDateTab(tab) {
        const panelDiff = document.getElementById('panel-diff');
        const panelAddSub = document.getElementById('panel-addsub');
        const outpanelDiff = document.getElementById('outpanel-diff');
        const outpanelAddSub = document.getElementById('outpanel-addsub');

        if (tab === 'diff') {
            panelDiff.classList.replace('d-none', 'd-flex');
            panelAddSub.classList.replace('d-flex', 'd-none');
            outpanelDiff.classList.replace('d-none', 'd-flex');
            outpanelAddSub.classList.replace('d-flex', 'd-none');
            
            document.getElementById('tab-diff').classList.add('active');
            document.getElementById('tab-addsub').classList.remove('active');
        } else {
            panelDiff.classList.replace('d-flex', 'd-none');
            panelAddSub.classList.replace('d-none', 'd-flex');
            outpanelDiff.classList.replace('d-flex', 'd-none');
            outpanelAddSub.classList.replace('d-none', 'd-flex');

            document.getElementById('tab-diff').classList.remove('active');
            document.getElementById('tab-addsub').classList.add('active');
        }
    }

    function calculateDateDifference() {
        const startStr = document.getElementById('start-date').value;
        const endStr = document.getElementById('end-date').value;
        if (!startStr || !endStr) return;

        const startDate = new Date(startStr);
        const endDate = new Date(endStr);
        const includeEnd = document.getElementById('include-end-date').checked;

        let timeDiff = endDate.getTime() - startDate.getTime();
        let totalDays = Math.floor(timeDiff / (1000 * 60 * 60 * 24));

        if (includeEnd) {
            totalDays += 1;
        }

        if (isNaN(totalDays)) {
            document.getElementById('res-diff-main').innerText = "Invalid Dates";
            return;
        }

        // Handle negative differences (start date is after end date)
        const absoluteDays = Math.abs(totalDays);
        const prefix = totalDays < 0 ? "Ago: " : "";

        // Calculate Y/M/D breakdown
        let sDate = new Date(startDate);
        let eDate = new Date(endDate);
        if (totalDays < 0) {
            sDate = new Date(endDate);
            eDate = new Date(startDate);
        }
        if (includeEnd && totalDays > 0) {
            // Adjust eDate for the inclusion
            eDate.setDate(eDate.getDate() + 1);
        } else if (includeEnd && totalDays < 0) {
            sDate.setDate(sDate.getDate() - 1);
        }

        let years = eDate.getFullYear() - sDate.getFullYear();
        let months = eDate.getMonth() - sDate.getMonth();
        let days = eDate.getDate() - sDate.getDate();

        if (days < 0) {
            months -= 1;
            // Get days in previous month
            const prevMonth = new Date(eDate.getFullYear(), eDate.getMonth(), 0);
            days += prevMonth.getDate();
        }
        if (months < 0) {
            years -= 1;
            months += 12;
        }

        // Formatting Y/M/D
        let breakdownStr = "";
        if (years > 0) breakdownStr += years + (years === 1 ? " Year " : " Years ");
        if (months > 0) breakdownStr += months + (months === 1 ? " Month " : " Months ");
        if (days > 0 || breakdownStr === "") breakdownStr += days + (days === 1 ? " Day" : " Days");
        
        document.getElementById('res-diff-main').innerText = prefix + breakdownStr.trim();
        document.getElementById('res-diff-total-days').innerText = absoluteDays + (absoluteDays === 1 ? " day" : " days");

        // Weeks and days
        const weeks = Math.floor(absoluteDays / 7);
        const wDays = absoluteDays % 7;
        document.getElementById('res-diff-weeks-days').innerText = `${weeks} ${weeks === 1 ? 'week' : 'weeks'}, ${wDays} ${wDays === 1 ? 'day' : 'days'}`;

        // Months and days (Approximate month = 30.44 days)
        const totalMonthsVal = (absoluteDays / 30.4368).toFixed(1);
        document.getElementById('res-diff-months-days').innerText = `${totalMonthsVal} months (approx.)`;
    }

    function calculateDateAddSub() {
        const startStr = document.getElementById('start-date-as').value;
        if (!startStr) return;

        const start = new Date(startStr);
        const isAdd = document.getElementById('op-add').checked;
        const years = parseInt(document.getElementById('as-years').value) || 0;
        const months = parseInt(document.getElementById('as-months').value) || 0;
        const weeks = parseInt(document.getElementById('as-weeks').value) || 0;
        const days = parseInt(document.getElementById('as-days').value) || 0;

        const target = new Date(start);
        const direction = isAdd ? 1 : -1;

        // Perform calculation
        target.setFullYear(target.getFullYear() + (years * direction));
        target.setMonth(target.getMonth() + (months * direction));
        
        // Add total days (weeks + days)
        const totalDays = (weeks * 7) + days;
        target.setDate(target.getDate() + (totalDays * direction));

        // Format result date
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('res-addsub-main').innerText = target.toLocaleDateString('en-US', options);

        // Day of week
        const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        document.getElementById('res-addsub-dayofweek').innerText = daysOfWeek[target.getDay()];

        // Remaining days in that target year
        const endOfYear = new Date(target.getFullYear(), 11, 31);
        const diffTime = endOfYear.getTime() - target.getTime();
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        document.getElementById('res-addsub-remaining-days').innerText = diffDays >= 0 ? diffDays + " days" : "0 days";
    }

    document.addEventListener('DOMContentLoaded', () => {
        calculateDateDifference();
    });
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
