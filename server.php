<?php

header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS, post, get');
// header("Access-Control-Max-Age", "3600");
// header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
// header("Access-Control-Allow-Credentials", "true");




if (isset($_POST["url"])) {
    $response = [];
    $inputUrl = $_POST["url"];

    // API key 
    $apiKey = '999898-000012393444';

    // specific API url 
    $apiRequestUrl = 'https://api.seoreviewtools.com/authority-score/?url=' . $inputUrl . '&metrics=pa|da&key=' . $apiKey;

    // get data from API
    $jsonReposnse = file_get_contents($apiRequestUrl);
    // convert JSON to PHP array
    $dataArray = json_decode($jsonReposnse, true);

    // API call fail
    if ($dataArray['status'] !== 'ok') {

        // return error message
        $response['error'] = 'Error message: ' . $dataArray['error message'];
        echo json_encode($response);

        // // API call success    
    } else {

        // print data
        $response['data'] = $dataArray;
        echo json_encode($response);
    }
} else {
    $response['error'] = 'Some error occured';
    echo json_encode($response);
}
