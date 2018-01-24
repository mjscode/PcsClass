
const $ = require('jQuery');
//(function () {
'use strict';

var text = $('h1');
var picker = $('input');

picker.change(function (event) {
    var color = picker.val();
    text.css('color', color);
});
//})();