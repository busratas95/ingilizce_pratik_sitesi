<?php
/**
 * Created by PhpStorm.
 * User: busratas
 * Date: 17.05.2018
 * Time: 00:02
 */

session_start();

if (empty($_SESSION["session_id"]))
    die();

$servername = "localhost";
$username = "ingilizcepratik";
$password = "12345";
$database = "ingilizcepratik";

$user_id = $_SESSION["user_id"];

$mysql_connection = new mysqli($servername, $username, $password, $database);

if ($mysql_connection->connect_error)
    die("Connection failed: " . $mysql_connection->connect_error);

$sql = "SELECT * FROM test WHERE user_id = '$user_id'";

$query = $mysql_connection->query($sql);
$rows = $query->fetch_all(MYSQLI_ASSOC);

$test_1_last_question = 0;
$test_2_last_question = 0;
$test_3_last_question = 0;

for ($i = 0; $i < count($rows); $i++) {
    if ($rows[$i]["test_id"] == 1)
        $test_1_last_question = $rows[$i]["last_answered_question"];
    else if ($rows[$i]["test_id"] == 2)
        $test_2_last_question = $rows[$i]["last_answered_question"];
    else if ($rows[$i]["test_id"] == 3)
        $test_3_last_question = $rows[$i]["last_answered_question"];
}

$test_1_value = $test_1_last_question * 10;
$test_2_value = $test_2_last_question * 10;
$test_3_value = $test_3_last_question * 10;

?>
<div class="table">
    <form>
        <div>
            <?php
            if ($test_1_value != 100) {
                ?>
                <span class="badge badge-light"><a href="?page=test&test_id=1">TEST 1</a></span>
                <?php
            } else {
                ?>
                <span class="badge badge-light">TEST 1</span>
                <?php
            }
            ?>
            <br>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= $test_1_value; ?>%;"
                     aria-valuenow="<?= $test_1_value; ?>" aria-valuemin="0" aria-valuemax="100"><?= $test_1_value; ?>%
                </div>
            </div>
        </div>
        <br><br>
        <div>
            <?php
            if ($test_2_value != 100) {
                ?>
                <span class="badge badge-light"><a href="?page=test&test_id=2">TEST 2</a></span>
                <?php
            } else {
                ?>
                <span class="badge badge-light">TEST 2</span>
                <?php
            }
            ?> <br>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= $test_2_value; ?>%;"
                     aria-valuenow="<?= $test_2_value; ?>" aria-valuemin="0" aria-valuemax="100"><?= $test_2_value; ?>%
                </div>
            </div>
        </div>
        <br><br>
        <div>
            <?php
            if ($test_3_value != 100) {
                ?>
                <span class="badge badge-light"><a href="?page=test&test_id=3">TEST 3</a></span>
                <?php
            } else {
                ?>
                <span class="badge badge-light">TEST 3</span>
                <?php
            }
            ?> <br>

            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?= $test_3_value; ?>%;"
                     aria-valuenow="<?= $test_3_value; ?>" aria-valuemin="0" aria-valuemax="100"><?= $test_3_value; ?>%
                </div>
            </div>
        </div>
    </form>
</div>