<!-- Copy Timesheet Modal -->
<div class="modal fade" id="copyTimesheetModal{{ $employeeTimesheet->timesheet_id }}" tabindex="-1" aria-labelledby="copyTimesheetModalLabel{{ $employeeTimesheet->timesheet_id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="copyTimesheetForm{{ $employeeTimesheet->timesheet_id }}" method="POST" action="{{ route('timesheets.copy') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="copyTimesheetModalLabel{{ $employeeTimesheet->timesheet_id }}">Copy Timesheet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="timesheet_id" value="{{ $employeeTimesheet->timesheet_id }}">
                    <div class="mb-3">
                        <label for="copy_period" class="form-label">Copy Timesheet Period to</label>
                        <select class="form-select" name="copy_period" id="copy_period{{ $employeeTimesheet->timesheet_id }}" required>
                            @foreach($periods as $period)
                                <option value="{{ $period }}">{{ $period }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



@section('scripts')
    <script>
        const copyButtons = document.querySelectorAll('button[data-bs-target^="#copyTimesheetModal"]');
        copyButtons.forEach(button => {
            button.addEventListener('click', function () {
                const timesheetId = this.getAttribute('data-bs-target').replace('#copyTimesheetModal', '');
                const form = document.getElementById('copyTimesheetForm' + timesheetId);
                const saveButton = form.querySelector('button[type="submit"]');
                saveButton.addEventListener('click', function () {
                    form.submit();
                });
            });
        });
    </script>

@endsection
