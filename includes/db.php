<?php

$server="localhost";
$username="root";
$password="";
$dbname = "suite";
//connect to db
try {
    $conn = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // "Connected successfully"; 
    }
catch(PDOException $e)
    {
    //"Connection failed: " . $e->getMessage();
    }

function secureTxt($txt) {
    $txt = htmlentities($txt);
    $txt = stripslashes($txt);
    return $txt;
}

function securePwd($pwd) {
    $pwd = sha1($pwd);
    $pwd = htmlentities($pwd);
    $pwd = stripslashes($pwd);
    return $pwd;
}

function deliver_response ($status, $status_message, $data) {
  $response = array('status' => $status, 'status_message' => $status_message, 'data' => $data);
  return json_encode($response);

}