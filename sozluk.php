<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 6.05.2018
 * Time: 13:43
 */

function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}

$service_url = "http://ws.tureng.com/TurengSearchServiceV4.svc/Search";
$code = "46E59BAC-E593-4F4F-A4DB-960857086F9C";

$word = $_GET['term'];
$filter = $_GET["filter"];

$key = md5($word . $code);

$data = array("Term" => $word, "Code" => $key, "IsTRToEN" => 0);
$data_string = json_encode($data);

$curl_request = curl_init($service_url);
curl_setopt($curl_request, CURLOPT_HTTPHEADER, array("Content-type: application/json", "Accept: text/plain"));
curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl_request, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);

$response_json = curl_exec($curl_request);

$response_obj = json_decode($response_json, true);

if ($response_obj["IsSuccessful"] === 0 || $response_obj["MobileResult"]["IsFound"] === 0)
    die("No result");
else {
    $results = $response_obj["MobileResult"]["Results"];
    $tr2en_translations = array();
    $en2tr_translations = array();
    $voices = array();

    foreach ($results as $result) {
        if (contains("en->tr", $result["CategoryEN"]))
            array_push($en2tr_translations, $result["Term"]);
        else
            array_push($tr2en_translations, $result["Term"]);
    }

    $voice_results = $response_obj["MobileResult"]["VoiceURLs"];

    foreach ($voice_results as $voice_result) {
        if (contains("/AmE/", $voice_result))
            $voices["am"] = $voice_result;
        else if (contains("/BrE/", $voice_result))
            $voices["br"] = $voice_result;
        else if (contains("/AuE/", $voice_result))
            $voices["au"] = $voice_result;
    }

    $result_data = array();
    if ($filter == "TR-EN")
        $result_data["en"] = $tr2en_translations;
    else
        $result_data["tr"] = $en2tr_translations;
    $result_data["voices"] = $voices;

    echo json_encode($result_data);
}