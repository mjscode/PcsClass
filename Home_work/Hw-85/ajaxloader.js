/*global $*/

var messagebox = (function () {
    "use strict";
    function show(message) {
        var messageDiv = $("div");
        var span = $("div");
        var buttonDiv = $("div");
        var button = $("button");
        span.html(message);
        button.html("ok");
        button.click(function () {
            $("body").remove(messageDiv);
        });

        buttonDiv.append(button);
        messageDiv.append(span);
        messageDiv.append(buttonDiv);

        buttonDiv.css("right-padding", "20%");
        messageDiv.css({
            "position": "absolute", "top": "50%", "left": "50%", "width": "250px",
            "height": "140px", "border": "1px solid blue", "box-sizing": "border-box", "dispay": "inline-block"
        });

        $("body").append(messageDiv);

    }
    return {
        show: show
    };
}());
(function () {
    "use strict";
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status < 400) {
                $('#display').html(request.responseText);
                iconDiv.hide();
            } else {
                //messagebox.show("OOPS" + request.statusText);
                alert("OOPS" + request.statusText);
                iconDiv.hide();
            }
        }
    };
    var input = $("#input");
    var iconDiv = $("i");
    iconDiv.hide();
    $('form').submit(function (event) {
        request.open('GET', input.val());
        request.send();
        iconDiv.show();
        event.preventDefault();
    });



}());