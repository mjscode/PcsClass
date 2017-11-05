var counter=app.Counter1;
var counter1=app.Counter2.create();
var counter2=app.Counter2.create();
function adder(thing,times){
    for(i=0;i<times;i++){
        thing.addCount();
    }
};
adder(counter, 10);
adder(counter1,5);
adder(counter2,15);
console.log(counter.getCount());
console.log(counter1.getCount());
console.log(counter2.getCount());