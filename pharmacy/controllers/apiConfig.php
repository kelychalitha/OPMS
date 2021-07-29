<?php
if(!isset($_SESSION)){
    session_start();
}
$apiUrl = "http://localhost:8000/";
$apiPath = realpath(dirname(__FILE__).'/..');
