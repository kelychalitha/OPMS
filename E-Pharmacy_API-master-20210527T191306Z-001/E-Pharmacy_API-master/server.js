const express = require('express');
const app = express();
const mongoose = require('mongoose');
const port = process.env.PORT || 8000;
// const url = 'mongodb://localhost/opms'
cors = require('cors')
const corsOptions = {
    origin: true,
    credentials: true
};

app.options('*', cors(corsOptions));
//set access to all  connect to this api
app.use((req, res, next) => {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Headers', 'X-Requested-With, Origin, Content-Type, Accept, Authorization');
    if (req.method === 'OPTIONS') {
        Response.header('Access-Control-Allow-Methods', 'PUT, POST, DELETE, GET');
        return res.status(200).json({});
    }
    next();
});

require('dotenv').config()

//connect to db
mongoose.connect(
    process.env.DATABASE_URL, { useNewUrlParser: true, useUnifiedTopology: true },
    () => console.log('Connected to db'));

    // mongoose.connect(
    //     url, { useNewUrlParser: true, useUnifiedTopology: true },
    //     () => console.log('Connected to db'));



//  const con = mongoose.connection;
//  con.on('open',()=>{
//     console.log('Connected....');
// })
   

//middleware
app.use(express.json());


const authRouter = require('./routes/auth');
const contactRoute = require('./routes/contact');
const supplierRoute = require('./routes/supplier');
const prescriptionRoute = require('./routes/prescription');
const uploadRoute = require('./routes/upload');

app.use('/auth', authRouter);
app.use('/contact', contactRoute);
app.use('/supplier', supplierRoute);
app.use('/precription', prescriptionRoute);
app.use('/file',uploadRoute);

const Grid = require("gridfs-stream");

let gfs;

const conn = mongoose.connection;
conn.once("open", function () {
    gfs = Grid(conn.db, mongoose.mongo);
    gfs.collection("photos");
});

// media routes
app.get("/file/:filename", async (req, res) => {
    try {
        const file = await gfs.files.findOne({ filename: req.params.filename });
        const readStream = gfs.createReadStream(file.filename);
        readStream.pipe(res);
    } catch (error) {
        res.send("not found");
    }
});

app.delete("/file/:filename", async (req, res) => {
    try {
        await gfs.files.deleteOne({ filename: req.params.filename });
        res.send("success");
    } catch (error) {
        console.log(error);
        res.send("An error occured.");
    }
});


app.listen(port, () => {
    console.log("App is running on port " + port);
 
});
