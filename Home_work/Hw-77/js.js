var myApp=myApp || {};

myApp.Utils=(function(Utils){
    "use strict";
    Utils.months=(function () {
    
        var months = ["January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"];
    
        function getNumber(name) {
            for (var i = 0; i < months.length; i++) {
                if (months[i] === name) {
                    return i + 1;
                }
            }
            return -1;
        }
        function pp(){
            months.pop();
        }
        return {
            getMonthName: function (num) {
                return months[num - 1];
            },
            getMonthNumber: getNumber
        ,
        pp:function (){
            return months.pop;
        }
    }
    }());
    Utils.checkStrings=(function () {
        return{
        stringCaseInsensitiveEquals: function (string1,string2){
            return string1.toUpperCase() === string2.toUpperCase();
        }
    };
    }());
    return Utils;
}(myApp.Utils || {}));

var x=myApp.Utils.months.getMonthName(2); 
var z=myApp.Utils.months.pp();
//var z=myApp.Utils.months.getMonthName(2); 
var y=myApp.Utils.checkStrings.stringCaseInsensitiveEquals('apple', 'APPle');
console.log(x);
console.log(y);
console.log(z);