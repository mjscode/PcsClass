(function () {
    'use stricet';

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
}());