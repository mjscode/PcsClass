"use strict"
var array1=[2,4,'k'];
function map(array,func){
    var array2=[];
    for(var i=0;i<array.length;i++){
        var element=func(array[i]);
        array2.push(element);
    }
    return array2;
};
function double(numb){
    if(!isNaN(numb)){
        return numb*2;
    }else{
        return numb;
    }
}
console.log(array1);
var array3=map(array1,double);
console.log(array3);