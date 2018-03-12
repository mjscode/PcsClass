var modules = modules || {};

modules.delete = (function () {
    'use strict';

    var deleteBox = $('#deleteModal'),
        deleteParagraph = $('#deleteBody'),
        confirmDelete = $('#confirmDelete'),
        cancelDelete = $('#cancelDelete'),
        closeDelete = $('#closeDelete');

    function cancelEvent() {
        confirmDelete.off('click');
    }

    function show(itemElement, alertDiv, alertRow) {
        var id = itemElement.find('.id').text(),
            name = itemElement.find('.itemName').text(),
            stock = itemElement.find('.itemAmount').text(),
            string = 'ID: &nbsp;' + id + ', "' + name +
                '" (' + ' in stock: ' + stock + ' )';
        deleteParagraph.html(string);
        deleteBox.modal("toggle");
        confirmDelete.on('click', function () {
            $.post("models/deleteModel.php", { delete: id }, function () {
                itemElement.remove();
            }).fail(function (jqxhr) {
                var response = jqxhr.responseText;
                alert = $('<div>' +
                    '<strong>Error! </strong>' + response + '</div>'
                ).appendTo(alertDiv);
                if (alertRow.is(":hidden")) {
                    alertRow.toggle();
                }
            });
            confirmDelete.off('click');
        });
        cancelDelete.click(cancelEvent);
        closeDelete.click(cancelEvent);
    }
    return {
        show: show
    };

}());