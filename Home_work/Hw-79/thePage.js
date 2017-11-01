'use strict'

var bodyElem=document.getElementById("body");
var fontElem=document.getElementById("text");

var fontButton=document.getElementById("fontPicker");
var bodyButton=document.getElementById("bodyPicker");

var fontInput=document.getElementById("fontColor");
var bodyInput=document.getElementById("backgroundColor");


fontButton.addEventListener('click', function () {
var fntColor=fontInput.value;
fontElem.style.color=fntColor;
});


bodyButton.addEventListener('click', function () {
var bodyColor=bodyInput.value;
bodyElem.style.backgroundColor=bodyColor;
});