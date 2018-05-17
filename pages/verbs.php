<table class="table table-striped" style="text-align: center">
        <thead>
        <tr>
            <th scope="col">Present<br>(Verb1)</th>
            <th scope="col">Past Simple<br>(Verb2)</th>
            <th scope="col">Past Participle<br>(Verb3)</th>
            <th scope="col">Anlamı</th>
        </tr>
        </thead>
        <tbody>
        <?php

        $file = fopen("./data/verbs.txt", "r"); // verbs.txt dosyasını aç

        if ($file) {
            while (($line = fgets($file)) !== false) { // açılan dosyayı satır satır oku
                $line_arr = explode("\t", $line); // okunan her satırı tab larına göre ayır böylece elimizde her fiilin zamana göre çekilmiş hali bir array olarak gelir
                echo "<tr>
                        <td>$line_arr[0]</td>
                        <td>$line_arr[1]</td>
                        <td>$line_arr[2]</td>
                        <td>$line_arr[3]</td>
                      </tr>";
            }

            fclose($file); // dosyayı kapat
        }

        ?>
        </tbody>
    </table>