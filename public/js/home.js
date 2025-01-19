document.addEventListener('DOMContentLoaded', function() {
    const tables = document.querySelectorAll('.tables');

    tables.forEach(table => {
        $(table).DataTable({
            stateSave: true,
            processing: false,
            serverSide: false,
            ordering: false,
        })
    })
})