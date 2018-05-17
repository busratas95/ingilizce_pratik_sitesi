<?php session_start(); ?>
<?php include_once "pages/navbarchooser.php"; ?>
<html>
<head>
    <title>INGILIZCE PRATIK SITESI</title>
    <meta charset="utf8">

    <script src="jquery-3.3.1.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
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
            left: 75%;
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
            width: 52%;
            top: 38px;
        }

        #uyeol {
            width: 430px;
        }

        .search-container {
            position: absolute;
            top: 25%;
            left: 25%;
        }

        .sonuctablosu {
            position: absolute;
            top: 35%;
            left: 14.2%;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 60%;
        }

        .sonuctablosu td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .sonuctablosu tr:nth-child(even) {
            background-color: #dddddd;
        }

        .jumbotron {
            position: relative;
            left: 20%;
            top: 38px;
            width: 53%;
        }

        .bilgi {
            padding: 25px;

        }

        .divtest {
            background-color: #ffdec2;
            padding: 5%;
            position: absolute;
            top: 25%;
            left: 25%;
            width: 50%;
            height: 50%;
        }

        #soruparagrafi {
            padding-right: 15%;
            position: relative;
            top: 0;
        }

    </style>

    <script>
        $(document).ready(function () {
            $("#search_form").submit(function () {
                event.preventDefault();
                $.get("sozluk.php", {
                    term: $("#search_term").val(),
                    filter: $("#search_filter").text().trim()
                }, function (data, status) {
                    if (status === "success") {
                        if (data === "No result") {
                            $("#sonuclar > thead").append("<tr><td>Sonuç bulunamadı</td></tr>");
                        } else {
                            $("#sonuclar > thead").empty();

                            let retval = JSON.parse(data);
                            let translation;
                            if ($("#search_filter").text().trim() === "TR-EN")
                                translation = retval.en;
                            else
                                translation = retval.tr;

                            $.each(translation, function (key, value) {
                                $("#sonuclar > thead").append("<tr><td>" + value + "</td></tr>");
                            });
                        }
                    } else {
                        alert("Bir hata oluştu, lütfen tekrar deneyiniz");
                    }
                });
            });
        });
        $(document).ready(function () {
            $(".dropdown-menu a").click(function () {
                $("#search_filter").text($(this).text());
            });

        });
        $(document).ready(function () {
            $("#signUpForm").submit(function () {
                event.preventDefault();
                let form = $(this);
                let serializedData = form.serialize();

                $.post("register.php", serializedData, function (data) {
                    if (data === "ok") {
                        $.post("login.php", {
                            login_mail: $("#mail").val(),
                            login_password: $("#password").val()
                        }, function (data) {
                            if (data === "ok")
                                location.reload(true);
                            else
                                alert(data);
                        })
                    } else {
                        alert(data);
                    }
                });
            });
        });
        $(document).ready(function () {
            $("#loginForm").submit(function () {
                event.preventDefault();
                let form = $(this);
                let serializedData = form.serialize();

                $.post("login.php", serializedData, function (data) {
                    if (data === "ok")
                        location.reload(true);
                    else
                        alert(data);
                });
            });
        });
        $(document).ready(function () {
            $("#logoutForm").submit(function () {
                event.preventDefault();
                $.post("logout.php", null, function (data) {
                    if (data === "ok") {
                        if (location.toString().includes("profile"))
                            location.href = "/index.php";
                        else
                            location.reload();
                    }
                });
            });
        });
        $(document).ready(function () {
            $("#changePasswordForm").submit(function () {
                event.preventDefault();
                let form = $(this);
                let serializedData = form.serialize();
                $.post("change_password.php", serializedData, function (data) {
                    let retval = JSON.parse(data);
                    if (retval.status === "ok") {
                        $("#negativeFeedback").hide();
                        form.trigger("reset");
                        $("#positiveFeedback").show("slow");
                        $("#positiveFeedbackMessage").text(retval.text);
                    } else {
                        $("#positiveFeedback").hide();
                        $("#negativeFeedback").show("slow");
                        $("#negativeFeedbackMessage").text(retval.text);
                    }
                })
            });
        });
        $(document).ready(function () {
            $("#testForm").submit(function () {
                event.preventDefault();
                let form = $(this);
                let serializedData = form.serialize();
                $.post("./check_test_answer.php", serializedData, function (data) {
                    if (data === "ok") {
                        location.reload(true);
                        $("#wrongAnswerFeedback").hide();
                        $("#correctAnswerFeedback").show("slow");
                    }
                    else {
                        $("#correctAnswerFeedback").hide();
                        $("#wrongAnswerFeedback").show("slow");
                    }
                })
            })
        })
    </script>

</head>

<body>


<div class="card text-center">
    <!-- navbar anasayfa profil vs -->
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">

            <li class="nav-item">
                <a href="index.php" class="nav-link <?= isActive("home"); ?>">Ana Sayfa</a>
            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['session_id'])) {
                    ?>
                    <a href="?page=practice_test" class="nav-link <?= isActive("practice_test"); ?>">Pratik Testler</a>
                    <?php
                } else {
                    ?>
                    <div class="nav-link">Pratik Testler</div>
                    <?php
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                if (isset($_SESSION['session_id'])) {
                    ?>
                    <a href="?page=profile" class="nav-link <?= isActive("profile"); ?>">Profil</a>
                    <?php
                } else {
                    ?>
                    <div class="nav-link">Profil</div>
                    <?php
                }
                ?>
            </li>
        </ul>
    </div>
</div>

<br/>

<div>
    <div class="list-group">
        <!-- soldaki list group -->
        <?php include "menuchooser.php" ?>
    </div>

    <?php include "pages/pagechooser.php" ?>

    <?php
    if (empty($_SESSION["session_id"])) {
        ?>

        <div class="girisuyelikgenel"> <!-- giris yapma divi -->
                <a href="javascript:show('login');">
                    <button type="button" class="btn btn-success">Giriş Yap</button>
                </a>
            <form id="loginForm">
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


            <form class="needs-validation" id="signUpForm" method="post" novalidate>

                <a href="javascript:show('register');">
                    <button type="button" class="btn btn-danger">Üye Ol</button>
                </a>

                <div class="girisuyelik" id="uyeol" style="display: none;">

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Adınız</label>
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                   placeholder="Ad" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Soyadınız</label>
                            <input type="text" class="form-control" id="lastname" name="lastname"
                                   placeholder="Soyad" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom03">Email adresiniz</label>
                            <input type="text" class="form-control" id="mail" name="mail"
                                   placeholder="Email" required>
                            <div class="valid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="inputPassword5">Şifreniz</label>
                            <input type="password" class="form-control" id="password"
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
                                   id="password_confirm"
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
            <form id="logoutForm">
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
        if (mode === 'login') {
            if (login_button.style.display === "none") {
                register_button.style.display = "none";
                login_button.style.display = "block";
            }
        } else if (mode === 'register') {
            if (register_button.style.display === "none") {
                login_button.style.display = "none";
                register_button.style.display = "block";
            }
        }

    }


</script>

</body>
</html>