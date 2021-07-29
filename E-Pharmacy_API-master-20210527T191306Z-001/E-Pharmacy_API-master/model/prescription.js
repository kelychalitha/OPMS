const mongoose = require('mongoose');
let todayDate = new Date().toISOString().slice(0, 10);
const PrescriptionSchema = mongoose.Schema({
    id: {
        type: String
    },
    fname: {
        type: String,
        required: true
    },
    lname: {
        type: String,
        required: true
    },

    address: {
        type: String,
        required: true
    },

    email: {
        type: String,
        required: true
    },
    phone: {
        type: String

    },
    pid: {
        type: String,
        required: true
    },
    pname: {
        type: String,

    },
    pcity: {
        type: String,

    },
    pcontact: {
        type: String
    },
    image: {
        type: String,
        default: "test.jpg"
    },
    cid: {
        type: String,
        required: true
    },
    status: {
        type: String,
        default: "pending"
    },
    payment: {
        type: String,
        default: "pending"
    },
    total: {
        type: String,
        default: "pending"
    },
    date: {
        type: String,
        default: todayDate
    },
    details: {
        type: String,
        default: "Not Update"
    }


});

module.exports = mongoose.model('Prescription', PrescriptionSchema)