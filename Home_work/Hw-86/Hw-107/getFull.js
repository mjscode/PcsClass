const http = require('http'),
    url = require('url'),
    bl = require('bl'),
    source = process.argv[2];

http.get(source, function (response) {

    response.pipe(bl(function (err, data) {
        if (err) {
            console.log(err);
        } else {
            console.log(data.length);
            var string = data.toString();
            console.log(string);
        }
    }))
});
