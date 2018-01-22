(function () {
    'use strict';

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d');


    function resizeCanvas() {
        var width = window.innerWidth - 20;
        var height = window.innerHeight - 20;

        canvas.width = width - 20;
        canvas.height = height - 20;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();


    class Ball {
        constructor() {
            this.direction = 'right';
            this.x = canvas.width / 2;
            this.y = canvas.height / 2;
        }

        move() {
            switch (this.direction) {
                case 'right':
                    this.x += 10;
                    break;
                case 'left':
                    this.x -= 10;
                    break;
                case 'up':
                    this.y += 10;
                    break;
                case 'down':
                    this.y -= 10;
                    break;
            }


            if (this.x < 0) {
                this.direction = 'right';
            } else if (this.x >= canvas.width - 20) {
                this.direction = 'left';
            }

            if (this.y < 0) {
                this.direction = 'down';
            } else if (this.y >= canvas.height - 20) {
                this.direction = 'up';
            }
            context.beginPath();
            context.fillStyle = 'black';
            context.arc(this.x, this.y, 20, 0, Math.PI * 2);
            context.stroke();
            context.fill();
            context.closePath();
        }
    }
    let ball = new Ball();

    setInterval(() => {
        context.beginPath();
        context.clearRect(ball.x - 21, ball.y - 21, 44, 44);
        context.closePath();
        ball.move();
    }, 100);




}());