var app=app || {};
app.Counter2=(function(){
    'use strict';
    var countCounters=0;
    return {
        create:function (){
        var count=0;
        countCounters++;
        return{
         addCount: function(){
        return count++;
    },
        getCount:function(){
            return count;
        }
        }
    },
        getCounters:function(){
            return countCounters;
}}
}(app.Counter2 || {}));
/*var counter=app.Counter2.create();
console.log(app.Counter2.getCounters());
console.log(counter.getCount());
counter.addCount();
console.log(counter.getCount());
var counter3=app.Counter2.create();
console.log(app.Counter2.getCounters());
console.log(counter3.getCount());
counter3.addCount();
console.log(counter3.getCount());
counter3.addCount();
console.log(counter.getCount());
console.log(counter3.getCount());*/