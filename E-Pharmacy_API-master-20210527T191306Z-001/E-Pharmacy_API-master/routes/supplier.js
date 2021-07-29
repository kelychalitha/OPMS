const express = require('express');
const router = express.Router();
const mongoose = require('mongoose');
const Supplier = require('../model/supplier');

//get all suppliers

router.get("/suppliers", async(req, res, next) => {
    try {
        const supplier = await Supplier.find()
        if (supplier == '') {
            return res.status(404).json({
                error: true,
                message: "No supplier Found .."
            })
        }
        res.json(supplier)

    } catch (e) {
        res.status(500).json({
            error: true,
            message: e.message
        })
    }

});


// get  supplier by ID
router.get("/supplier/:id", async(req, res, next) => {
    try {
        const _id = req.params.id;
        const supplier = await Supplier.find({ _id: _id })
        if (supplier == '') {
            return res.status(404).json({
                error: true,
                message: "No supplier .."
            })
        }
        res.json(supplier)
    } catch (e) {
        res.status(500).json({
            error: true,
            message: e.message
        })
    }
});


// 
router.post('/comparePass', async (req,res)=>{
    let isEqual = await bcrypt.compare(req.body.pass,hashedPass)
    if(isEqual){
        res.send('Equal')
    }
    else{
        res.send('Not Equal')
    }
})




//deactive account
router.put("/deleteSupplier", async(req, res, next) => {
    try {
        const supplier = await Supplier.findByIdAndUpdate({ _id: req.body.id }, {
            status: "Deactivated",

        }, {
            new: true,
            useFindAndModify: false,
            upsert: true
        })

        

        console.log(supplier)
        res.json(supplier).status(200)
       
    } catch (e) {
        console.log(e)
        next(e)
        
    }
});




//Get Deactivated List
router.get("/getDeactivatedList",async(req,res)=>{
    try{
      const supplier =await Supplier.find({"status":"Deactivated"})
      res.json(supplier).status(200)
      console.log(supplier)
    }catch(e){
        console.log(e)
        next(e)
    }
})

module.exports = router;