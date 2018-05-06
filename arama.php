<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <title>INGILIZCE PRATIK SITESI</title>
    <meta charset="utf8">

    <link rel="stylesheet" href="bootstrap.min.css">


    <style>

        @font-face{
            font-family:'Glyphicons Halflings';
            src:url(./fonts/glyphicons-halflings-regular.eot);
        }

        .nav {
            font-weight: bold;
            position: absolute;
            left: 20.5%;
            top: 60%;
        }

        .card-header {
            height: 14%;
        }

        .list-group {
            width: 17%;
            position: absolute;
            left: 1px;
            top: 25%;
        }

        .girisuyelikgenel {
            position: absolute;
            left: 68%;
            top: 25%;
        }

        .girisuyelik {
            position: absolute;
            top: 300%;
            width: 250px;
        }

        .btn-danger {
            position: absolute;
            top: 0;
            left: 150px;
        }

        #uyeol {
            width: 430px;
        }

        .search-container {
            position: absolute;
            top: 35%;
            left: 40%;
        }

        .sonuctablosu {
            position: absolute;
            top: 48%;
            left: 25%;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 60%;

        }

        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>

</head>

<body>


<div class="card text-center">                                                                      <!-- navbar anasayfa profil vs -->
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">

            <li class="nav-item">
                <a href="home.php" class="nav-link active">Ana Sayfa</a>
            </li>
            <li class="nav-item">
                <?php
                    if(isset($_SESSION['session_id'])) {
                        ?>
                <a href="profil.html" class="nav-link">Profil</a>
                <?php
                    } else {
                        ?>
                <div class="nav-link">Profil</div>
                <?php
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    if(isset($_SESSION['session_id'])) {
                        ?>
                <a href="pratik.html" class="nav-link">Pratik Testler</a>
                <?php
                    } else {
                        ?>
                <div class="nav-link">Pratik Testler</div>
                <?php
                    }
                ?>
            </li>
        </ul>
    </div>
</div>

<br />

<div>
    <div class="list-group">                                                                        <!-- soldaki list group -->
        <div class="list-group-item list-group-item-action active">Zamanlar (Tenses)</div>
        <a href="dilbilgisi.html" class="list-group-item list-group-item-action">Dil Bilgisi (Grammer)</a>
        <a href="kelimeler.html" class="list-group-item list-group-item-action">İngilizce Kelimeler (Words)</a>
        <a href="gunluk.html" class="list-group-item list-group-item-action">Günlük İngilizce<br />(Daily Usages)</a>
        <a href="fiiller.html" class="list-group-item list-group-item-action">İngilizce Fiiller (Verbs)</a>
    </div>


    <?php
        if(empty($_SESSION["session_id"])) {
            ?>


    <?php
        } else {
            ?>
    <div class="girisuyelikgenel">
        <form action="logout.php" method="post">
            <button class="btn btn-danger" type="submit">Çıkış Yap</button>
        </form>
    </div>
    <?php
        }
    ?>


    <div class="search-container">
        <form action="/action_page.php">
            <input type="text" placeholder="Search.." name="search">
            <button type="submit">Submit</button>
        </form>
    </div>

    <div>
        <table class="sonuctablosu">
            <tr><td></td>
            </tr>
            <tr><td></td>
            </tr>
            <tr><td></td>
            </tr>
            <tr><td></td>
            </tr>
            <tr><td></td>
            </tr>
            <tr><td></td>
            </tr>
            <tr><td></td>
            </tr>
            <tr><td></td>
            </tr>
            <tr><td></td>
            </tr>
            <tr><td></td>
            </tr>
        </table>
    </div>

</div>

<script>

    const login_button = document.getElementById("giris");
    const register_button = document.getElementById("uyeol");

    function show(mode) {
        if(mode === 'login') {
            if(login_button.style.display === "none") {
                register_button.style.display = "none";
                login_button.style.display = "block";
            }
        } else if(mode === 'register') {
            if(register_button.style.display === "none") {
                login_button.style.display = "none";
                register_button.style.display = "block";
            }
        }

    }



</script>

</body>
</html>