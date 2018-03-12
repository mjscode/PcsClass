var array = (process.argv),
    newArray = array.slice(2, array.length),
    sum = 0;
newArray.forEach(function (number) {
    sum += Number(number);
});
console.log(sum);