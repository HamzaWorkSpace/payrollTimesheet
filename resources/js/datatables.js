import 'datatables.net-bs5';
import 'datatables.net-buttons-bs5';
import 'datatables.net-responsive-bs5';
import $ from 'jquery';

$(document).ready(function() {
    $('#userTable').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf'],
        paging: false,
        searching: true,
        ordering: true,
        info: false,
        lengthChange: true,
        // language: {
        //     paginate: {
        //         next: 'Next',
        //         previous: 'Previous'
        //     }
        // }

    });
});


$(document).ready(function() {
    $('#clients-table').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf'],
        paging: false,
        searching: true,
        ordering: true,
        info: false,
        lengthChange: true,
        language: {
            paginate: {
                next: 'Next',
                previous: 'Previous'
            }
        }

    });
});

$(document).ready(function() {
    $('#employee-table').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf'],
        paging: false,
        searching: true,
        ordering: true,
        info: false,
        lengthChange: true,
        language: {
            paginate: {
                next: 'Next',
                previous: 'Previous'
            }
        }

    });
});

$(document).ready(function() {
    $('#contracts-table').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf'],
        paging: false,
        searching: true,
        ordering: true,
        info: false,
        lengthChange: true,
        language: {
            paginate: {
                next: 'Next',
                previous: 'Previous'
            }
        }

    });
});

$(document).ready(function() {
    $('#timesheets-table').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: ['copy', 'excel', 'pdf'],
        paging: false,
        searching: true,
        ordering: true,
        info: false,
        lengthChange: true,
        language: {
            paginate: {
                next: 'Next',
                previous: 'Previous'
            }
        }

    });
});
