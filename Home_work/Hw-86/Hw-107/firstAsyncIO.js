var fs = require('fs'),
    path = process.argv[2],
    buffer = fs.readFile(path, 'utf8', (err, info) => {
        if (err) {
            console.log("couldn't read", err);
        } else {
            var array = info.split('\n');
            console.log(array.length - 1);
        }
    });



