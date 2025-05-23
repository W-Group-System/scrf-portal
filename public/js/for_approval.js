function approve(id) {
    Swal.fire({
        title: 'Approve',
        text: 'Are you sure you want to approve this request?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire('Approved!', '', 'success');
            $('#approveForm'+id).submit();
        }
    }); 
}

function reject(id) {
    Swal.fire({
        title: 'Returned',
        text: 'Are you sure you want to returned this request?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire('Rejected!', '', 'success');
            $('#rejectForm'+id).submit();
        }
    })
}

$(document).ready(function () {
    $(".tables").DataTable({
        stateSave: true,
        processing: false,
        serverSide: false,
        ordering: false,
    });

    $('.chosen-select').chosen({width:"100%"})
});
