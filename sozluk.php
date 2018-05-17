<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 6.05.2018
 * Time: 13:43
 */

// bu kod tureng.com un mobil web servisine bağlanarak oradan sözlükte arama yaptırır

// basit bir $haystack içinde $needle arama fonksiyonu
// samanlıkta iğne aramak :))
function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}

// tureng servis adresi
$service_url = "http://ws.tureng.com/TurengSearchServiceV4.svc/Search";
// turen servisi ile konuşabilmek için özel bir kod, internetten bulundu
$code = "46E59BAC-E593-4F4F-A4DB-960857086F9C";

// bize GET ile yollanan parametreleri al
$word = $_GET['term'];
$filter = $_GET["filter"];

// aranacak kelime ile yukardaki gizli kodu birleştirip bunun MD5 hash ini al, çünkü tureng bu şifreye göre cevap veriyor, internetten bulundu
$key = md5($word . $code);

// tureng e yollamak için bir JSON verisi oluştur
$data = array("Term" => $word, "Code" => $key, "IsTRToEN" => 0);
$data_string = json_encode($data);

// tureng'e cURL kullanarak bağlan, internette bulunan Java kodlarından PHP ye çevrildi
// cURL isteğini hazırla
$curl_request = curl_init($service_url);
curl_setopt($curl_request, CURLOPT_HTTPHEADER, array("Content-type: application/json", "Accept: text/plain"));
curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($curl_request, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, true);
// cURL isteğini yolla
$response_json = curl_exec($curl_request);
// gelen cevap verisini JSON dan normal bir arrary e çevir
$response_obj = json_decode($response_json, true);

if ($response_obj["IsSuccessful"] === 0 || $response_obj["MobileResult"]["IsFound"] === 0) // eğer gelen cevap boşsa bulunamadı de ve öl
    die("No result");
else { // gelen cevap boş değilse
    $results = $response_obj["MobileResult"]["Results"]; // gelen cevap bunun içinde bu bir array
    $tr2en_translations = array();
    $en2tr_translations = array();
    $voices = array();

    foreach ($results as $result) { // gelen cevapları oku, ingilizceden türkçeye mi yoksa türkçeden ingilizceye mi aranıyordu ona göre filtrele
        if (contains("en->tr", $result["CategoryEN"]))
            array_push($en2tr_translations, $result["Term"]);
        else
            array_push($tr2en_translations, $result["Term"]);
    }

    $voice_results = $response_obj["MobileResult"]["VoiceURLs"]; // gelen ses dosyaları bunun içinde, şimdilik sayfa bunları göstermiyor, ilerde gösterebilir, butona basınca kelimenin okunuşu çalar

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

    // JSON olarak datayı bastır ki AJAX ile geri okunacak
    echo json_encode($result_data);
}