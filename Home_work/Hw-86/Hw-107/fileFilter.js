/*var fs = require('fs'),
    pth = require('path'),
    path = process.argv[2],
    ext = '.' + process.argv[3],
    buffer = fs.readdir(path, 'utf8', (err, list) => {
        if (err) {
            console.log("couldn't read", err);
        } else {
            list.forEach((file) => {
                var fileExt = pth.extname(file);
                if (fileExt == ext) {
                    console.log(file);
                };
            });
        }
    });*/
const path = process.argv[2],
    ext = process.argv[3],
    myModule = require('./fileModule');
function logger(err, data) {
    if (err) {
        console.log("there was an error", err);
    } else {
        data.forEach(element => {
            console.log(element);
        });
    }
}
myModule(path, ext, logger);


