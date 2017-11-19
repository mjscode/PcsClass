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
            var fontSize;
            var elemData= null;

            return {
                setCss: function (property, value) {
                    setCss(elem, property, value);
                    return this;
                },
                getCss: function (property) {
                    return getComputedStyle(elem).getPropertyValue(property);
                },
                pulsate: function () {
                    fontSize=window.getComputedStyle(elem).fontSize;
                    fontSize=fontSize.slice(0,fontSize.search('px'));
                    fontSize=Number(fontSize);
                        var i = 1,
                        //that = this,
                        interval = setInterval(function () {
                            if (i <= 5 || i > 15) {
                                fontSize += 5;
                            } else {
                                fontSize -= 5;
                            }

                            //that.setCss("fontSize", fontSize + 'px');
                            this.newsgCss("fontSize", fontSize + 'px');
                                                      

                            if (i++ === 20) {
                                clearInterval(interval);
                                console.log(this.newsgCss("fontSize")); 
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
                },
                setData: function(data) {
                    elemData=data;
                    return this;
                },
                getData: function() {
                    return elemData;
                },
                newsgCss: function (property, value) {
                    if(value!==undefined){
                        setCss(elem, property, value);
                        return this;
                    }else{
                        return getComputedStyle(elem).getPropertyValue(property); 
                    }
                }
            };
        }
    };

}());