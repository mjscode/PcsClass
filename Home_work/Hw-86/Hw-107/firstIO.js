var fs = require('fs'),
    path = process.argv[2],
    buffer = fs.readFileSync(path),
    string = buffer.toString();

var array = string.split('\n');
console.log(array.length - 1);