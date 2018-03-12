const http = require('http');

var theDonald = {
    name: "Donald Trump",
    email: "dtrump@whitehouse.gov"
}
http.createServer((request, response) => {
    response.setHeader('content-type', 'text/plain');
    /*response.setHeader('content-type', 'application/json');
    response.write(JSON.stringify(theDonald));*/
    response.statusCode = 404;
    response.write('wrong page. 404');
    response.end();
}).listen(80);

