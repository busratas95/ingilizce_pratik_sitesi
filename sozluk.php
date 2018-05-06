<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 6.05.2018
 * Time: 13:43
 */

$service_url = "http://ws.tureng.com/TurengSearchServiceV4.svc/Search";
$code = "46E59BAC-E593-4F4F-A4DB-960857086F9C";

$word = "car";//$_POST['search'];

$key = md5($word . $code);

$data = array("Term" => $word, "Code" => $key, "IsTRToEN");
$data_string = json_encode($data);

$curl_request = curl_init($service_url);
curl_setopt($curl_request, CURLOPT_HTTPHEADER, array("Content-type: application/json", "Accept: text/plain"));
curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl_request, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);

$response_json = curl_exec($curl_request);

$response_obj = json_decode($response_json, true);

echo "<pre>";

print_r($response_obj);

echo "</pre>";