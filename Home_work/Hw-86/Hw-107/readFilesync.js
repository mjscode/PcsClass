const fs = require('fs');

const fileContents = fs.readFileSync('readFilesync.js');
console.log('File contents:', fileContents);
console.log('done');