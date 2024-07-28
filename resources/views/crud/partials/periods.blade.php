<script>
    document.addEventListener('DOMContentLoaded', function() {
        const periodDropdown = document.getElementById('period');
        const weekDaysContainer = document.getElementById('weekDaysContainer');
        const timesheetForm = document.getElementById('timesheetForm');

        // Convert PHP variables to JavaScript objects
        const selectedHours = @json($selectedHours) ?? {};
        const selectedNotes = @json($selectedNotes) ?? {};

        // Add event listener for period dropdown change
        periodDropdown.addEventListener('change', function() {
            const selectedPeriod = this.value;
            fetchWeekDays(selectedPeriod);
        });

        function fetchWeekDays(period) {
            // Split period into start and end dates
            const [start, end] = period.split(' - ');

            // Convert dates to JavaScript Date objects
            const startDate = new Date(start + ' 00:00:00');
            const endDate = new Date(end + ' 00:00:00');

            startDate.setDate(startDate.getDate() + 1);
            endDate.setDate(endDate.getDate() + 1);

            let currentDate = startDate;
            let weekDaysHtml = `<h6 class="mb-3">${period} (7 Days)</h6>`;

            while (currentDate <= endDate) {
                const dayLabel = currentDate.toLocaleDateString('en-US', { weekday: 'short', day: '2-digit', month: 'short', year: 'numeric' });
                const dateKey = currentDate.toISOString().split('T')[0]; // Format date as YYYY-MM-DD

                // Get values from selectedHours and selectedNotes
                const hoursValue = selectedHours[dateKey] !== undefined ? selectedHours[dateKey] : '';
                const notesValue = selectedNotes[dateKey] !== undefined ? selectedNotes[dateKey] : '';

                weekDaysHtml += `
                <div class="row mb-3">
                    <div class="col-lg-2">
                        <label class="col-form-label">${dayLabel}</label>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group flatpickr" id="flatpickr-time">
                            <input type="number" class="form-control time-input" name="hours[${dateKey}]" placeholder="0:00" data-input value="${hoursValue}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label class="col-form-label border px-2 rounded text-muted">${hoursValue} Hours</label>
                    </div>
                    <div class="col-lg-2">
                        <label class="col-form-label border px-2 rounded text-muted">Hourly Rate</label>
                    </div>
                    <div class="col-lg-2">
                        <label class="col-form-label border px-2 rounded text-muted">0 Hours</label>
                    </div>
                    <div class="col-lg-2">
                        <input class="form-control" maxlength="100" type="text" name="notes[${dateKey}]" placeholder="Notes" value="${notesValue}">
                    </div>
                </div>
                `;
                currentDate.setDate(currentDate.getDate() + 1);
            }

            weekDaysContainer.innerHTML = weekDaysHtml;
        }

        // Trigger the change event on page load to populate the initial state
        periodDropdown.dispatchEvent(new Event('change'));

        // Form validation before submission
        timesheetForm.addEventListener('submit', function(event) {
            const hoursInputs = document.querySelectorAll('.time-input');
            let valid = true;
            hoursInputs.forEach(function(input) {
                if (input.value === '' || isNaN(input.value) || parseFloat(input.value) < 0) {
                    valid = false;
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });

            if (!valid) {
                event.preventDefault();
                alert('Please ensure all hours fields are filled in correctly.');
            }
        });
    });
</script>
