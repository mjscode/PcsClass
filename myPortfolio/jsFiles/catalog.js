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

    var deleteB = $(".deleteButton");

    deleteB.click(function (event) {
        var item = $(event.target).closest('.item');
        modules.delete.show(item, alertDiv, alertRow);
    });

    var updateB = $(".updateButton");

    updateB.click(function (event) {
        var item = $(event.target).closest('.item');
        modules.update.show(item, alertDiv, alertRow);
    });

    var addForm = $("#addForm");

    addForm.on("submit", function (event) {
        modules.add.show(alertDiv, alertRow);
        event.preventDefault();
    });


}());
