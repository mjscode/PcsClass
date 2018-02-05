/* public $ */
(function () {
    'use strict';

    var allBox = $('#allBox'),
        check = $('.checkB'),
        checkSetting;

    if (allBox.prop('checked')) {
        check.prop("disabled", true);
        check.prop("checked", true);
    }

    allBox.on('change', function () {
        checkSetting = allBox.prop('checked');
        check.prop("disabled", checkSetting);
        check.prop("checked", checkSetting);
    });

    var deleteB = $(".deleteButton");

    deleteB.on('click', function (event) {
        event.preventDefault();
        event.stopPropagation();
    });


}());
