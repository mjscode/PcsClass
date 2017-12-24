/*global $*/
(function () {
    "use strict";

    var carousel = $('.carousel'),
        image = $('.image'),
        caption = $('.caption'),
        next = $('#next'),
        previous = $('#previous');

    var currentId = 0;

    next.click(function (event) {
        if (currentId < 3) {
            currentId++;
            $.getJSON("getPic.php", { id: currentId }, function (picture) {
                image.attr('src', picture.picture);
                caption.text(picture.title);
            });
            console.log(currentId);
        }
    });
    previous.click(function (event) {
        if (currentId > 1) {
            currentId--;
            $.getJSON("getPic.php", { id: currentId }, function (picture) {
                image.attr('src', picture.picture);
                caption.text(picture.title);
            });
            console.log(currentId);
        }
    });
}());