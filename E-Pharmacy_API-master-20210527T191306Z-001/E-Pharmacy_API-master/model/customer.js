const mongoose = require('mongoose');

const CustomerSchema = mongoose.Schema({
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

    nic: {
        type: String,
        required: true
    },
    nicImg: {
        type: String,
        default: 'Nic Image'
    },
    email: {
        type: String,
        required: true
    },
    phone: {
        type: String,
        required: true

    },
    address: {
        type: String,
        required: true
    },
    city: {
        type: String,
        default: 'City'
    },
    password: {
        type: String,
        required: true
    },

    image: {
        type: String,
        default: "test.jpg"
    },



});

module.exports = mongoose.model('Customer', CustomerSchema)