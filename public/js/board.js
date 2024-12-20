function deleteBoardColumn(id) {
    event.preventDefault();
    document.getElementById('delete-column'+id).submit();
}

$(document).ready(function() {
    $('.chosen-select').chosen()
})