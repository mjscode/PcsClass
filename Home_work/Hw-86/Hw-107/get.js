const http = require('http'),
    url = require('url'),
    source = process.argv[2];

http.get(source, function (response) {
    response.setEncoding('utf8');
    response.on('data', function (data) {
        console.log(data);
    });
});
