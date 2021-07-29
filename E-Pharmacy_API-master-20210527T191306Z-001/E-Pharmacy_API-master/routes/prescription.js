const express = require('express');
const router = express.Router();
const mongoose = require('mongoose');
const Precriptionn = require('../model/prescription');
let nodemailer = require('nodemailer');



// get  Precriptionn by Supplier ID
router.get("/precription/:id", async(req, res, next) => {
    try {
        const _id = req.params.id;
        const precription = await Precriptionn.find({ pid: _id })
        if (precription == '') {

        }
        res.json(precription)
    } catch (e) {
        res.status(500).json({
            error: true,
            message: e.message
        })
    }
});

// add precription

router.post("/AddPrecription", async(req, res, next) => {
    try {
        const precription = await Precriptionn.create({
            _id: new mongoose.Types.ObjectId(),
            fname: req.body.fname,
            lname: req.body.lname,
            address: req.body.address,
            email: req.body.email,
            phone: req.body.phone,
            pid: req.body.pid,
            pname: req.body.pname,
            pcity: req.body.pcity,
            pcontact: req.body.pcontact,
            image: req.body.image,
            status: req.body.status,
            payment: req.body.payment,
            cid: req.body.cid,
            details: req.body.details,
            date: req.body.date,
            total: req.body.total

        })

        res.json(precription)
    } catch (e) {
        next(e)
    }
});

// get  Precriptionn by Customer ID last 5 limit
router.get("/customerPrecription/:id", async(req, res, next) => {
    try {
        const _id = req.params.id;
        const sort = { $natural: -1 }; // set decending order
        const limit = 5; // set the limit
        const precription = await Precriptionn.find({ cid: _id }).sort(sort).limit(limit)
        if (precription == '') {

        }
        res.json(precription)
    } catch (e) {
        res.status(500).json({
            error: true,
            message: e.message
        })
    }
});

// get  Precriptionn by Customer ID 
router.get("/customerPrecriptions/:id", async(req, res, next) => {
    try {
        const _id = req.params.id;
        const precription = await Precriptionn.find({ cid: _id })
        if (precription == '') {

        }
        res.json(precription)
    } catch (e) {
        res.status(500).json({
            error: true,
            message: e.message
        })
    }
});

// get last 5

router.get("/precs/:id", async(req, res, next) => {
    const sort = { $natural: -1 }; // set decending order
    const limit = 5; // set the limit
    const _id = req.params.id;
    try {
        const precs = await Precriptionn.find({ pid: _id }).sort(sort).limit(limit)
        if (precs == '') {

        }
        res.json(precs)

    } catch (e) {
        res.status(500).json({
            error: true,
            message: e.message
        })
    }

});


//update order
router.put("/updateOrder", async(req, res, next) => {



    try {
        const order = await Precriptionn.findByIdAndUpdate({ _id: req.body.id }, {
            status: req.body.status,
            details: req.body.detail,
            total: req.body.total


        }, {
            new: true,
            useFindAndModify: false,
            upsert: true
        })
        let transporter = nodemailer.createTransport({
            service: 'Gmail',
            auth: {
                user: process.env.SCREAT_EMAIL,
                pass: process.env.SCREAT_EMAIL_PASS
            }
        });

        let mailOptions = {
            from: process.env.SCREAT_EMAIL,
            to: req.body.email,
            subject: "About Prescription",
            text: 'Mr/Ms ' + req.body.email + "," + '\n \nYour order details has updated ..' +
                "\nInvoice Number is: " + req.body.id + "\n Details: " + req.body.details + "\nStatus is: " + req.body.status +
                "\nTotal Price  is: " + req.body.total + "\n\n Download Invoice:   http://localhost/pharmacy/customer/orderDetails.php"
        };

        transporter.sendMail(mailOptions, function(error, info) {
            if (error) {
                console.log(error);
            } else {
                console.log('Email sent: ' + info.response);
            }
        });

        res.json(order).status(200)
    } catch (e) {
        next(e)
    }
})


// get all

router.get("/precsAll", async(req, res, next) => {

    try {
        const precs = await Precriptionn.find()
        if (precs == '') {
            return res.status(404).json({
                error: true,
                message: "No precriptions Found .."
            })
        }
        res.json(precs)

    } catch (e) {
        res.status(500).json({
            error: true,
            message: e.message
        })
    }

});







module.exports = router;