<?php session_start(); ?>
<html>
<head>
<title>INGILIZCE PRATIK SITESI</title>
    <meta charset="utf8">

<link rel="stylesheet" href="bootstrap.min.css">


<style>

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

    .btn-success {
        position: absolute;
        top: 0;
        left: 30px;
    }

    .table {
        position: relative;
        left: 20%;
        width: 45%;
    }

    #uyeol {
        width: 430px;
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


    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">PRESENT CONTINUOUS TENSE (ŞİMDİKİ ZAMAN)</th>
        </tr>
        <tr>
            <td><b>POSITIVE(+) :  </b></td>
            <td>Subject + BE (am is are) + Verb-ING</td>
        </tr>
        <tr>
            <td><b>NEGATIVE(-): </b></td>
            <td>Subject + BE NOT (am not isn’t aren’t) + Verb-ING</td>
        </tr>

        </thead>

    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">SIMPLE PRESENT TENSE (GENİŞ ZAMAN)</th>
        </tr>

        <tr>
            <td rowspan="2"><b>POSITIVE (+): </b></td>
            <td>I, you, we, they + verb </td>
        </tr>
        <tr>
            <td>He,she,it + verbs</td>
        </tr>

        <tr>
            <td rowspan="2"><b>NEGATIVE(-): </b></td>
            <td>I, you, we, they + don’t verb</td>
        </tr>
        <tr>
            <td>He, she, it + doesn’t Verb</td>
        </tr>

        </thead>

    </table>

    <table class="table">
        <thead class="thead-light">

        <tr>
            <th colspan="2" scope="row">SIMPLE PAST TENSE (Dİ’Lİ GEÇMİŞ ZAMAN)</th>
        </tr>

        <tr>
            <td><b>POSITIVE: (+): </b></td>
            <td>I, you, he, she, it, we, you, they + verb2</td>
        </tr>
        <tr>
            <td><b>NEGATIVE (-): </b></td>
            <td>I, you, he, she, it, we, you, they + didn’t + verb1</td>
        </tr>

        </thead>

    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">(SIMPLE) FUTURE TENSE (GELECEK ZAMAN)</th>
        </tr>

        <tr>
            <td><b>POSITIVE (+): </b></td>
            <td>I, you, he, she, it, we, you, they + will + verb</td>
        </tr>
        <tr>
            <td><b>NEGATIVE (-): </b></td>
            <td>I, you, he, she, it, we, you, they + will not (won’t) + verb</td>
        </tr>

        </thead>
    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">PAST CONTINUOUS TENSE (ŞİMDİKİ ZAMANIN HİKAYESİ) </th>
        </tr>

        <tr>
            <td rowspan="2"><b>POSITIVE (+): </b></td>
            <td>I, he, she, it + was + verb-ing</td>
        </tr>
        <tr>
            <td>We, you, they + were + verb-ing</td>
        </tr>
        <tr>
            <td rowspan="2"><b>NEGATIVE (-): </b></td>
            <td>I,he,she,it + was not (wasn’t)verb-ing</td>
        </tr>
        <tr>
            <td>You,we,they + were not (weren’t) + verb-ing.</td>
        </tr>

        </thead>
    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">BE GOING TO (YAKIN (KESİN) GELECEK ZAMAN)</th>
        </tr>

        <tr>
            <td colspan="2">ÖZNE + BE GOING TO + FİİL (YALIN)  (be: am, is, are)</td>
        </tr>
        <tr>
            <td rowspan="3"><b>POSITIVE (+): </b></td>
            <td>I + am going to + verb </td>
        </tr>
        <tr>
            <td>He, she, it + is going to + verb </td>
        </tr>
        <tr>
            <td>We, you, they + are going to + verb</td>
        </tr>
        </tr>
        <tr>
            <td rowspan="3"><b>NEGATIVE (-): </b></td>
            <td>I+ am not going to + verb </td>
        </tr>
        <tr>
            <td>He,she,it + isn’t going to + verb </td>
        </tr>
        <tr>
            <td>You, we, they + aren’t not going to + verb</td>
        </tr>
        </tr>

        </thead>
    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">FUTURE CONTINUOUS TENSE (SÜREGELEN GELECEK ZAMAN)</th>
        </tr>

        <tr>
            <td><b>POSITIVE(+): </b></td>
            <td>I, you, he, she, we, you, they + will be + verb-ing</td>
        </tr>
        <tr>
            <td><b>NEGATIVE(-): </b></td>
            <td>I, you, he, she, we, you, they + won’t be + verb-ing</td>
        </tr>

        </thead>
    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">FUTURE PERFECT TENSE (GELECEK-ÖNCESİ ZAMAN)</th>
        </tr>

        <tr>
            <td><b>POSITIVE(+):  </b></td>
            <td>I, you, he, she, it, we, you, they + will have + verb-3</td>
        </tr>
        <tr>
            <td><b>NEGATIVE(-): </b></td>
            <td>I, you, he, she, it, we, you, they + won’t have + verb-3</td>
        </tr>

        </thead>
    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">PRESENT PERFECT TENSE (YAKIN GEÇMİŞ ZAMAN)</th>
        </tr>

        <tr>
            <td rowspan="2"><b>POSITIVE(+): </b></td>
            <td>I, you, we, they + have + verb3</td>
        </tr>
        <tr>
            <td>He, she, it + has + verb3</td>
        </tr>
        <tr>
            <td rowspan="2"><b>NEGATIVE(-): </b></td>
            <td>I, you, we, you, they + haven’t + verb3 </td>
        </tr>
        <tr>
            <td>He, she, it + hasn’t + verb3</td>
        </tr>

        </thead>
    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">PAST PERFECT TENSE (MİŞ’Lİ GEÇMİŞ ZAMAN)</th>
        </tr>

        <tr>
            <td><b>POSITIVE(+): </b></td>
            <td>I, you, he, she, it, we, they, + had + verb3</td>
        </tr>
        <tr>
            <td><b>NEGATIVE(-): </b></td>
            <td>I, you, he, she, it, we, you, they + hadn’t + verb3 </td>
        </tr>

        </thead>
    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">PRESENT PERFECT CONTINUOUS TENSE  (mekteyim, maktayım)</th>
        </tr>

        <tr>
            <td rowspan="2"><b>POSITIVE(+): </b></td>
            <td>I, you, we, they + have been + verb-ing</td>
        </tr>
        <tr>
            <td>He, she, it + has been + verb-ing</td>
        </tr>
        <tr>
            <td rowspan="2"><b>NEGATIVE(-): </b></td>
            <td>I, you, we, they + haven’t been + verb-ing </td>
        </tr>
        <tr>
            <td>He, she, it + hasn’t been + verb-ing</td>
        </tr>

        </thead>
    </table>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th colspan="2" scope="row">PAST PERFECT CONTINUOUS TENSE  (mekteydim, maktaydım)</th>
        </tr>

        <tr>
            <td><b>POSITIVE(+): </b></td>
            <td>I, you, we, they, he, she, it + had been + verb-ing</td>
        </tr>
        <tr>
            <td><b>NEGATIVE(-): </b></td>
            <td>I, you, we, they, he, she, it + hadn’t been + verb-ing</td>
        </tr>

        </thead>
    </table>

    <?php
        if(empty($_SESSION["session_id"])) {
            ?>

            <div class="girisuyelikgenel"> <!-- giris yapma divi -->

                <form action="login.php" method="post">

                    <a href="javascript:show('login');">
                        <button type="button" class="btn btn-success">Giriş Yap</button>
                    </a>

                    <div class="girisuyelik" id="giris">
                        <div class="form-group">
                            <label for="login_mail">Email adresiniz</label>
                            <input type="email" class="form-control" id="login_mail" name="login_mail"
                                   placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="login_password">Şifreniz</label>
                            <input type="password" class="form-control" id="login_password" name="login_password"
                                   placeholder="Şifre">
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="login_remember_me"
                                   name="login_remember_me">
                            <label class="form-check-label" for="login_remember_me">Beni Hatırla</label>
                        </div>
                        <button type="submit" class="btn btn-primary" id="grsblg">Giriş</button>
                    </div>
                </form>


                <form class="needs-validation" id="uyelikformu" method="post" action="register.php" novalidate>

                    <a href="javascript:show('register');">
                        <button type="button" class="btn btn-danger">Üye Ol</button>
                    </a>

                    <div class="girisuyelik" id="uyeol" style="display: none;">

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Adınız</label>
                                <input type="text" class="form-control" id="validationCustom01" name="firstname"
                                       placeholder="Ad" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">Soyadınız</label>
                                <input type="text" class="form-control" id="validationCustom02" name="lastname"
                                       placeholder="Soyad" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="validationCustom03">Email adresiniz</label>
                                <input type="text" class="form-control" id="validationCustom03" name="mail"
                                       placeholder="Email" required>
                                <div class="valid-feedback">
                                    Please provide a valid city.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="inputPassword5">Şifreniz</label>
                                <input type="password" class="form-control" id="inputPassword5"
                                       aria-describedby="passwordHelpBlock" name="password" placeholder="Şifre">
                                <div class="valid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="inputPassword5">Şifreniz (Tekrar)</label>
                                <input type="password" class="form-control" aria-describedby="passwordHelpBlock"
                                       name="password_confirm" placeholder="Şifre (Tekrar)">
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Kayıt Ol</button>
                    </div>

                </form>

            </div>

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