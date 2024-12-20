$(document).ready(function () {
    $(".tables").DataTable({
        stateSave: true,
        processing: false,
        serverSide: false,
        order: false,
    });

    $('.chosen-select').chosen({width:"100%"})
});
