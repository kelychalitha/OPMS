const mongoose = require('mongoose');


const SupplierSchema = mongoose.Schema({
    fname: {
        type: String,

    },
    lname: {
        type: String,

    },
    email: {
        type: String,

    },
    nic: {
        type: String,

    },
    nicImg: {
        type: String,
    },


    phone: {
        type: String,


    },
    phone2: {
        type: String,


    },
    address: {
        type: String,

    },
    city: {
        type: String,
        default: 'City'

    },

    password: {
        type: String,

    },
    image: {
        type: String,

    },
    status: {
        type: String,
        default: 'Live'

    },

});

module.exports = mongoose.model('Supplier', SupplierSchema)