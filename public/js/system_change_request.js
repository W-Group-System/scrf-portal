function cancelScrf(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This scrf will be cancelled",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Cancel it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $("#cancelScrfForm" + id).submit();
        }
    });
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
