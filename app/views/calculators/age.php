<?php require APPROOT . '/views/layouts/header.php'; ?>

<div class="container py-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URLROOT; ?>#calculators">Calculators</a></li>
            <li class="breadcrumb-item active" aria-current="page">Age Calculator</li>
        </ol>
    </nav>

    <div class="row g-4">
        <!-- Calculator Inputs -->
        <div class="col-lg-5">
            <div class="card calc-card shadow-sm border-0 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="icon-circle bg-primary-subtle text-primary">
                            <i class="bi bi-calendar-event fs-3"></i>
                        </div>
                        <div>
                            <h1 class="fw-bold h3 mb-1">Age Calculator</h1>
                            <p class="text-muted small mb-0">Calculate exact age and birthday stats</p>
                        </div>
                    </div>

                    <form id="age-calculator-form">
                        <!-- Date of Birth -->
                        <div class="mb-4">
                            <label for="dob-custom" class="form-label fw-bold">Date of Birth</label>
                            <input type="date" class="form-control border-2 form-control-lg" id="dob-custom" value="1995-10-15" required max="<?php echo date('Y-m-d'); ?>">
                        </div>

                        <!-- Target Date -->
                        <div class="mb-4">
                            <label for="target-date-custom" class="form-label fw-bold">Calculate Age at Date</label>
                            <input type="date" class="form-control border-2 form-control-lg" id="target-date-custom" value="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Calculator Results -->
        <div class="col-lg-7">
            <div class="card calc-card shadow-sm border-0 h-100 bg-white">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold mb-4 text-body border-bottom pb-2">Calculation Result</h4>

                    <!-- Main Age display -->
                    <div class="p-4 rounded-4 bg-primary-subtle text-center mb-4 border border-primary">
                        <span class="text-primary-emphasis fw-bold d-block small mb-2">CHRONOLOGICAL AGE</span>
                        <h2 class="fw-bold text-primary mb-1" id="res-age-string">0 Years, 0 Months, 0 Days</h2>
                        <span class="text-muted extra-small" id="res-dob-day">Born on a Sunday</span>
                    </div>

                    <!-- Side-by-Side Birthday Info -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-4 border text-center h-100">
                                <span class="text-muted d-block small mb-1">Next Birthday In</span>
                                <h4 class="fw-bold text-success mb-1" id="res-next-birthday">0 Months, 0 Days</h4>
                                <span class="text-muted extra-small" id="res-next-birthday-day">Weekday</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded-4 border text-center h-100">
                                <span class="text-muted d-block small mb-1">Half Birthday</span>
                                <h4 class="fw-bold text-info mb-1" id="res-half-birthday">M 00, YYYY</h4>
                                <span class="text-muted extra-small">6 months after birthday</span>
                            </div>
                        </div>
                    </div>

                    <!-- Breakdown Grid -->
                    <h6 class="fw-bold mb-3 text-body">Detailed Time Breakdowns</h6>
                    <div class="row g-2 text-center text-muted small">
                        <div class="col-6 col-md-4">
                            <div class="p-2 border rounded-3 bg-light">
                                <span class="d-block text-body fw-bold" id="grid-months">0</span> Months
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-2 border rounded-3 bg-light">
                                <span class="d-block text-body fw-bold" id="grid-weeks">0</span> Weeks
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-2 border rounded-3 bg-light">
                                <span class="d-block text-body fw-bold" id="grid-days">0</span> Days
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-2 border rounded-3 bg-light">
                                <span class="d-block text-body fw-bold" id="grid-hours">0</span> Hours
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-2 border rounded-3 bg-light">
                                <span class="d-block text-body fw-bold" id="grid-minutes">0</span> Minutes
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-2 border rounded-3 bg-light">
                                <span class="d-block text-body fw-bold" id="grid-seconds">0</span> Seconds
                            </div>
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
                    <h2 class="fw-bold h3 mb-4 text-body border-bottom pb-2">What is Age and How is it Calculated?</h2>
                    <p class="text-muted">Age is a measure of elapsed time from the moment of birth or initiation to a specific target date. In most of the modern world, age is calculated under the international standard age system, where a person’s age increments on their birthday. However, calculating the exact difference between two calendar dates involves complex logic due to the irregularities of the Gregorian calendar system.</p>
                    
                    <h2 class="fw-bold h3 mt-5 mb-4 text-body border-bottom pb-2">Step-by-Step Date Subtraction Example</h2>
                    <div class="p-3 bg-light rounded-3 mb-3">
                        <pre class="mb-0"><code class="text-primary fw-bold">Target Date:  2026 Year, 07 Month, 06 Day
Birth Date:   1995 Year, 10 Month, 15 Day

Step 1: Subtract Days (6 - 15)
Since 6 < 15, borrow 1 month from the Target Month (reducing 7 to 6).
The borrowed month (June) has 30 days. Add 30 to 6:
36 days - 15 days = 21 Days.

Step 2: Subtract Months (6 - 10)
Since 6 < 10, borrow 1 year from the Target Year (reducing 2026 to 2025).
Add 12 months to 6:
18 months - 10 months = 8 Months.

Step 3: Subtract Years (2025 - 1995)
2025 - 1995 = 30 Years.

Final Chronological Age: 30 Years, 8 Months, and 21 Days.</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const dobInput = document.getElementById('dob-custom');
    const targetInput = document.getElementById('target-date-custom');

    const resAgeString = document.getElementById('res-age-string');
    const resDobDay = document.getElementById('res-dob-day');
    const resNextBirthday = document.getElementById('res-next-birthday');
    const resNextBirthdayDay = document.getElementById('res-next-birthday-day');
    const resHalfBirthday = document.getElementById('res-half-birthday');

    const gridMonths = document.getElementById('grid-months');
    const gridWeeks = document.getElementById('grid-weeks');
    const gridDays = document.getElementById('grid-days');
    const gridHours = document.getElementById('grid-hours');
    const gridMinutes = document.getElementById('grid-minutes');
    const gridSeconds = document.getElementById('grid-seconds');

    const weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    function calculateAge() {
        const dobVal = dobInput.value;
        const targetVal = targetInput.value;
        if (!dobVal || !targetVal) return;

        const dob = new Date(dobVal);
        const target = new Date(targetVal);

        if (dob > target) {
            resAgeString.textContent = "DOB cannot be after Target Date!";
            return;
        }

        // Chronological Age
        let years = target.getFullYear() - dob.getFullYear();
        let mDiff = target.getMonth() - dob.getMonth();
        let dDiff = target.getDate() - dob.getDate();

        if (dDiff < 0) {
            mDiff--;
            const prevMonth = new Date(target.getFullYear(), target.getMonth(), 0);
            dDiff += prevMonth.getDate();
        }
        if (mDiff < 0) {
            years--;
            mDiff += 12;
        }

        resAgeString.textContent = `${years} Years, ${mDiff} Months, ${dDiff} Days`;
        resDobDay.textContent = `Born on a ${weekdays[dob.getDay()]}`;

        // Next Birthday Countdown
        let nextBday = new Date(target.getFullYear(), dob.getMonth(), dob.getDate());
        if (nextBday < target) {
            nextBday.setFullYear(target.getFullYear() + 1);
        }

        let nextDiffTime = Math.abs(nextBday - target);
        let nextDiffDays = Math.ceil(nextDiffTime / (1000 * 60 * 60 * 24));
        
        let nextMonths = 0;
        let nextDays = nextDiffDays;

        // Roughly convert to months and days
        if (nextDays >= 30) {
            nextMonths = Math.floor(nextDays / 30.4);
            nextDays = Math.round(nextDays % 30.4);
        }
        resNextBirthday.textContent = `${nextMonths} Months, ${nextDays} Days`;
        resNextBirthdayDay.textContent = `Will be on a ${weekdays[nextBday.getDay()]}`;

        // Half Birthday: 6 months after dob
        let halfBday = new Date(dob.getFullYear(), dob.getMonth() + 6, dob.getDate());
        resHalfBirthday.textContent = `${months[halfBday.getMonth()]} ${halfBday.getDate()}, ${target.getFullYear()}`;

        // Total Summaries
        const totalTime = Math.abs(target - dob);
        const totalDays = Math.floor(totalTime / (1000 * 60 * 60 * 24));
        const totalMonths = (years * 12) + mDiff;
        const totalWeeks = Math.floor(totalDays / 7);
        const totalHours = totalDays * 24;
        const totalMinutes = totalHours * 60;
        const totalSeconds = totalMinutes * 60;

        gridMonths.textContent = totalMonths.toLocaleString();
        gridWeeks.textContent = totalWeeks.toLocaleString();
        gridDays.textContent = totalDays.toLocaleString();
        gridHours.textContent = totalHours.toLocaleString();
        gridMinutes.textContent = totalMinutes.toLocaleString();
        gridSeconds.textContent = totalSeconds.toLocaleString();
    }

    dobInput.addEventListener('input', calculateAge);
    targetInput.addEventListener('input', calculateAge);

    calculateAge();
});
</script>
<?php require APPROOT . '/views/layouts/footer.php'; ?>
