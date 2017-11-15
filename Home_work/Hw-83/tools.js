var pcs = pcs || {};

pcs.tools = (function () {
    "use strict";

    function get(id) {
        return document.getElementById(id);
    }

    function setCss(elem, property, value) {
        elem.style[property] = value;
    }

    return {
        wrap: function (id) {
            var elem = get(id);
            var displayValue = elem.style.display;
            if (displayValue === 'none'){
                displayValue = 'inline-block';
            }

            return {
                setCss: function (property, value) {
                    setCss(elem, property, value);
                    return this;
                },
                pulsate: function () {
                    var fontSize = 32,
                        i = 1,
                        //that = this,
                        interval = setInterval(function () {
                            if (i <= 5 || i > 15) {
                                fontSize += 5;
                            } else {
                                fontSize -= 5;
                            }

                            //that.setCss("fontSize", fontSize + 'px');
                            setCss(elem, "fontSize", fontSize + 'px');

                            if (i++ === 20) {
                                clearInterval(interval);
                            }
                        }, 100);

                    return this;
                },
                click: function(callback){
                    elem.addEventListener("click", function(){
                        callback(elem);
                    });
                    return this;
                },
                hide: function() {
                    setCss(elem, "display", "none");
                    return this;
                },
                show: function() {
                    setCss(elem, "display", displayValue);
                    return this;
                }
            };
        }
    };

}());