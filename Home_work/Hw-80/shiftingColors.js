(function () {
    "use strict";

    var theButton = get("theButton");
    var startString = 'Start';
    var stopString = 'Stop';
    var backgroundColor=document.body.style.backgroundColor;
    var textColor=document.body.style.color;
    var intervalText;
    var intervalBack;
    var textColorNumb=0;
    var backColorNumb=0;
    function createColorT(){
        var number = textColorNumb % 768;
        textColorNumb += 1;
        var first=Math.floor(number/3+2/3);
        var second=Math.floor(number/3+1/3);
        var third=Math.floor(number/3);
        return "rgb("+first+","+second+","+third+")";
    }
    function createColorB(){
        var number = backColorNumb % 768;
        backColorNumb += 1;
        var first=Math.floor(number/3+2/3);
        var second=Math.floor(number/3+1/3);
        var third=Math.floor(number/3);
        return "rgb("+first+","+second+","+third+")";
    }
    function changeColorT() {
        var newColor = createColorT();
        document.body.style['color']=newColor;
        console.log('going');
    }
    function changeColorB() {
        var newColor = createColorB();
        document.body.style['backgroundColor']=newColor;
        console.log('going');
    }
    function changeColor(styleProperty) {
        var newColor = createColor();
        document.body.style[styleProperty]=newColor;
        console.log('going');
    }
    function get(id) {
        return document.getElementById(id);
    }
    function createColor(){
        var first=Math.floor((Math.random() * 256));
        var second=Math.floor((Math.random() * 256));
        var third=Math.floor((Math.random() * 256));
        return "rgb("+first+","+second+","+third+")";
    }

    /*var textControllerButton = get("textController");
    textControllerButton.innerHTML = startString;

    textControllerButton.addEventListener('click', function () {
        if (textControllerButton.innerHTML === startString) {
             intervalText = setInterval(function(){changeColor('color')}, 250);
            textControllerButton.innerHTML = stopString;
        } else {
            clearInterval(intervalText);
            textControllerButton.innerHTML = startString;
        }
    });
    var backgroundControllerButton = get("backgroundController");
    backgroundControllerButton.innerHTML = startString;

    backgroundControllerButton.addEventListener('click', function () {
        if (backgroundControllerButton.innerHTML === startString) {
             intervalBack = setInterval(function(){changeColor('backgroundColor')}, 250);
            backgroundControllerButton.innerHTML = stopString;
        } else {
            clearInterval(intervalBack);
            backgroundControllerButton.innerHTML = startString;
        }
    });*/
    var textControllerButton = get("textController");
    textControllerButton.innerHTML = startString;

    textControllerButton.addEventListener('click', function () {
        if (textControllerButton.innerHTML === startString) {
             intervalText = setInterval(changeColorT, 120);
            textControllerButton.innerHTML = stopString;
        } else {
            clearInterval(intervalText);
            textControllerButton.innerHTML = startString;
        }
    });
    var backgroundControllerButton = get("backgroundController");
    backgroundControllerButton.innerHTML = startString;

    backgroundControllerButton.addEventListener('click', function () {
        if (backgroundControllerButton.innerHTML === startString) {
             intervalBack = setInterval(changeColorB, 120);
            backgroundControllerButton.innerHTML = stopString;
        } else {
            clearInterval(intervalBack);
            backgroundControllerButton.innerHTML = startString;
        }
    });

}());