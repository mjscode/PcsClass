const fs = require('fs');

const fileContents = fs.readFile('HelloWorld.js', (err, fileContents) => {
    if (err) {
        console.log("couldn't read", err)
    } else {
        console.log('file contents:', fileContents.toString());
    }
});
console.log('done');