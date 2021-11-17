const express = require('express')
const {spawn} = require('child_process');
const app = express()
const port = 3000

let python;
app.get('/', (req, res) => {
 
  
 // spawn new child process to call the python script
   python = spawn('python', ['d.py']);
 /*
 python=spawn('python', ['r.py','STOP']);
 // collect data from script

 python.stdout.on('data', function (data) {
    console.log('Pipe data from python script ...');
    console.log(data.toString());
   });
 */
 //res.sendFile(__dirname+'/base.html');
 res.send("hi");
})

app.get('/stop', (req, res) => {
 
    python.kill('SIGTERM');
    res.send("stoppingg");
})

//method2

app.get('/get_data', (req, res) => {
 
  let data = require('./detects.json')
  

  console.log(data);
 
  res.send(data);
})



app.listen(port, () => console.log(`Example app listening on port 
${port}!`))