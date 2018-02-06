/* public $ */
(function () {
    'use strict';

    var allBox = $('#allBox'),
        check = $('.checkB'),
        radio = $('input[type=radio]'),
        checkSetting;

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

    var deleteB = $(".deleteButton");
    var ev;
    deleteB.on('click', function (event) {
        event.preventDefault();
        ev = event;
    });
    deleteB.dblclick(function () {

    });

}());
