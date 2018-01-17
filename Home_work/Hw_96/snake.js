(function () {
    "use strict";

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d');


    function resizeCanvas() {
        canvas.width = window.innerWidth - 10;
        canvas.height = window.innerHeight - 10;
    }

    window.addEventListener('resize', resizeCanvas);

    resizeCanvas();

    var img = document.createElement('img');
    img.src = "images/snake.png";
    var x = 0;
    var y = 0;
    var width = 64;
    var height = 64;

    window.addEventListener('keydown', function (KeyboardEvent) {
        context.clearRect(x, y, width, height);
        var key = KeyboardEvent.key;
        switch (key) {
            case 'ArrowRight':
                x += 10;
                break;
            case 'ArrowLeft':
                x -= 10;
                break;
            case 'ArrowUp':
                y -= 10;
                break;
            case 'ArrowDown':
                y += 10;
                break;
            default:
                alert('invalid key!');
                break;
        }
        if (x < 0 || x >= canvas.width - 62 || y < 0 || y >= canvas.height - 62) {
            alert("you crashed!");
            x = 0;
            y = 0;
        }
        context.drawImage(img, x, y, width, height);
    });

    img.onload = function () {
        context.drawImage(img, x, y, 64, 64);
    };
}());