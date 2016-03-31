<?php
function httpPost($url)
{
   //create name value pairs seperated by &
        //The JSON data.
                $keyData = array(
                    'vendor_id' => '17',
                    'key' => '123'
                );
                 
                //Encode the array into JSON.

                $jsonDataEncoded=json_encode(array("key" => $keyData));
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($jsonDataEncoded));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}

function httpPostProduct($url,$productData)
{
   //create name value pairs seperated by &
        //The JSON data.
                $keyData = array(
                    'vendor_id' => '17',
                    'key' => '123'
                );
                 
                //Encode the array into JSON.

                $jsonDataEncoded=json_encode(array("key" => $keyData,"product"=>$productData));
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($jsonDataEncoded));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}
?>