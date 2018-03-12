const fs = require('fs');
path = require('path');
var array = [];
function processList(dir, ext, callback) {
    ext = '.' + ext;
    fs.readdir(dir, 'utf8', (err, data) => {
        if (err) {
            callback(err, null);
        } else {
            data.forEach((file) => {
                var fileExt = path.extname(file);
                if (fileExt == ext) {
                    array.push(file);
                }
            });
            callback(null, array);
        }
    });
}
module.exports = processList;