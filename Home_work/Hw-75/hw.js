var mixedArray = ['a', 'B', 'c'];
var onlyUpper= ['A', 'B', 'C'];
var onlyLower= ['a', 'b', 'c'];

function ourSome(array, checker){
    
    for (var i = 0; i < array.length; i++) {
        if (checker(array[i])) {
            return true;
        }
    }

    return false;
}
function isUpper(letter){
    if(letter===letter.toUpperCase()){
        return true;
    }else{
        return false;
    }
}
function isLower(letter){
    if(letter!=letter.toUpperCase()){
        return true;
    }else{
        return false;
    }
}
console.log(ourSome(mixedArray,isUpper));
console.log(ourSome(mixedArray,isLower));
console.log(ourSome(onlyUpper,isUpper));
console.log(ourSome(onlyUpper,isLower));
console.log(ourSome(onlyLower,isUpper));
console.log(ourSome(onlyLower,isLower));
console.log('compare to libary function of some')
console.log(mixedArray.some(isUpper));
console.log(mixedArray.some(isLower));
console.log(onlyUpper.some(isUpper));
console.log(onlyUpper.some(isLower));
console.log(onlyLower.some(isUpper));
console.log(onlyLower.some(isLower));

function onlyIf(array, test, action){
    array.forEach(function(element) {
        if(test(element)){
            action(element);
        }
        
    });
}
function printIt(element){
    console.log(element);
}
onlyIf(mixedArray, isUpper, printIt);