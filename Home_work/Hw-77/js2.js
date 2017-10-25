"use strict";
var mine={
    balance:0,
    add:function(numb) {
         this.balance+=numb;
    }

};
var mine2={
    balance:0,
    add:function(numb) {
         this.balance+=numb;
    }

};
function addInterest(numb){
    var amount=this.balance*numb;
    this.balance+=amount;
}  
mine.add(10); 
addInterest.call(mine,.02);
addInterest.call(mine,.02);
console.log(mine.balance);
console.log(mine2.balance);