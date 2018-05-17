<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 17.05.2018
 * Time: 00:05
 */

session_start(); // oturum aç
if (empty($_SESSION["session_id"])) // oturum bilgileri yoksa öl
    die();

$requested_test = $_GET["test_id"]; // GET ile yollanan test_id verisini al

$test_path = "";

// test_id sine göre hangi test okunması gerekiyor onu bul
switch ($requested_test) {
    case 1:
        $test_path = "./data/test1.json";
        break;
    case 2:
        $test_path = "./data/test2.json";
        break;
    case 3:
        $test_path = "./data/test3.json";
        break;
    default:
        die("Wrong test request!");
}

// tüm dosyayı oku
$test_file = file_get_contents($test_path);
// okunan dosyayı JSON decode et yani array e çevir
$test_array = json_decode($test_file, true);

// mysql bağlantı bilgileri
$servername = "localhost";
$username = "ingilizcepratik";
$password = "12345";
$database = "ingilizcepratik";
// SESSION içinden user_id yi al
$user_id = $_SESSION["user_id"];

// mysql e bağlan
$mysql_connection = new mysqli($servername, $username, $password, $database);

if ($mysql_connection->connect_error)
    die("Connection failed: " . $mysql_connection->connect_error);

// kullanıcının o test_id si için tüm bilgilerini çek
$sql = "SELECT * FROM test WHERE user_id = '$user_id' AND test_id = '$requested_test'";

$query = $mysql_connection->query($sql);
$row = $query->fetch_array(MYSQLI_ASSOC);

if (isset($row)) { // eğer gelen sonuç varsa son cevapladığı soruyu bul
    $last_question = $row["last_answered_question"];
    $question = $last_question;
} else // gelen sonuç yoksa kullanıcı daha o teste başlamamış o yüzden ilk soruyu göster
    $question = 0;

if ($question == 10) { // son soruyu geçtiyse kullanıcı test bitmiştir.
    echo "<div class='table'><h3>Bu testi bitirdiniz. Tebrikler!</h3></div>";
} else { // değilse ilgili soruyu göster

    ?>

    <div class="divtest">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="correctAnswerFeedback"
             style="display: none;">
            <button type="button" class="close" onclick="$('#correctAnswerFeedback').hide('slow');" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="positiveFeedbackMessage">Doğru cevap verdiniz!</div>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="wrongAnswerFeedback"
             style="display: none;">
            <button type="button" class="close" onclick="$('#wrongAnswerFeedback').hide('slow');" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="negativeFeedbackMessage">Yanlış cevap verdiniz!</div>
        </div>
        <form id="testForm">
            <div id="soruparagrafi"><p>
                    <strong><?= nl2br(str_replace("%%%", "_________________", $test_array["questions"][$question]["question_text"])); // nl2br JSON içindeki \n karakterlerini <br> etiketine çevirir  ?></strong>
                </p></div>
            <div class="radio">
                <label><input type="radio" name="answer" id="answer_a"
                              value="a"> <?= $test_array["questions"][$question]["answers"]["a"]; ?></label> <br>
                <label><input type="radio" name="answer" id="answer_b"
                              value="b"> <?= $test_array["questions"][$question]["answers"]["b"]; ?></label> <br>
                <label><input type="radio" name="answer" id="answer_c"
                              value="c"> <?= $test_array["questions"][$question]["answers"]["c"]; ?></label> <br>
                <label><input type="radio" name="answer" id="answer_d"
                              value="d"> <?= $test_array["questions"][$question]["answers"]["d"]; ?></label> <br>
            </div>
            <input type="hidden" name="test_id" value="<?= $requested_test; ?>">
            <input type="hidden" name="question" value="<?= $question; ?>">
            <div>
                <button type="submit" class="btn btn-primary" style="float: right;">Bir Sonraki Soru</button>
            </div>
        </form>
    </div>
    <?php
}