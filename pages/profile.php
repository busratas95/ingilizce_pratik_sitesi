<?php
session_start();
if (empty($_SESSION["session_id"])) { // oturum açık değilse öl
    die();
} else { // oturum açıksa şifre değiştirme formunu ve profile bilgilerini göster
    ?>
    <div class="table">
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="positiveFeedback"
             style="display: none;">
            <button type="button" class="close" onclick="$('#positiveFeedback').hide('slow');" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="positiveFeedbackMessage"></div>
        </div>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="negativeFeedback"
             style="display: none;">
            <button type="button" class="close" onclick="$('#negativeFeedback').hide('slow');" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div id="negativeFeedbackMessage"></div>
        </div>
        <form id="changePasswordForm">
            <span class="badge badge-danger">Üye Bilgileri</span>
            <div>
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">First name</label>
                            <input type="text" class="form-control" value="<?= $_SESSION["user_firstname"]; ?>"
                                   disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom02">Last name</label>
                            <input type="text" class="form-control" value="<?= $_SESSION["user_lastname"]; ?>" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="validationCustom03">Email address</label>
                            <input type="text" class="form-control" value="<?= $_SESSION["user_mail"]; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="inputPassword5">Current Password</label>
                            <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                   aria-describedby="passwordHelpBlock" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="inputPassword5">New Password</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword"
                                   aria-describedby="passwordHelpBlock" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="inputPassword5">Confirm New Password</label>
                            <input type="password" class="form-control" aria-describedby="passwordHelpBlock"
                                   id="newPasswordConfirm"
                                   name="newPasswordConfirm" placeholder="Password">
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Change Password</button>
                </form>
            </div>
        </form>
    </div>
    <?php
}
?>