const express = require('express');
const router = express.Router();
const mongoose = require('mongoose');
const bcrypt = require('bcrypt');
const Supplier = require('../model/supplier');
const jwt = require('jsonwebtoken');
const Customer = require('../model/customer');
const Admin = require('../model/admin');





//supplier signup route 
router.post('/supplier/signup', (req, res, next) => {
    Supplier.find({ email: req.body.email })
        .exec()
        .then(supplier => { //check if the email is allready taken
            if (supplier.length >= 1) {
                return res.status(409).json({
                    message: 'Email Not Available. '
                });
            } else { // if the email is available for register 
                bcrypt.hash(req.body.password, 10, (err, hash) => { //hash the password using bcrypt
                    if (err) {
                        return res.status(500).json({
                            error: err
                        });
                    } else {
                        const supplier = new Supplier({
                            _id: new mongoose.Types.ObjectId(),
                            fname: req.body.fname,
                            lname: req.body.lname,
                            email: req.body.email,
                            nic: req.body.nic,
                            nicImg: req.body.nicImg,
                            phone: req.body.phone,
                            // phone2: req.body.phone2,
                            address: req.body.address,
                            city: req.body.city,
                            image: req.body.image,
                            password: hash
                        });
                        supplier.save()
                            .then(result => {
                                console.log(result);
                                res.status(201).json({
                                    message: "Sign up Sucessfully",
                                    createdUser: result
                                });

                            })
                            .catch(err => {
                                console.log(err);
                                res.status(500).json({
                                    error: err
                                });
                            })
                    }
                })

            }
        })
});

//login Supplier
router.post('/supplierlogin', async(req, res) => {
    const supplier = await Supplier.findOne({ email: req.body.email });
    if (!supplier) return res.status(400).send({ message: 'Email does Not Exist' });

    const validPass = await bcrypt.compare(req.body.password, supplier.password);

    if (!validPass) return res.status(400).send({ message: 'Password is Wrong' });

    if(supplier.status==="Deactivated") res.status(400).send({ message: 'This account is deactivated!' });

    const token = jwt.sign({ _id: supplier._id }, process.env.JWT_KEY);


    res.header('auth-token').send({
        id: supplier._id,
        fname: supplier.fname,
        email: supplier.email,
        address: supplier.address,
        lname: supplier.lname,
        phone: supplier.phone,
        nic: supplier.nic,
        image: supplier.image,
        token: token,
        message: supplier.fname,
    });
});

//customer signup route 
router.post('/customer/signup', (req, res, next) => {
    Customer.find({ email: req.body.email })
        .exec()
        .then(customer => { //check if the email is allready taken
            if (customer.length >= 1) {
                return res.status(409).json({
                    message: 'Email Allready taken. '
                });
            } else {
                bcrypt.hash(req.body.password, 10, (err, hash) => { //hash the password using bcrypt
                    if (err) {
                        return res.status(500).json({
                            error: err
                        });
                    } else {
                        const customer = new Customer({
                            _id: new mongoose.Types.ObjectId(),
                            fname: req.body.fname,
                            lname: req.body.lname,
                            nic: req.body.nic,
                            nicImg: req.body.nicImg,
                            email: req.body.email,
                            phone: req.body.phone,
                            address: req.body.address,
                            city: req.body.city,
                            image: req.body.image,
                            password: hash
                        });
                        customer.save()
                            .then(result => {
                                console.log(result);
                                res.status(201).json({
                                    message: "Sign up Sucessfully",
                                    createdUser: result
                                });

                            })
                            .catch(err => {
                                console.log(err);
                                res.status(500).json({
                                    error: err
                                });
                            })
                    }
                })

            }
        })
});

//login Customer
router.post('/customerlogin', async(req, res) => {
    const customer = await Customer.findOne({ email: req.body.email });
    if (!customer) return res.status(400).send({ message: 'Email does Not Exist' });

    const validPass = await bcrypt.compare(req.body.password, customer.password);

    if (!validPass) return res.status(400).send({ message: 'Password is Wrong' });

    const token = jwt.sign({ _id: customer._id }, process.env.JWT_KEY);


    res.header('auth-token').send({
        id: customer._id,
        fname: customer.fname,
        email: customer.email,
        nic: customer.nic,
        image: customer.image,
        token: token,
        lname: customer.lname,
        phone: customer.phone,
        address: customer.address,
        city: customer.city,

    });
});


//update customer
router.put("/updateCustomer", async(req, res, next) => {
    const hashPass = await bcrypt.hash(req.body.password, 10); //hash the password using bcrypt


    try {
        const customer = await Customer.findByIdAndUpdate({ _id: req.body.id }, {
            fname: req.body.fname,
            lname: req.body.lname,
            email: req.body.email,
            phone: req.body.phone,
            image: req.body.image,
            address: req.body.address,
            password: hashPass,

        }, {
            new: true,
            useFindAndModify: false,
            upsert: true
        })

        res.json(customer).status(200)
    } catch (e) {
        next(e)
    }
})

//update customer mobile
router.put("/updateCustomerm", async(req, res, next) => {
    const hashPass = await bcrypt.hash(req.body.password, 10); //hash the password using bcrypt


    try {
        const customer = await Customer.findByIdAndUpdate({ _id: req.body.id }, {
            fname: req.body.fname,
            lname: req.body.lname,
            email: req.body.email,
            nic: req.body.nic,
            password: hashPass,

        }, {
            new: true,
            useFindAndModify: false,
            upsert: true
        })

        res.json(customer).status(200)
    } catch (e) {
        next(e)
    }
})

//update supplier
router.put("/updateSupplier", async(req, res, next) => {
    const hashPass = await bcrypt.hash(req.body.password, 10); //hash the password using bcrypt


    try {
        const supplier = await Supplier.findByIdAndUpdate({ _id: req.body.id }, {
            fname: req.body.fname,
            lname: req.body.lname,
            email: req.body.email,
            phone: req.body.phone,
            image: req.body.image,
            address: req.body.address,
            password: hashPass,

        }, {
            new: true,
            useFindAndModify: false,
            upsert: true
        })

        res.json(supplier).status(200)
    } catch (e) {
        next(e)
    }
})



//update supplier mobile
router.put("/updateSupplierm", async(req, res, next) => {
    const hashPass = await bcrypt.hash(req.body.password, 10); //hash the password using bcrypt


    try {
        const supplier = await Supplier.findByIdAndUpdate({ _id: req.body.id }, {
            fname: req.body.fname,
            lname: req.body.lname,
            email: req.body.email,
            nic: req.body.nic,
            password: hashPass,

        }, {
            new: true,
            useFindAndModify: false,
            upsert: true
        })

        res.json(supplier).status(200)
    } catch (e) {
        next(e)
    }
})



// add the admin
router.post('/addAdmin', (req, res, next) => {
    Admin.find({ email: req.body.email })
        .exec()
        .then(admin => { //check if the email is allready taken
            if (admin.length >= 1) {
                return res.status(409).json({
                    message: 'Email Already Taken. '
                });
            } else {
                bcrypt.hash("12345678", 10, (err, hash) => { //hash the password using bcrypt
                    if (err) {
                        return res.status(500).json({
                            error: err
                        });
                    } else {
                        const admin = new Admin({
                            _id: new mongoose.Types.ObjectId(), //create id in mongodb 
                            email: "admin@eParmacy.lk",
                            password: hash,
                            type: req.body.type,
                        });
                        admin.save()
                            .then(result => {
                                console.log(result);
                                res.status(201).json({
                                    message: "Admin Added Successfully!!",
                                    createdAdmin: result
                                });

                            })
                            .catch(err => {
                                console.log(err);
                                res.status(500).json({
                                    error: err
                                });
                            })
                    }
                })

            }
        })
});

//login Admin
router.post('/adminlogin', async(req, res) => {
    const admin = await Admin.findOne({ email: req.body.email });
    if (!admin) return res.status(400).send({ message: 'Email does Not Exist' });

    const validPass = await bcrypt.compare(req.body.password, admin.password);

    if (!validPass) return res.status(400).send({ message: 'Password is Wrong' });

    const token = jwt.sign({ _id: admin._id }, process.env.JWT_KEY);


    res.header('auth-token').send({
        id: admin._id,
        email: admin.email,
        token: token
    });
});
module.exports = router;