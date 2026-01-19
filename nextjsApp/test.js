const http = require('http');

http.createServer((req, res) => {
    res.end('NODE IS WORKING');
}).listen(process.env.PORT || 3000);
