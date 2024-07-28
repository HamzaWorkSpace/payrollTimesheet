<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $employeeTimesheet->timesheet_id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $employeeTimesheet->timesheet_id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $employeeTimesheet->timesheet_id }}">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Timesheet {{ $employeeTimesheet->employeeName }} (ID: {{ $employeeTimesheet->timesheet_id }})?
            </div>
            <div class="modal-footer">
                <form id="timesheetDeleteForm{{ $employeeTimesheet->timesheet_id }}" method="POST" action="{{ route('timesheets.destroy', $employeeTimesheet->timesheet_id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="page" value="{{ request()->get('page', 1) }}">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
