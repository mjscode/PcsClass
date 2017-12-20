/*global $*/
(function () {
    "use strict";

    var videosElem = $('#videos');

    $.getJSON("videos.json", function (loadedVideos) {
        loadedVideos.forEach(function (video) {
            var theVideo = $('<div>' +
                '<h2>' + video.title + '</h2>' +
                '<video width="320" height="240" controls>' +
                '<source src=' + video.video + ' type="video/mp4">' +
                '</video>' +
                '<img src=' + video.image + 'alt="a picture" height="42" width="42">' +
                '</div>'
            ).appendTo(videosElem)

            theVideo.click(function () {
                video.video.play();
            });

        });
    });


}());