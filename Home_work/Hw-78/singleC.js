var app=app || {};
app.Counter1=(function(){
    'use strict';
    var count=0;
    return {
         addCount: function(){
        return count++;
    },
        getCount:function(){
            return count;
        }
    }
}(app.Counter1 || {}));
/*console.log(app.Counter.getCount());
counter=app.Counter;
console.log(counter.getCount());
counter.addCount();
console.log(counter.getCount());
counter2=app.Counter;
console.log(counter2.getCount());
counter2.addCount();
console.log(counter.getCount());*/
