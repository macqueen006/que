<?php

$url = "https://api.paystack.co/transferrecipient";

$fields = [

    'type' => "nuban",

    'name' => "Ikechukwu Chuks",

    'account_number' => "0095175097",

    'bank_code' => "063",

    'currency' => "NGN"

];

$fields_string = http_build_query($fields);

//open connection

$ch = curl_init();



//set the url, number of POST vars, POST data

curl_setopt($ch,CURLOPT_URL, $url);

curl_setopt($ch,CURLOPT_POST, true);

curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    "Authorization: Bearer sk_test_354a8fe1388249156db33cc0334892731f9e2496",

    "Cache-Control: no-cache",

));



//So that curl_exec returns the contents of the cURL; rather than echoing it

curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);



//execute post

$result = curl_exec($ch);

echo $result;

?>