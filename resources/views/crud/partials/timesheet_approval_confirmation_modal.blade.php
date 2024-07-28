<!-- Timesheet Confirmation Modal -->
<div class="modal fade" id="timesheetConfirmation{{ $employeeTimesheet->timesheet_id }}" tabindex="-1" aria-labelledby="timesheetConfirmationModalLabel{{ $employeeTimesheet->timesheet_id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="timesheetConfirmationModalLabel{{ $employeeTimesheet->timesheet_id }}">Timesheet Approval Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Change status of this timesheet?
            </div>
            <div class="modal-footer">
                <form id="timesheetConfirmationForm{{ $employeeTimesheet->timesheet_id }}" method="POST" action="{{ route('timesheets.changeTimesheetStatus', $employeeTimesheet->timesheet_id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="page" id="currentPage{{ $employeeTimesheet->timesheet_id }}" value="{{ request()->get('page', 1) }}">
                    <input type="hidden" name="actionType" id="actionType{{ $employeeTimesheet->timesheet_id }}" value="">
                    @if($employeeTimesheet->status === 'rejected')
                        <button type="button" class="btn btn-success" id="approveButton{{ $employeeTimesheet->timesheet_id }}">Approve</button>
                        <button type="button" class="btn btn-warning" id="pendingButton{{ $employeeTimesheet->timesheet_id }}">Pending</button>
                    @endif
                    @if($employeeTimesheet->status === 'pending')
                        <button type="button" class="btn btn-success" id="approveButton{{ $employeeTimesheet->timesheet_id }}">Approve</button>
                        <button type="button" class="btn btn-danger" id="rejectButton{{ $employeeTimesheet->timesheet_id }}">Reject</button>
                    @endif
                    @if($employeeTimesheet->status === 'approved')
                        <button type="button" class="btn btn-warning" id="pendingButton{{ $employeeTimesheet->timesheet_id }}">Pending</button>
                        <button type="button" class="btn btn-danger" id="rejectButton{{ $employeeTimesheet->timesheet_id }}">Reject</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>


@section('scripts')
        @vite('resources/js/app.js')
        @vite('resources/js/datatables.js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let confirmationButtons = document.querySelectorAll('[id^="confirmationModel"]');
            confirmationButtons.forEach(function (confirmationButton) {
                let timesheetid = confirmationButton.getAttribute('data-timesheetid');
                let timesheetConfirmation = document.getElementById('timesheetConfirmation' + timesheetid);
                let form = document.getElementById('timesheetConfirmationForm' + timesheetid);
                let approveButton = document.getElementById('approveButton' + timesheetid);
                let rejectButton = document.getElementById('rejectButton' + timesheetid);
                let pendingButton = document.getElementById('pendingButton' + timesheetid);
                let actionTypeInput = document.getElementById('actionType' + timesheetid);

                if (timesheetConfirmation) {
                    timesheetConfirmation.addEventListener('show.bs.modal', function (event) {
                        let currentPage = '{{ request()->get('page', 1) }}';
                        form.action = '{{ url("/userTimesheets") }}/' + timesheetid + '?page=' + currentPage;
                    });

                    if (approveButton) {
                        approveButton.addEventListener('click', function () {
                            actionTypeInput.value = 'approved';
                            form.submit(); // Submit the form when approve button is clicked
                        });
                    }

                    if (rejectButton) {
                        rejectButton.addEventListener('click', function () {
                            actionTypeInput.value = 'rejected';
                            form.submit(); // Submit the form when reject button is clicked
                        });
                    }

                    if (pendingButton) {
                        pendingButton.addEventListener('click', function () {
                            actionTypeInput.value = 'pending';
                            form.submit(); // Submit the form when pending button is clicked
                        });
                    }
                }
            });
        });


    </script>

@endsection
