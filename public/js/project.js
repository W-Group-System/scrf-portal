$(document).ready(function () {
    $(".tables").DataTable({
        stateSave: true,
        processing: false,
        serverSide: false,
        ordering: false,
    });

    $('.chosen-select').chosen({width:"100%"})
});
