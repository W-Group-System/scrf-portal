function status(value, id) {
    if (value == "Deactivate") {
        return Swal.fire({
            title: "Are you sure?",
            text: "This user will be deactivated",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, deactivate it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $("#deactivateForm" + id).submit();
            }
        });
    }

    if (value == "Activate") {
        return Swal.fire({
            title: "Are you sure?",
            text: "This user will be activated",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, activate it!",
        }).then((result) => {
            if (result.isConfirmed) {
                $("#activateForm" + id).submit();
            }
        });
    }
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
