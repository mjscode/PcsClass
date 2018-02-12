/* public $ */
(function () {
    'use strict';

    var allBox = $('#allBox'),
        check = $('.checkB'),
        radio = $('input[type=radio]'),
        checkSetting,
        alertRow = $('#alertRow'),
        alertDiv = $('#alerts'),
        closeButton = $('#closeAlert');

    radio.click(function (event) {
        event.preventDefault();
    });

    if (allBox.prop('checked')) {
        check.prop("disabled", true);
        check.prop("checked", true);
    }

    allBox.on('change', function () {
        checkSetting = allBox.prop('checked');
        check.prop("disabled", checkSetting);
        check.prop("checked", checkSetting);
    });

    closeButton.click(function () {
        alertRow.toggle();
    });

    var deleteB = $(".deleteButton"),
        deleteBox = $('#deleteModal'),
        deleteParagraph = $('#deleteBody'),
        confirmDelete = $('#confirmDelete');

    function deleteModal(itemElement) {
        var id = itemElement.find('.id').text(),
            name = itemElement.find('#itemName').text(),
            stock = itemElement.find('#itemAmount').text();
        console.log(stock);
        var string = 'ID: &nbsp;' + id + ',    "' + name + '"     (' + stock + ' in stock:  )';
        console.log(string);
        deleteParagraph.htmltml(string);
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
        });
    }

    deleteB.click(function (event) {
        var item = $(event.target).closest('.item');
        deleteModal(item);
    });


}());
