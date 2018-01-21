(function () {
    'use strict';

    var canvas = document.getElementById("theCanvas"),
        context = canvas.getContext('2d');


    function resizeCanvas() {
        var width = window.innerWidth - 10;
        var height = window.innerHeight - 10;

        canvas.width = width - 20;
        canvas.height = height - 20;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();


    class Ball {
        constructor() {
            this.direction = 'right';
            this.x = canvas.width / 2;
            this.y = canvas.width / 2;
        }

        move() {
            //console.log(this.direction);
            switch (this.direction) {
                case 'right':
                    this.y += 10;
                    break;
                case 'left':
                    this.y -= 10;
                    break;
                case 'up':
                    this.x += 10;
                    break;
                case 'down':
                    this.x -= 10;
                    break;
            }


            if (this.y < 0) {
                this.direction = 'right';
            } else if (this.y >= canvas.width) {
                this.direction = 'left';
            }

            if (this.x < 0) {
                this.direction = 'down';
            } else if (this.x >= canvas.height) {
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