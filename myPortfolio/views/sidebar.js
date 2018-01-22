/*global $*/
(function () {
    'use strict';

    var sidebar = $('#info');
    var button = $('#infoButton');
    var header = $('#infoHeader');

    sidebar.toggle('slow');
    button.click(function () {
        sidebar.toggle('slow');
    });
    header.click(function () {
        sidebar.toggle('slow');
    });

    var closeButton = $('#closeAlert');
    var alert = $('#alertBox');

    closeButton.click(function () {
        alert.toggle('slow');
    });

    var creditHead = $('#creditsHeading');
    var creditBody = $('#creditsBody');
    var creditButton = $('#creditsClose');

    creditHead.click(function () {
        creditBody.toggle('slow');
    });
    creditButton.click(function () {
        creditBody.toggle('slow');
    });
    $(document).ready(function () {

        $("#homeModal").modal("toggle");
        $("#infoB").click(function () {
            $("#homeModal").modal("toggle");
        });

    });
})();